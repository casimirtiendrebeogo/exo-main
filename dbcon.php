<?php

//Information de la base de donnnée

$host="localhost";
$username="root";
$mdp="";  // Inserez le mot de passe de la base de donnée
$dbname="exo";  //Inserez le nom de la base de donnée

//Creation de la connexion à la base de donnée

$conn= mysqli_connect($host, $username, $mdp, $dbname);

//Verification de la connexion

if(!$conn){
    die("Un problème est survenu lors de la connexion à la base de donnée: ".mysqli_connect_error());
}

?>