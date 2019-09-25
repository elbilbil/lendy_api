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
    adTitle: {
        type: String
    },
    adDescription: {
        type: String
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
            longitude : Number,
            address : String
        },
        default: {latitude : 43.311360, longitude : 5.370490, address : "Rue Mirès 13003 Marseille"},
        index: {
            type: '2dsphere',
            sparse: true
        }
    },
    ratings : {
        type : [{
            username : String,
            message  : String,
            image    : String,
            rate     : Number
        }],
        default : [ { username : "Paul Heyraud", message : "Excellent efficace et courtois je recommande", rate : 4, image : "" } ]
    },
    reservations : {
        type : [{ type: mongoose.Schema.Types.ObjectId, ref: 'User' }],
        default : []
    },
    car : {
        type: {
            model : String,
            types : String,
            transmission : String,
            km : Number,
            picture : String
        },
        default : {
            model : "Cliot 4",
            types : "Citadine",
            transmission : "Automatique",
            km : 70000,
            picture : "https://www.largus.fr/images/images/lamborghini-urus-01.jpg?width=612&quality=80"
        }
    },
    defaultPassword: String,
    email: String,
    firstname: String,
    lastname: String,
    picture: String,
    qrcode: String,
    numPhone: String,
    city: String,
    adresse: String,
    age: String,
    lastConnection: {
        type: Date,
        default: Date.now
    }
}, {
    strict: false
});

userSchema.virtual('rating').get(function () {
    var finalRate = 0;
    this.ratings.forEach(rating => {
        finalRate += rating.rate
    });
    finalRate = (this.ratings.length > 0) ? (finalRate / this.ratings.length) : 0;
    return finalRate
});

userSchema.virtual('fullName').get(function () {
    return this.lastname + " " + this.firstname
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

userSchema.set('toJSON', {
    virtuals: true
});

userSchema.plugin(uniqueValidator);
module.exports = mongoose.model('User', userSchema);