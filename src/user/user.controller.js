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

const ExtractJwt = require('passport-jwt').ExtractJwt;

let mailgun;
if (conf.mailgun.apiKey) {
    mailgun = require('mailgun-js')({
        apiKey: conf.mailgun.apiKey,
        domain: conf.mailgun.domain
    })
}

const authenticate = function (req, res, next) {
    console.log('Authentification');
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
router.delete('/:id', authenticate, deleteUser);

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
                        if (filename) {
                            doc.picture = filename;
                            PicturesService.removeFile(reqUser.picture, 'users')
                                .then(() => {
                                }, err => {
                                    return res.status(400).json(err)
                                })
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

function register(req, res) {
    let userData = req.body;
    console.log(userData);
    if (!userData.username)
        userData.username = userData.email;
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
            PicturesService.removeFile(user.qrcode, 'users')
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
    UserModel.find({type : 'emprunteur', role: 'client', status: 'enabled' }, function(err, users) {
        if (err) {
            return res.status(400).json(err)
        }
        res.status(200).json(users)
    })
}

function getLenders(req, res) {
    UserModel.find({type : 'preteur', role: 'client', status: 'enabled' }, function(err, users) {
        if (err) {
            return res.status(400).json(err)
        }
        res.status(200).json(users)
    })
}

function getMyself(req, res) {
    return res.json(req.user)
}

function getCars(req, res) {
    UserModel.find({type : 'preteur', role: 'client', status: 'enabled' }, function(err, users) {
        if (err) {
            return res.status(400).json(err)
        }
        res.status(200).json(users)
    })
}
module.exports = router;