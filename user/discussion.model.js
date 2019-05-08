const mongoose = require('mongoose');

const discussionSchema = mongoose.Schema({
    messages: {
        type: [{ type: mongoose.Schema.Types.ObjectId, ref: 'Message' }],
        default: []
    },
    members: [{ type: mongoose.Schema.Types.ObjectId, ref: 'User' }]
});

discussionSchema.virtual('lastMessage').get(function () {
    console.log(this.messages)
});

module.exports = mongoose.model('Discussion', discussionSchema);