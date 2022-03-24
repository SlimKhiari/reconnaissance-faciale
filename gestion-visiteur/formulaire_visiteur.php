<?php

    spl_autoload_register(function ($class_name) {
        include 'Classes/'. $class_name . '.php';
    });

   
	//ERRORS
	$error = '';
	if(isset($_GET[sha1('exc_problem')])) $error = 'Server issues, please try  again!';


	//SUCCESS
	$success = '';
	if(isset($_GET[sha1('demande_sended')])) $success = "La demande a été envoyer avec succès";
	





?>
<html lang="en">
<head>
	<title>Demande d'entrer à l'entreprise </title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="img/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
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

	<link rel="stylesheet" type="text/css" href="css_form/util.css">
	<link rel="stylesheet" type="text/css" href="css_form/main.css">

	<link rel="stylesheet" type="text/css" href="css/erreurs.css">

<!--===============================================================================================-->
</head>
<body>

    <!-- Erreurs -->
	<div class="global-errors" id="global-errors" onclick="location.href='formulaire_visiteur.php'">
				<?php
				if($error != "") {
					echo "<p>$error</p>";
				}
				?>
			</div>
			<!-- SUCCESS -->
			<div class="global-success" id="global-success" onclick="location.href='formulaire_visiteur.php'" >
				<?php
				if($success != "") {
					echo "<p>$success</p>";
				}
				?>
			</div>

	<div class="container-contact100">
		<div class="wrap-contact100">
			<form action="actions/Add_demande.php" class="contact100-form validate-form" method="post" enctype="multipart/form-data"  role="form">
				<span class="contact100-form-title">
					Effectuer votre demande d'entrer à l'entreprise
				</span>

				<label class="label-input100" for="first-name">Veuillez entrer votre nom complet *</label>
				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Type first name">
					<input id="first-name" class="input100" type="text" name="first-name" placeholder="Prénom" required>
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 rs2-wrap-input100 validate-input" data-validate="Type last name">
					<input class="input100" type="text" name="last-name" placeholder="Nom" required>
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="email">Veuillez entrer votre email *</label>
				<div class="wrap-input100 validate-input" data-validate = "Un email valide est requis: ex@abc.xyz " required>
					<input id="email" class="input100" type="text" name="email" placeholder="Eg. exemple@email.com">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="phone">Veuillez entrer votre numéro de téléphone *</label>
				<div class="wrap-input100 validate-input" data-validate = "Un numéro de téléphone valide est requis">
					<input id="phone" class="input100" type="tel" name="phone" placeholder="Eg.+33 1 23 45 67 89" pattern="[0]{1}[6-7]{1}[0-9]{8}" required>
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="message">Veuillez entrer votre motif *</label>
				<div class="wrap-input100 validate-input" data-validate = "Le motif est requis">
					<textarea id="message" class="input100" name="message" placeholder="Écrivez-nous un message" required></textarea>
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="pieceIdentite">Veuillez entrer le fichier de votre pièce d'identité *</label>
				<div class="wrap-input100 validate-input"  data-validate = "La pièce d'identité est requis">
					<input id="pieceIdentite" name="pieceIdentite" class="input100" style="margin-top: 30px;" type="file"  multiple required>
					<span class="focus-input100"></span>
				</div>

				
				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						Envoyez votre demande
					</button>
				</div>
			</form>

			<div class="contact100-more flex-col-c-m" style="background-image: url('img/bg-01.jpg');">
				<div class="flex-w size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-map-marker"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Adresse
						</span>

						<span class="txt2">
							10-12 Av. de l'Europe, 78140 Vélizy-Villacoublay
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-phone-handset"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Nous contacter
						</span>

						<span class="txt3">
							(+33) 01 39 25 38 50
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-envelope"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Support général
						</span>

						<span class="txt3">
							administration@isty.uvsq.fr
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>



	<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
</body>
</html>
