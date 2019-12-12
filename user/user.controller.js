const _ = require('lodash');
const conf = require('../conf.js');
const express = require('express');
const jwt = require('jsonwebtoken');
const base64Img = require('base64-img');
const generator = require('generate-password');
const mongoose = require('mongoose');
const passport = require('passport');
const path = require('path');
const router = express.Router();
const UserService = require('./user.service');
const UserModel = require('./user.model');
const DiscussionModel = require('./discussion.model');
const ReservationModel = require('./reservation.model');
const MessageModel = require('./message.model');
const CourseModel = require('./course.model');
const NotificationModel = require('./notification.model');
var ObjectId = require('mongodb').ObjectID;
var PicturesService = require('../utilities/pictures.service');
const ExtractJwt = require('passport-jwt').ExtractJwt;
const PushNotifications = require('node-pushnotifications');

const settings = {
    gcm: {
        id: 'AAAAKtEwL8U:APA91bHJAV3RD62kzYrSmfYxKQ8TWBYfdFBmgdlT-a0QTNGYkEpWMHoHpnNeEXm9fmH_Ry-2NSGaAB9QAC6KNhy2L2meH3QwNPf4SZedYSGgQboghkvmpborzndr9o99jZyb_ohLQbfr',
        phonegap: true, // phonegap compatibility mode, see below (defaults to false)
    },
    apn: {
        token: {
            key: 'kyklos_key.p8', // optionally: fs.readFileSync('./certs/key.p8')
            keyId: '86YUK6GTZK',
            teamId: '4B8FX5T86P',
        },
        production: false // true for APN production environment, false for APN sandbox environment,
    }
};

const push = new PushNotifications(settings);


async function sendNotif(to, title, message, category, extras) {
    const data = {
        title: title, // REQUIRED for Android
        topic: 'com.lendy.app', // REQUIRED for iOS (apn and gcm)
        body: message,
        priority: 'high', // gcm, apn. Supported values are 'high' or 'normal' (gcm). Will be translated to 10 and 5 for apn. Defaults to 'high'
        contentAvailable: true, // gcm, apn. node-apn will translate true to 1 as required by apn.
        category: category, // apn and gcm for ios
    };
    if (extras) {
        data.custom = {
            ...extras
        }
    }
    push.send(to, data)
        .then((results) => {
            console.log(results)
            console.log(results[0].message)
        })
        .catch((err) => {
            console.log(err);

        });

}

async function sendToNotifToUsers(usersId, title, message, category, extras) {
    usersId.forEach(userId => {
        NotificationModel.find({member : userId}, function(err, notification) {
            if (!err) {
                sendNotif(notification.token, title, message, category, extras)
            }
        })
    })
}

let mailgun;

if (conf.mailgun.apiKey) {
    mailgun = require('mailgun-js')({
        apiKey: conf.mailgun.apiKey,
        domain: conf.mailgun.domain
    })
}

const authenticate = function (req, res, next) {
    console.log(req.body);
    passport.authenticate('jwt', {
        session: false
    })(req, res, next)
};

// routes
router.patch('/update', authenticate, update);
router.post('/login', login);
router.post('/register', register);
router.get('/drivers', authenticate, getDrivers);
router.get('/lenders', authenticate, getLenders);
router.get('/cars', authenticate, getCars);
router.get('/myself', authenticate, getMyself);
router.get('/info', authenticate, getUserInfo);
router.delete('/:id', authenticate, deleteUser);
router.get('/message', authenticate, getDiscution);
router.post('/message', authenticate, postMessage);
router.get('/discussion', authenticate, getAllDiscution);
router.get('/newDiscussion', authenticate, getAllNonViewedDiscution);
router.post('/rate', authenticate, addRating);
router.get('/reservation', authenticate, getAllReservation);
router.post('/reservation', authenticate, addReservation);
router.patch('/reservation', authenticate, updateReservationStatus);
router.patch('/signature', authenticate, addSignature);
router.post('/comments', authenticate, commentResa);
router.post('/course', authenticate, addCourse);
router.patch('/course', authenticate, updateCourse);
router.get('/course', authenticate, getCourse);
router.get('/user_courses', authenticate, getUserCourses);
router.get('/user_contract', authenticate, getUserContract);
router.post('/notification', authenticate, registerToken);
router.get('/delete_notification', authenticate, desableNotif);

