
# API Lendy

## Introduction
Api pour le projet Lendy EIP Epitech.  
Base Url : <b><span style="font-size:1.2em;">api.lendy.fr:27031/api/users/</span></b>

Directive de lancement le serveur :

// Lancement de la base de donnée MongoDb en background

sudo mongod &

// Installation des modules open sources utiliser par le projet

npm install

// Lancement du serveur

node app.js

# Routes
variable suivi de * sont des requires.  

 - **{POST} /register** :  
 
       Envoi:  
         {  
           "username"*      : String,  
           "password"*      : String,  
           "type"*          : String : ["preteur", "emprunteur"],  
           "sex"            : String : ["Homme", "Femme", "Autre"],  
           "cars"           : String,  
           "firstname"      : String,  
           "lastname"       : String,  
           "picture"        : String,  
           "numPhone"       : String,
           "city"           : String,
           "adresse"        : String,
           "age"            : String,
           "adTitle"        : String,
           "adDescription"  : String,
           "location"       : { "latitude" : Double, "longitude" : Double },
           "cars"           : String
         }  

       Reception: (success: status 200)  
         {  
           "token"  : String
         }  

       Reception: (failed: status 409)  
         {  
           "error" : String
         }  
         
 - **{POST} /login** :  
 
       Envoi:  
         {  
           "username"*  : String,  
           "password"*  : String  
         }  

       Reception: (success: status 200)  
         {  
           "token"  : "String"  
         }  

       Reception: (failed: status 409)  
         {  
           "error"  : "String"  
         }  
         
 - **{PATCH} /update** :  
 
 
      *HEADER :  
            Authorization : Bearer {token}  

       Envoi:  
         {  
           "username"       : String,  
           "password"       : String,  
           "type"           : String : ["preteur", "emprunteur"],  
           "sex"            : String : ["Homme", "Femme", "Autre"],  
           "cars"           : String,  
           "firstname"      : String,  
           "lastname"       : String,  
           "picture"        : String,  
           "numPhone"       : String,
           "city"           : String,
           "adresse"        : String,
           "age"            : String,
           "adTitle"        : String,
           "adDescription"  : String,
           "location"       : { "latitude" : Double, "longitude" : Double },
           "cars"           : String
         }

       Reception: (success: status 200)  
         {  
            "_id"            : String,  
            "username"       : String,  
            "password"       : String,  
            "type"           : String : ["preteur", "emprunteur"],  
            "sex"            : String : ["Homme", "Femme", "Autre"],  
            "cars"           : String,  
            "firstname"      : String,  
            "lastname"       : String,  
            "picture"        : String,  
            "numPhone"       : String,
            "city"           : String,
            "adresse"        : String,
            "age"            : String,
            "adTitle"        : String,
            "adDescription"  : String,
            "location"       : { "latitude" : Double, "longitude" : Double },
            "cars"           : String
            "lastConnection" : Date  
         }  

       Reception: (failed: status 40*)  
         {  
           "error" : "String"  
         }  
         
- **{GET} /drivers** :  
 
       *HEADER :  
            Authorization : Bearer {token}  
            
       QueryParams (Non obligatoire) : {
            latitude    : Double,
            longitude   : Double,
            distance    : Double
       }

       Reception: (success: status 200)  
         {  
             "_id": "String",  
             "username": "String",  
             "password": "String",  
             "type": "preteur, emprunteur",  
             "role": "client",  
             "status": "enabled",  
             "__v": 0,  
             "cars": "String",  
             "location": {  
                 "latitude": float,  
                 "longitude": float  
             },
             "sex": "Homme, Femme, Autre",  
             "createdAt": Date  
         }  

       Reception: (failed: status 40*)  
         {  
           "error"  : "String"  
         }  

- **{GET} /lenders** :  
 
       *HEADER :  
            Authorization : Bearer {token}  

       QueryParams (Non obligatoire) : {
            latitude    : Double,
            longitude   : Double,
            distance    : Double
       }
       
       Reception: (success: status 200)  
         {  
             "_id": "String",  
             "username": "String",  
             "password": "String",  
             "type": "preteur, emprunteur",  
             "role": "client",  
             "status": "enabled",  
             "__v": 0,  
             "cars": "String",  
             "location": {  
                 "latitude": float,  
                 "longitude": float  
             },
             "sex": "Homme, Femme, Autre",  
             "createdAt": Date  
         }  

       Reception: (failed: status 40*)  
         {  
           "error" : "String"  
         }  

- **{GET} /myself** :  
 
         *HEADER :  
            Authorization : Bearer {token}  

       Reception: (success: status 200)  
         {  
            "_id"            : String,  
            "username"       : String,  
            "password"       : String,  
            "type"           : String : ["preteur", "emprunteur"],  
            "sex"            : String : ["Homme", "Femme", "Autre"],  
            "cars"           : String,  
            "firstname"      : String,  
            "lastname"       : String,  
            "picture"        : String,  
            "numPhone"       : String,
            "city"           : String,
            "adresse"        : String,
            "age"            : String,
            "adTitle"        : String,
            "adDescription"  : String,
            "location"       : { "latitude" : Double, "longitude" : Double },
            "cars"           : String
            "lastConnection" : Date
         }  

       Reception: (failed: status 40*)  
         {  
           "error" : "String"  
         }  
         
##Essayez sur postman les request !!
