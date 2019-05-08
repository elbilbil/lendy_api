const mongoose = require('mongoose');

const messageSchema = mongoose.Schema({
    message : {
        type : String,
        required: true
    },
    createdAt: {
        type: Date,
        default: Date.now
    },
    refUser: {
        type: [{ type: mongoose.Schema.Types.ObjectId, ref: 'User' }],
        default: []
    },
    hasBeenViewed : {
        type : Boolean,
        default: false
    }
});

module.exports = mongoose.model('Message', messageSchema);