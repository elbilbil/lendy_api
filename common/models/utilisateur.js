'use strict';

module.exports = function(Utilisateur) {

  var app;
  Utilisateur.on('attached', function(a) {
    app = a;
    var User = app.models.user;
    /**
     * sigin un utilisateur
     * @param {string} email l'email de l'utilisateur
     * @param {string} password le password de l'utilisateur
     * @param {Function(Error, string)} callback
     */
    Utilisateur.signin = function(email, password, callback) {
      var jwt = { webToken : "web token a te generer et a te renvoyer" };

      callback(null, jwt);
    };

  });

};
