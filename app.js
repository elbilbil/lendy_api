const _ = require('lodash');
const conf = require('./conf.js');
const jwt = require('jsonwebtoken');
const bodyParser = require('body-parser');
const i18next = require('i18next');
const i18nextMiddleware = require('i18next-express-middleware');
const express = require('express');
const app = express();
const cors = require('cors');

i18next
    .use(i18nextMiddleware.LanguageDetector)
    .init({
        whitelist: ['en', 'fr'],
        fallbackLng: 'fr'
    });

app.use(i18nextMiddleware.handle(i18next));

const UserModel = require('./user/user.model');

const path = require('path');
const passport = require('passport');
const mongoose = require('mongoose');

mongoose.Promise = global.Promise;
mongoose.connect(conf.db.host, conf.db.options);

let mailgun;
if (conf.mailgun.apiKey) {
    mailgun = require('mailgun-js')({
        apiKey: conf.mailgun.apiKey,
        domain: conf.mailgun.domain
    })
}

app.use(bodyParser.json({limit: '20mb'}));
app.use(cors());
app.use('/static', express.static(path.join(__dirname, '../../static')));

const JwtStrategy = require('passport-jwt').Strategy;
const ExtractJwt = require('passport-jwt').ExtractJwt;

passport.use(new JwtStrategy({
    jwtFromRequest: ExtractJwt.fromAuthHeaderAsBearerToken(),
    secretOrKey: conf.secret,
    ignoreExpiration: true
}, function (jwt_payload, done) {
    UserModel.findById(jwt_payload.id)
        .exec(function (err, user) {
            if (err) {
                return done(err, false);
            }
            if (user) {
                return done(null, user);
            } else {
                return done(null, false);
                // or you could create a new account
            }
        })
}));

app.get('/', function (req, res) {
    res.send('Hello World! lang: ' + req.language)
});

//Controllers
app.use('/api/users', require('./user/user.controller'));
app.use('/api/analytics', require('./analytics/analytics.controller'));

app.listen(conf.port, function () {
    console.log('Lendy listening on port ' + conf.port)
});