function registerToken(req, res) {
    let token = new NotificationModel({ member : req.user._id, token : req.body.token })
    token.save(function(err, result) {
        if (err) { return res.status(400).json(err) }
        return res.status(200).json(result)
    })
}

function desableNotif(req, res) {
    NotificationModel.find({id : req.user._id}, function(err, notif) {
        if (err) { return res.status(400).json(err) }
        notif[0].remove(function(err, notification) {
            if (err) { return res.status(400).json(err) }
            return res.status(200).json(notification)
        })
    })
}

function update(req, res) {
    let reqUser = req.user;
    let doc = req.body;
    UserService.getNicknameExist(doc)
        .then(function (nicknameExist) {
            if (nicknameExist && req.user.nickname !== doc.nickname)
                return res.status(409).json('nickname_exists');
            else {
                UserService.savePicture(doc)
                    .then(function (filename) {
                        console.log(filename);
                        if (filename) {
                            doc.picture = filename;
                        }
                        if (doc.password)
                            doc.password = UserService.encrypt(doc.password);
                        UserModel.findByIdAndUpdate(reqUser.id, doc, {
                            new: true
                        }, function (err, result) {
                            if (err)
                                return res.status(400).json(err);
                            res.json(result)
                        })
                    })
            }
        })
}

function login(req, res) {
    UserService.login(req.body.username, req.body.password)
        .then(function (token) {
            res.json({
                token: token
            })
        }, function (err) {
            res.status(400).json(err)
        })
}

function getUserInfo(req, res) {
    let userId = req.query.userId;
    UserModel.findById(userId, function (err, user) {
        if (err) {
            return res.status(409).json(err)
        }
        return res.status(200).json(user)
    });
}

function register(req, res) {
    let userData = req.body;
    console.log(userData);
    if (!userData.username)
        userData.username = userData.email;
    if (userData.username)
        userData.username = userData.username.trim();
    if (!UserService.isEmailValid(userData.username)) {
        return res.status(409).json('email_client_invalid');
    }
    UserService.getUserExist(userData)
        .then(function (userExist) {
            if (userExist)
                return res.status(409).json({ error : 'user_already_exists' });
            else {
                UserService.getNicknameExist(userData)
                    .then(function (nicknameExist) {
                        if (nicknameExist)
                            return res.status(409).json({error: 'nickname_exists'});
                        else {
                            UserService.savePicture(userData)
                                .then(function (filename) {
                                    if (filename)
                                        userData.picture = filename;
                                    userData.role = 'client';
                                    userData.status = 'enabled';
                                    let user = new UserModel(userData);
                                    user.save(function (err, result) {
                                        if (err) {
                                            return res.status(400).json(err);
                                        }
                                        result = result.toJSON();
                                        delete result.password;
                                        delete result.defaultPassword;
                                        UserService.login(req.body.username, req.body.password)
                                            .then(function (token) {
                                                res.json({
                                                    token: token
                                                })
                                            }, function (err) {
                                                res.status(400).json(err)
                                            })
                                    })
                                });
                        }
                    })
            }
        })
}

function deleteUser(req, res) {
    let reqUser = req.user;
    let reqId = req.params.id;
    let allowedRoles = ['superadmin'];
    if (allowedRoles.indexOf(reqUser.role) < 0)
        return res.status(403).json({
            allowedRoles: allowedRoles,
            requesterRole: reqUser.role
        });
    UserModel.findById(reqId, function (err, user) {
        if (err)
            return res.status(400).json(err);
        if (!user)
            return res.status(404).json();
        user.remove().then(function (user) {
            user = user.toJSON();
            delete user.password;
            PicturesService.removeFile(user.picture, 'users')
                .then(() => {
                }, err => {
                    return res.status(400).json(err)
                });
            return res.status(200).json(user)
        }, function (err) {
            return res.status(400).json(err)
        })
    })
}

