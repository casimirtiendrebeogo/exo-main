<?php

session_start();
//On verifie si l'utilisateur est deja connecté. Si oui on le redirige sur index.
if (isset($_SESSION['email'])){
    header("location:index.php");
}


if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['date_naissance']) && isset($_POST['sexe']) && isset($_POST['email']) && isset($_POST['pass'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_naissance = $_POST['date_naissance'];
    $sexe = $_POST['sexe'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // Connexion à la base de données
    require_once "dbcon.php";

    if ($conn) {
        $nom = mysqli_real_escape_string($conn, $nom);
        $prenom = mysqli_real_escape_string($conn, $prenom);
        $date_naissance = mysqli_real_escape_string($conn, $date_naissance);
        $sexe = mysqli_real_escape_string($conn, $sexe);
        $email = mysqli_real_escape_string($conn, $email);

        // Hashage du mot de passe avec MD5
        $hashedPass = md5($pass);

        $query = "INSERT INTO utilisateurs (nom, prenom, Date_de_naissance, sexe, email, mot_de_passe) VALUES ('$nom', '$prenom', '$date_naissance', '$sexe', '$email', '$hashedPass')";

        $result = mysqli_query($conn, $query);

        if ($result) {
            header("Location: connexion.php");
            exit();
        } else {
            echo "Une erreur s'est produite lors de l'inscription. Veuillez réessayer.";
        }

    } 
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
	<title>Inscription</title>
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
				<form class="login100-form validate-form p-l-55 p-r-55 p-t-178" action="" method="POST">
					<span class="login100-form-title">
						Inscription
					</span>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Veuillez entrer votre nom">
						<input class="input100" type="text" name="nom" placeholder="Nom">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Veuillez entrer votre prénom">
						<input class="input100" type="text" name="prenom" placeholder="Prénom">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Veuillez entrer votre date de naissance">
						<input class="input100" type="date" name="date_naissance" placeholder="Date de naissance">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Veuillez entrer votre sexe">
						<input class="input100" type="text" name="sexe" placeholder="Sexe">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-16" data-validate="Veuillez entrer votre email">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Veuillez entrer votre mot de passe">
						<input class="input100" type="password" name="pass" placeholder="Mot de passe">
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							S'inscrire
						</button>
					</div>

					<div class="flex-col-c p-t-170 p-b-40">
						<span class="txt1 p-b-9">
							Vous avez déjà un compte ?
						</span>

						<a href="connexion.php" class="txt3">
							Connectez-vous maintenant
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
