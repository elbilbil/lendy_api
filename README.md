
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
             "_id": "5cc5fc196c2ab452e3c4e516",
             "username": "vfrefe@gfrefer.fr",
             "password": "fce92a3f272e2b66317611ecb80b9417526c429ca4b02d7ae7c71bf15d843a41",
             "type": "preteur",
             "role": "client",
             "status": "enabled",
             "__v": 0,
             "cars": "Golden Proust",
             "location": {
                 "latitude": 43.31136,
                 "longitude": 5.37049
             },
             "sex": "Homme",
             "createdAt": "2019-04-28T19:16:41.261Z"
         }  

       Reception: (failed: status 40*)  
         {  
           "error" : "String"  
         }  