function getDrivers(req, res) {
    let reqUser = req.user;
    let mileToKmMultiplicator = 1.609;
    var defaultDistance = 100;
    var defaultLatitude = reqUser.location.latitude;
    var defaultLongitude = reqUser.location.longitude;

    if (req.query.distance) {
        defaultDistance = req.query.distance;
    }
    if (req.query.latitude) {
        defaultLatitude = parseFloat(req.query.latitude.toString());
    }
    if (req.query.longitude) {
        defaultLongitude = parseFloat(req.query.longitude.toString());
    }
    UserModel.find({type : 'emprunteur', role: 'client', status: 'enabled'/*, location : {
            $geoWithin: {$centerSphere: [[defaultLongitude, defaultLatitude], defaultDistance * mileToKmMultiplicator / 3963.2 ]}
        }*/ }, function(err, users) {
        if (err) {
            return res.status(400).json(err)
        }
        res.status(200).json(users)
    })
}

function getLenders(req, res) {
    let reqUser = req.user;
    let mileToKmMultiplicator = 1.609;
    var defaultDistance = 600;
    var defaultLatitude = reqUser.location.latitude;
    var defaultLongitude = reqUser.location.longitude;

    console.log(defaultLongitude);
    console.log(defaultLatitude);

    if (req.query.distance) {
        defaultDistance = req.query.distance;
    }
    if (req.query.latitude) {
        defaultLatitude = parseFloat(req.query.latitude.toString());
    }
    if (req.query.longitude) {
        defaultLongitude = parseFloat(req.query.longitude.toString());
    }

    console.log(defaultLongitude);
    console.log(defaultLatitude);

    UserModel.find({type : 'preteur', role: 'client', status: 'enabled'/*, location : {
            $geoWithin: {$centerSphere: [[defaultLongitude ,defaultLatitude], defaultDistance * mileToKmMultiplicator / 3963.2 ]}
            }*/}, function(err, users) {
        if (err) {
            return res.status(400).json(err)
        }
        res.status(200).json(users)
    })
}

function getMyself(req, res) {
    UserModel.findById(req.user._id, async function(err, users) {
        if (err) {
            return res.status(400).json(err)
        }
        res.status(200).json(users)
    }).populate("reservations")
}

function getCars(req, res) {
    UserModel.find({type : 'preteur', role: 'client', status: 'enabled' }, function(err, users) {
        if (err) {
            return res.status(400).json(err)
        }
        res.status(200).json(users)
    })
}

function getAllDiscution(req, res) {
    let reqUser = req.user;
    DiscussionModel.find({
        members: {$all: [reqUser._id]}
    }, async function (err, discussions) {
        if (err) {
            return res.status(400).json(err)
        }
        var newDiscussions = [];
        discussions.forEach(function(discussion) {
            var modifiedDiscussion = discussion;
            modifiedDiscussion.messages = [discussion.messages[discussion.messages.length - 1]];
            newDiscussions.push(modifiedDiscussion);
        });
        return res.status(200).json(newDiscussions)
    })
        .populate('messages')
        .populate('members')
}

function getAllNonViewedDiscution(req, res) {
    let reqUser = req.user;
    DiscussionModel.find({
        members: {$all: [reqUser._id]}
    }, async function (err, discussions) {
        if (err) {
            return res.status(400).json(err)
        }
        var newDiscussions = [];
        discussions.forEach(function(discussion) {
            var modifiedDiscussion = discussion;
            let lastMessage = discussion.messages[discussion.messages.length - 1];
            if (lastMessage.refUser[0].toString() != reqUser._id.toString() && lastMessage.hasBeenViewed === false) {
                modifiedDiscussion.messages = [discussion.messages[discussion.messages.length - 1]];
                newDiscussions.push(modifiedDiscussion);
            }
        });
        return res.status(200).json(newDiscussions)
    }).populate('messages')
}

function getDiscution(req, res) {
    let reqUser = req.user;
    let reqContacts = [req.query.contacts];
    UserService.getUsersIdExist(reqContacts).then(function (isUsersExistent) {
        if (!isUsersExistent) {
            return res.status(406).json("User to contact is not found")
        } else {
            DiscussionModel.find({
                $or: [ { members: [reqContacts[0],reqUser._id] },
                       { members: [reqUser._id, reqContacts[0]]} ]
            }, async function (err, discussions) {
                if (err) {
                    return res.status(400).json(err)
                }
                console.log(reqContacts[0], reqUser._id);
                console.log(discussions.length);
                if (discussions === undefined || discussions.length === 0) {
                    console.log("New");
                    return res.status(200).json([])
                }
                else {
                    console.log("Exist");
                    let messages = discussions[0].messages;
                    if (messages[messages.length - 1].refUser[0].toString() != reqUser._id.toString()) {
                        discussions[0].messages[messages.length - 1].hasBeenViewed = true
                    }
                    discussions[0].messages[messages.length - 1].save(function(err, result) {
                        if (err) {
                            return res.status(400).json(err)
                        }
                        return res.status(200).json(messages)
                    });
                }
            }).populate('messages')
        }
    });
}

