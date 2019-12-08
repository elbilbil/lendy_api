const mongoose = require('mongoose');

const reservationSchema = mongoose.Schema({
    since : {
        type : Number,
        required: true
    },
    to : {
        type : Number,
        required: true
    },
    createdAt: {
        type: Date,
        default: Date.now
    },
    members: {
        type: [{ type : [mongoose.Schema.Types.ObjectId]}],
        required: true
    },
    state : {
        type: String,
        enum: ['PENDING', 'NOW', 'PASSED', 'CANCELED'],
        default : 'PENDING',
        required: true
    },
    meetingPlace : {
        type: {
            latitude : Number,
            longitude : Number,
            address : String
        },
        default: {latitude : 43.311360, longitude : 5.370490, address : "Rue Mirès 13003 Marseille"},
    },
    meetingTime : {
        type : Number,
        required: true
    },
    isValidating : {
        type: { type : mongoose.Schema.Types.ObjectId, ref: 'User' },
    },
    comments : {
        type : [{
            userId :  { type : mongoose.Schema.Types.ObjectId, ref: 'User' },
            message : String
        }]
    },
    signatures : {
        type : [{ userId : mongoose.Schema.Types.ObjectId, ref: 'User', image : String}],
        default : []
    }
});

module.exports = mongoose.model('Reservation', reservationSchema);