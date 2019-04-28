
# API Lendy

## Introduction
Api pour le projet Lendy EIP Epitech.  
Base Url : <b><span style="font-size:1.2em;">api.lendy.fr:27031/api/users/</span></b>

# Routes

 - **{POST} /register** :  
 
       Envoi:  
         {  
           "username": "String",  
           "password": "String",  
           "type": ["preteur", "emprunteur"]  
         }  

       Reception: (success: status 200)  
         {  
           "token": "String"  
         }  

       Reception: (failed: status 409)  
         {  
           "error" : "String"  
         }  