function addRating(req, res) {
     let reqUser = req.user;
     let userRatedId = req.body.user;
    let message = req.body.message;
    let rate = req.body.rate;

    UserService.getUsersIdExist([userRatedId]).then(function (isUsersExistent) {
        if (!isUsersExistent) {
            return res.status(406).json("User to contact is not found")
        } else {
            UserModel.find({ _id : userRatedId }, function (err, users) {
                if (err) { return res.status(400).json(err) }
                if (users === undefined || users.length === 0) { return res.status(400).json("Users error") }
                let user = users[0];
                user.ratings = [ ...user.ratings, { username : reqUser.fullName, message : message, rate : rate, image : reqUser.picture }];
                user.save(function(err, result) {
                    if (err) { return res.status(400).json(err) }
                    return res.status(200).json("Successfully added the new rating")
                })
            })
        }
    })
}

function addReservation(req, res) {
    let reqUser = req.user;
    let userRequestedId = req.body.user;
    let sinceDate = req.body.since;
    let toDate = req.body.to;
    let place = req.body.place;
    let time = req.body.time;

    UserService.getUsersIdExist([userRequestedId]).then(function (isUsersExistent) {
        if (!isUsersExistent) {
            return res.status(406).json("User to contact is not found")
        } else {
            UserModel.find({ _id : userRequestedId }, function (err, users) {
                if (err) { return res.status(400).json(err) }
                if (users === undefined || users.length === 0) { return res.status(400).json("Users error") }
                let user = users[0];
                const newReservation = new ReservationModel({ since : sinceDate, to : toDate, state : "PENDING", meetingPlace : place, meetingTime : time, members : [reqUser._id, userRequestedId] })
                newReservation.save(function(err, reservation) {
                    if (err) { return res.status(400).json(err) }
                    reqUser.reservations = [...reqUser.reservations, newReservation];
                    user.reservations = [...user.reservations, newReservation];
                    reqUser.save(function(err, result) {
                        if (err) { return res.status(400).json(err) }
                        user.save(function(err, result) {
                            if (err) { return res.status(400).json(err) }
                            return res.status(200).json("Successfully asked new reservation")
                        })
                    });
                });
            })
        }
    })
}

function getAllReservation(req, res) {
    ReservationModel.find({
    }, function(err, reservations) {
        if (err) { return res.status(400).json(err)}
        return res.status(200).json(reservations)
    }).populate("members")
}

function addSignature(req, res) {
    let reservationId = req.body.resaId;
    let signature = req.body.signature;

    ReservationModel.find({_id : reservationId}, function(err, reservations) {
        if (err) { return res.status(400).json(err)}
        let reservation = reservations[0];
        UserService.savePicture({picture : signature})
            .then(function (filename) {
                reservation.signatures = [...reservation.signatures, {userId: req.user._id, signature: filename}];
                reservation.save(function (err, resa) {
                    if (err) { return res.status(400).json(err)}
                    console.log(reservation.members);
                    console.log(reservation.members.filter(member => { return member !== req.user._id }));
                    sendToNotifToUsers(reservation.members.filter(member => { return member !== req.user._id }), '', `${req.user.fullname} a signé le contrat`, 'HAS_SIGNED', null);
                    return res.status(200).json(resa)
                })
            })

    })
}

function updateReservationStatus(req, res) {
    let reservationId = req.body.reservationId;
    let newStatus = req.body.newStatus;

    ReservationModel.find({ _id : reservationId}, function(err, reservations) {
        if (err) { return res.status(400).json(err)}
        const reservation = reservations[0];
        reservation.state = newStatus;
        console.log(reservation.isValidating);
        if (newStatus === "NOW" && reservation.isValidating === undefined) {
            reservation.state = "PENDING";
            reservation.isValidating = req.user._id
        }
        reservation.save(function(err, resa) {
            if (err) { return res.status(400).json(err)}
            return res.status(200).json(resa)
        })
    })
}

