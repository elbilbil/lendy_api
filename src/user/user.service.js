const conf = require('../conf.js');
const Model = require('./user.model');
const jwt = require('jsonwebtoken');
const crypto = require('crypto');
const passport = require('passport');
const ExtractJwt = require('passport-jwt').ExtractJwt;
const path = require('path');
const base64Img = require('base64-img');
const UserModel = require('./user.model');
const QRCode = require('qrcode');
var fs = require('fs');

let mailgun;
if (conf.mailgun.apiKey) {
    mailgun = require('mailgun-js')({
        apiKey: conf.mailgun.apiKey,
        domain: conf.mailgun.domain
    })
}

class UserService {

    constructor() {
    }

    encrypt(str) {
        const hash = crypto.createHash('sha256');
        hash.update(str);

        return hash.digest('hex');
    }

    authOrAnonymous(req, res, next) {
        let token = (ExtractJwt.fromAuthHeaderAsBearerToken())(req);
        if (!token) {
            req.user = {
                role: 'anonymous'
            };

            return next()
        }
        passport.authenticate('jwt', {
            session: false
        })(req, res, next)
    }

    login(username, password) {
        username = username.trim();
        return new Promise((resolve, reject) => {
            Model.findOne({
                username: username,
                password: this.encrypt(password)
            })
                .sort({
                    status: -1
                })
                .exec(function (err, user) {
                    if (err)
                        return reject(err);
                    if (!user)
                        return reject('emailPawssordInvalid');
                    if (user && (user.role == 'client' && user.status != 'enabled'))
                        return reject('player_not_enabled');
                    let token = jwt.sign({
                        id: user.id
                    }, conf.secret);
                    resolve(token)
                })
        })
    }

    getNicknameExist(userData) {
        return new Promise(function (resolve, reject) {
            if (!userData.nickname)
                return resolve();
            UserModel.findOne({
                        nickname: userData.nickname
                    })
                .sort('-createdAt')
                .exec(function (err, nicknameExist) {
                    if (err || !nicknameExist)
                        resolve();
                    else
                        resolve(nicknameExist)
                })
        })
    }

    getUserExist(userData) {
        return new Promise(function (resolve, reject) {
            if (!userData.username)
                return resolve();
            UserModel.findOne(
                    {
                        username: userData.username
                    })
                .sort('-createdAt')
                .exec(function (err, userExist) {
                    console.log("getUserExist");
                    console.log(userExist);
                    console.log(err);
                    if (err || !userExist)
                        resolve();
                    else
                        resolve(userExist)
                })
        })
    }


    savePicture(userData) {
        return new Promise(function (resolve, reject) {
            if (!userData.picture)
                resolve();
            else {
                let filename = 'img-' + new Date().getTime();
                let destpath = path.join(__dirname, '../../../static/images/users');
                base64Img.img(userData.picture, destpath, filename, function (err, filepath) {
                    if (err)
                        resolve();
                    else {
                        resolve(filepath.split('/').pop())
                    }
                })
            }
        })
    }

    getUserPictureContent(userData) {
        return new Promise(function(resolve, reject) {
            if (userData.picture.length === 0)
                resolve();
            let url = path.join(__dirname, '../../../static/images/users/')+ userData.picture;
            fs.readFile(url, function(err, data) {
                resolve(data.toString('base64'));
            })
        })
    }

    generateQrcode(id) {
        return new Promise(function (resolve, reject) {
            let filename = 'qrcode-' + new Date().getTime();
            let destpath = path.join(__dirname, '../../../static/images/users');
            QRCode.toFile(destpath + '/' + filename + '.png', "user" + id, function (err) {
                if (err) reject(console.log('err'));
                resolve(filename + '.png')

            })
        })
    }

    isEmailValid(userMail) {
        if (userMail.length === 0)
            return false;
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(userMail.toLowerCase());
    }
}

module.exports = new UserService();
