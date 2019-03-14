module.exports = {
  port: 27031,
  secret: 'TOTO',
  db: {
    host: 'mongodb://localhost:27017/',
    options: {
      useMongoClient: true
    }
  },
  mailgun: {
    apiKey: '',
    domain: ''
  },
  webAppURL: '<url>'
};