function postMessage(req, res) {
    let reqUser = req.user;
    let reqContacts = [req.body.contacts];
    let reqMessage = req.body.message;

    UserService.getUsersIdExist(reqContacts).then(function (isUsersExistent) {
        if (!isUsersExistent) {
            return res.status(406).json("User to contact is not found")
        } else {
            DiscussionModel.find({
                $or: [ { members: [reqContacts[0],reqUser._id] },
                    { members: [reqUser._id, reqContacts[0]]} ]
            }, function (err, disscussions) {
                if (err) {
                    return res.status(400).json(err)
                }
                if (disscussions === undefined || disscussions.length === 0) {
                    let message = new MessageModel({message:reqMessage, refUser: [reqUser._id]});
                    console.log("New");
                    message.save(function (err, result) {
                        if (err) {
                            return res.status(400).json(err)
                        }
                        let discussion = new DiscussionModel({members:[req.user._id, ...reqContacts], messages: [result._id]});
                        discussion.save(function(err, result) {
                            if (err) {
                                return res.status(400).json(err)
                            }
                            return res.status(200).json("Successfully added the new message")
                        })
                    });
                }
                else {
                    let message = new MessageModel({message:reqMessage, refUser: [reqUser._id]});
                    console.log("Exist");
                    message.save(function (err, result) {
                        if (err) {
                            return res.status(400).json(err)
                        }
                        disscussions[0].messages = disscussions[0].messages.concat([result]);
                        disscussions[0].save(function(err, result) {
                            if (err) {
                                return res.status(400).json(err)
                            }
                            return res.status(200).json("Successfully added the new message")
                        })
                    })
                }
            })
        }
    });
}

function commentResa(req, res) {
    let reservationId = req.body.resaId;
    let comment = req.body.message;

    ReservationModel.find({ _id : reservationId }, function(err, reservations) {
        if (err) { return res.status(400).json(err) }
        console.log(reservations);
        const reservation = reservations[0];
        reservation.comments = [...reservation.comments, { userId : req.user._id, message : comment }];
        reservation.save(function(err, result) {
            if (err) { return res.status(400).json(err) }
            return res.status(200).json(result)
        })
    })
}

function addCourse(req, res) {
    let courseTime = req.body.time;
    let meetingPlace = req.body.place;

    let newCourse = new CourseModel({members: [req.user._id], state : 'PENDING', meetingPlace: meetingPlace, meetingTime: courseTime});
    newCourse.save(function (err, result) {
        if (err) { return res.status(400).json(err) }
        return res.status(200).json(result)
    })
}

function updateCourse(req, res) {
    let courseId = req.body.courseId;
    let status = req.body.status;

    CourseModel.find({_id : courseId}, function(err, courses) {
        if (err) { return res.status(400).json(err) }
        let course = courses[0];
        if (course.state === "NOW") {
            if (course.members.indexOf(req.user._id) === -1) {
                if (err) { return res.status(400).json("Already Taken") }
            }
        }
        course.members = [...course.members, req.user._id];
        course.state = status;
        course.save(function(err, result) {
            if (err) { return res.status(400).json(err) }
            return res.status(200).json(result)
        })
    })
}

function getCourse(req, res) {
    CourseModel.find({state : 'PENDING'}, function(err, courses) {
        if (err) { return res.status(400).json(err) }
        return res.status(200).json(courses)
    }).populate('members')
}

function getUserCourses(req, res) {
    let userId =  req.query.userId;

    CourseModel.find({ members:{ $all: [userId]}} , function(err, courses) {
        if (err) { return res.status(400).json(err) }
        console.log(courses);
        return res.status(200).json(courses)
    }).populate('members');
    sendNotif('075f7b6ad24fd8ae2e2b4f4d7537462bdbbc1e08ef76a89a3b66efd25079ff11', 'Salut Axel Pd', 'Axel la poufiasse', 'BOTH_SIGNED')
}

function getUserContract(req, res) {
    let userId =  req.query.userId;

    ReservationModel.find({ members: { $all : [userId] }}, function(err, resa) {
        if (err) { return res.status(400).json(err) }
        return res.status(200).json(resa)
    }).populate('members')
}

module.exports = router;
