<?php

session_start();
//On verifie si l'utilisateur est deja connecté. Si oui on le redirige sur index.
if (isset($_SESSION['email'])){
    header("location:index.php");
}

if (isset($_POST['connexion'])){

// Code pour la connexion à la base de données
require_once "dbcon.php";

// Récupération des données du formulaire
$email = $_POST['email'];
$password = $_POST['pass'];
$hashedPass = md5($password);

// Requête SQL pour vérifier les informations de connexion dans la base de données
$sql = "SELECT Prenom FROM Utilisateurs WHERE Email='$email' AND Mot_de_passe='$hashedPass'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    // Utilisateur connecté avec succès
	
	$_SESSION['email']=$email;
    
    // Redirection vers index.php après la connexion
    header("Location: index.php");
    exit();
} else {
    // Erreur de connexion
    echo "Identifiants invalides";
}
}

?>



<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Connexion</title>
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
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="post" action="">
					<span class="login100-form-title">
						Se connecter
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Veuillez entrer votre email">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Veuillez entrer votre mot de passe">
						<input class="input100" type="password" name="pass" placeholder="Mot de passe">
						<span class="focus-input100"></span>
					</div>

					<div class="text-right p-t-13 p-b-23">
						<span class="txt1">
							Mot de passe oublié ?
						</span>

						<a href="#" class="txt2">
							Email / Mot de passe ?
						</a>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit" name="connexion">
							Se connecter
						</button>
					</div>

					<div class="flex-col-c p-t-170 p-b-40">
						<span class="txt1 p-b-9">
							Vous n'avez pas de compte ?
						</span>

						<a href="inscription.php" class="txt3">
							Inscrivez-vous maintenant
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>
