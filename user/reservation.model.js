const mongoose = require('mongoose');

const reservationSchema = mongoose.Schema({
    since : {
        type : Date,
        required: true
    },
    to : {
        type : Date,
        required: true
    },
    createdAt: {
        type: Date,
        default: Date.now
    },
    members: {
        type: [{ type : [mongoose.Schema.Types.ObjectId], ref: 'User' }],
        required: true
    },
    state : {
        type: String,
        enum: ['PENDING', 'NOW', 'PASSED', 'CANCELED'],
        default : 'PENDING',
        required: true
    },
    meetingPlace : {
        type : String,
        required: true
    },
    meetingTime : {
        type : Date,
        required: true
    },
    isValidating : {

    }
});

module.exports = mongoose.model('Reservation', reservationSchema);