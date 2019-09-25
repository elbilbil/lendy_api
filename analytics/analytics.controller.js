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
const UserService = require('../user/user.service');
const UserModel = require('../user/user.model');
const DiscussionModel = require('../user/discussion.model');
const MessageModel = require('../user/message.model');
var ObjectId = require('mongodb').ObjectID;
var PicturesService = require('../utilities/pictures.service');

const ExtractJwt = require('passport-jwt').ExtractJwt;

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

router.get('/users_stats', authenticate, getNumberStats);
router.get('/users_messages_stats', authenticate, getNumberMessages);
router.get('/runs', authenticate, getNumbersRun);
router.get('/runs_details', authenticate, getCurrentRuns);
router.get('/contracts', authenticate, getContracts);
router.get('/contracts_details', authenticate, getCurrentContracts);
router.get('/locations', authenticate, getAllUserLocation);

function getNumberStats(req, res) {
    /*let allowedRoles = ['superadmin'];
    if (allowedRoles.indexOf(req.user.role) < 0)
        return res.status(403).json({
            allowedRoles: allowedRoles,
            requesterRole: req.user.role
        });*/
    UserModel.find({ role : 'client', status : 'enabled'}, function (err, users) {
        if (err) { return res.status(400).json(err) }
        UserModel.find({type : 'preteur', role: 'client', status: 'enabled' }, function(err, preteur) {
            if (err) { return res.status(400).json(err) }
            UserModel.find({type : 'emprunteur', role: 'client', status: 'enabled' }, function(err, emprunteur) {
                if (err) { return res.status(400).json(err) }
                return res.status(200).json({ numberUsers : users.length, preteur : preteur.length, emprunteur : emprunteur.length})
            });
        });
    })
}

function getNumberMessages(req, res) {
/*let allowedRoles = ['superadmin'];
if (allowedRoles.indexOf(req.user.role) < 0)
    return res.status(403).json({
        allowedRoles: allowedRoles,
        requesterRole: req.user.role
    });*/

let reqContacts = req.params.usersId;
UserService.getUsersIdExist(reqContacts).then(function (isUsersExistent) {
    if (!isUsersExistent) {
        return res.status(406).json("User to contact is not found")
    } else {
        DiscussionModel.find({
            $or: [ { members: [reqContacts[0], reqContacts[1]] },
                { members: [reqContacts[1], reqContacts[0]]} ]
        }, async function (err, discussions) {
            if (err) {
                return res.status(400).json(err)
            }
            console.log(discussions.length);
            if (discussions === undefined || discussions.length === 0) {
                console.log("New");
                return res.status(200).json({ messages : 0 })
            }
            else {
                console.log("Exist");
                return res.status(200).json( { messages : discussions[0].messages.length })
            }
        })
    }
});
}

function getNumbersRun(req, res) {
/*let allowedRoles = ['superadmin'];
if (allowedRoles.indexOf(req.user.role) < 0)
    return res.status(403).json({
        allowedRoles: allowedRoles,
        requesterRole: req.user.role
    });*/
return res.status(200).json({ runs : 23 })
}

function getCurrentRuns(req, res) {
/*let allowedRoles = ['superadmin'];
if (allowedRoles.indexOf(req.user.role) < 0)
    return res.status(403).json({
        allowedRoles: allowedRoles,
        requesterRole: req.user.role
    });*/
return res.status(200).json([ {startTime : 1569078980728, finishTime : 1569078980739, location : {latitude : 43.311360, longitude : 5.370490} }])
}

function getContracts(req, res) {
/*let allowedRoles = ['superadmin'];
if (allowedRoles.indexOf(req.user.role) < 0)
    return res.status(403).json({
        allowedRoles: allowedRoles,
        requesterRole: req.user.role
    });*/
return res.status(200).json({contracts : 25})
}

function getCurrentContracts(req, res) {
/*let allowedRoles = ['superadmin'];
if (allowedRoles.indexOf(req.user.role) < 0)
    return res.status(403).json({
        allowedRoles: allowedRoles,
        requesterRole: req.user.role
    });*/
return res.status(200).json({ contracts : 3 })
}

function getAllUserLocation(rew, res) {
UserModel.find({ role : 'client', status : 'enabled'}, function (err, users) {
    if (err) return res.status(403).json(err);
    let usersLocation = [];
    for (let user in users) {
        usersLocation.push(user.location)
    }
    return res.status(200).json(usersLocation);
})
}
module.exports = router;