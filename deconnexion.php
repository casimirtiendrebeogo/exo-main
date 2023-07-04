<?php
session_start();

//On verifie si l'utilisateur est connecté. Si oui on le deconnecte et on le redirige sur connexion.
if (isset($_SESSION['email'])){
    session_destroy();
    header("location:connexion.php");
}

//Sinon on redirige sur connexion.
else{   

    header("location:connexion.php");
}

?>