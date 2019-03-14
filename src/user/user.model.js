const mongoose = require('mongoose');
const uniqueValidator = require('mongoose-unique-validator');

const userSchema = mongoose.Schema({
    createdAt: {
        type: Date,
        default: Date.now
    },
    role: {
        type: String,
        enum: ['superadmin', 'client'],
        required: true
    },
    status: {
        type: String,
        enum: ['draft', 'enabled']
    },
    username: {
        type: String,
        required: true
    },
    type: {
        type: String,
        required:true,
        validate : function() {
          return ['preteur', 'emprunteur'].indexOf(this.type) >= 0
        }
    },
    sex : {
        type : String,
        required:false,
        validate : function() {
            return ['Homme', 'Femme', 'Autre'].indexOf(this.sex) >= 0
        },
        default : "Homme"
    },
    password: {
        type: String,
        required: true
    },
    location: {
        type: {
            latitude : Number,
            longitude : Number
        },
        default: {latitude : 43.311360, longitude : 5.370490},
        index: {
            type: '2dsphere',
            sparse: true
        }
    },
    cars : {
        type: String,
        default: 'Golden Proust'
    },
    defaultPassword: String,
    email: String,
    firstname: String,
    lastname: String,
    picture: String,
    qrcode: String,
    numPhone: String,
    age: String
}, {
    strict: false
});

userSchema.index({
    username: 'text',
    firstname: 'text',
    lastname: 'text'
});

userSchema.pre('save', function (next) {
    console.log('User save');
    let UserService = require('./user.service');
    this.password = UserService.encrypt(this.password);
    next()
});

userSchema.plugin(uniqueValidator);
module.exports = mongoose.model('User', userSchema);