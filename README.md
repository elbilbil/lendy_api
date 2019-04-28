# My new project

## Introduction

Api pour le projet Lendy EIP Epitech.  
Base Url : <b><span style="font-size:1.2em;">api.lendy.fr:27031/api/users/</span></b>

## Routes

> Voici le type, la forme et le retour des routes : 

<h4><b><span style="font-size:1.2em;">{POST} /register</span></b>  
>  <h4> Envoi : </h4>
> {  
> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "username": {String},  
> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "password": {String},  
> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "type": {"preteur", "emprunteur"}  
> }
>  <h4> reception (<span style="color:green">success status:200</span>): </h4>
> {  
> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "token": {String},  
> }
>  <h4> reception (<span style="color:red">failed status:409</span>): </h4>
> {  
> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; "error": {String},  
> }
