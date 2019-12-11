const mongoose = require('mongoose');

const notifModel = mongoose.Schema({
    member: {
        type: [{ type : [mongoose.Schema.Types.ObjectId], ref: 'User' }],
        required: true
    },
    token : {
        type : String,
        required: true
    }
});

module.exports = mongoose.model('Notification', notifModel);