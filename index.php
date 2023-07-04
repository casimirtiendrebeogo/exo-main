<?php

require_once "dbcon.php";

// Vérification si l'utilisateur est connecté
session_start();
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Requête SQL pour récupérer le prénom de l'utilisateur connecté
    $sql = "SELECT Prenom FROM Utilisateurs WHERE Email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Récupération du prénom de l'utilisateur
        $row = mysqli_fetch_assoc($result);
        $prenom = $row['Prenom'];

    }
}

else{
	header("location:connexion.php");
	die;
}

?>




<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Login V8</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->	
		<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->	
		<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->	
		<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
		<link rel="stylesheet" type="text/css" href="css/util.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
	</head>
<body>
	<div class="login100-form-title">
		<span>Bienvenue <?= $prenom ?></span>
	</div>
	<div class="flex-col-c p-t-170 p-b-40">
		<a href="deconnexion.php" class="txt3">
			Deconnexion
		</a>
	</div>
</body>
</html>