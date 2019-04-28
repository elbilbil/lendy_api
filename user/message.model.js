const mongoose = require('mongoose');

const messageSchema = mongoose.Schema({
    message : String,
    createdAt: {
        type: Date,
        default: Date.now
    },
    refUser: {
        type: { type: mongoose.Schema.Types.ObjectId, ref: 'User' }
    }
});

module.exports = mongoose.model('Message', messageSchema);