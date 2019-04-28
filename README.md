
# API Lendy

## Introduction
Api pour le projet Lendy EIP Epitech.  
Base Url : <b><span style="font-size:1.2em;">api.lendy.fr:27031/api/users/</span></b>

# Routes
variable suivi de * sont des requires.  
 - **{POST} /register** :  
 
       Envoi:  
         {  
           "username"*: "String",  
           "password"*: "String",  
           "type"*: ["preteur", "emprunteur"],  
           "sex": ["Homme", "Femme", "Autre"],  
           "cars": "String",  
           "firstname": "String",  
           "lastname": "String",  
           "picture": "String",  
           "numPhone": "String",  
           "age": "String"  
         }  

       Reception: (success: status 200)  
         {  
           "token": "String"  
         }  

       Reception: (failed: status 409)  
         {  
           "error" : "String"  
         }  
         
 - **{POST} /login** :  
 
       Envoi:  
         {  
           "username"*: "String",  
           "password"*: "String"  
         }  

       Reception: (success: status 200)  
         {  
           "token": "String"  
         }  

       Reception: (failed: status 409)  
         {  
           "error" : "String"  
         }  
         
 - **{PATCH} /update** :  
 
       Envoi:  
         {  
           "username": "String",  
           "password": "String",  
           "type": ["preteur", "emprunteur"],  
           "sex": ["Homme", "Femme", "Autre"],  
           "cars": "String",  
           "firstname": "String",  
           "lastname": "String",  
           "picture": "String",  
           "numPhone": "String",  
           "age": "String"  
         }  
         *HEADER :  
            Authorization : Bearer {token}  

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
         
- **{GET} /drivers** :  
 
         *HEADER :  
            Authorization : Bearer {token}  

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
