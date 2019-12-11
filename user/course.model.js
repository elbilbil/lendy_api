const mongoose = require('mongoose');

const courseSchema = mongoose.Schema({
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
        type: {
            latitude : Number,
            longitude : Number,
            address : String
        },
        default: {latitude : 43.311360, longitude : 5.370490, address : "Rue Mirès 13003 Marseille"},
    },
    destPlace : {
        type: {
            latitude: Number,
            longitude: Number,
            address: String
        },
        default: {latitude: 43.311360, longitude: 5.370490, address: "Rue Mirès 13003 Marseille"},
    },
    meetingTime : {
        type : Number,
        required: true
    }
});

module.exports = mongoose.model('Course', courseSchema);