const mongoose = require('mongoose');

const notifModel = mongoose.Schema({
    member: {
        type : mongoose.Schema.Types.ObjectId,
        required: true
    },
    token : {
        type : String,
        required: true
    }
});

module.exports = mongoose.model('Notification', notifModel);