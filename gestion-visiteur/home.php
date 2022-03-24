<?php

	session_start();

    spl_autoload_register(function ($class_name) {
        include 'Classes/'. $class_name . '.php';
    });

    if(!isset($_SESSION['Id_acc'])) {
        header('Location: /gestion-visiteur/');
        die();
    }

	if(isset($_POST['logout_button'])) {
		session_destroy();
		header('Location: /gestion-visiteur/');
	}

	$accueil = Accueil::findBy($_SESSION['Id_acc']);
   // $accueil = Accueil::findBy(2);
    $afficher_visiteurs	=	array();
    $afficher_visiteursAccp = array();
    $afficher_visiteursREJ = array();

	//initialisation des variables
	if($accueil->getDescription()=="ACC"){
		$afficher_visiteurs = Visiteur::getAllVisiteur();
      //  $afficher_visiteursAccp = Visiteur::getVisiteur_accepter();
      //  $afficher_visiteursREJ = Visiteur::getVisiteur_rejeter();
		
	}
	//ERRORS
	$error = '';
	if(isset($_GET[sha1('exc_problem')])) $error = 'Server issues, please try  again!';
    if(isset($_GET[sha1('visiteur_rejected')])) $error = "La demande du visiteur a ete bien rejeter, un mail automatique a été envoyer pour lui informer";
    if(isset($_GET[sha1('email_used')])) $error = 'Email est déja utilisé par un autre compte!';
    if(isset($_GET[sha1('password_wrong')])) $error = 'le mot de passe donné est incorrect!';
	if(isset($_GET[sha1('password_confirmation_wrong')])) $error = 'Le mot de passe de confirmation est faux!';

	//SUCCESS
	$success = '';
	if(isset($_GET[sha1('visiteur_accepted')])) $success = "La demande du visiteur a ete bien accepter, un mail automatique a été envoyer pour lui informer";
    if(isset($_GET[sha1('info_edit')])) $success = "Vous avez bien modifié vos informations!";






?>

<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
	<title>Gestion de visiteur</title>

	<link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/erreurs.css">

    <!-- liens bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css"/>
  	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
	<link rel="stylesheet" href="jquery-ui.min.css" />
	<script src="js/jquery.js"></script>
	<script src="js/jquery-ui.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <SCRIPT>
                //allvisit
        function ShowAndHide1() {
            var x1 = document.getElementById('chi1');
            var y1 = document.getElementById('hid1');
            if (x1.style.display == 'none') {
                x1.style.display = 'grid';
                y1.innerHTML = "voir moins";
            }
                else {
                x1.style.display = 'none';
                y1.innerHTML = "voir plus";
            }
        }
        //accvisit
        function ShowAndHide2() {
            var x2 = document.getElementById('chi2');
            var y2 = document.getElementById('hid2');
            if (x2.style.display == 'none') {
                x2.style.display = 'grid';
                y2.innerHTML = "voir moins";
            }
                else {
                x2.style.display = 'none';
                y2.innerHTML = "voir plus";
            }
        }
        //rejevisit
        function ShowAndHide3() {
            var x3 = document.getElementById('chi3');
            var y3 = document.getElementById('hid3');
            if (x3.style.display == 'none') {
                x3.style.display = 'grid';
                y3.innerHTML = "voir moins";
            }
                else {
                x3.style.display = 'none';
                y3.innerHTML = "voir plus";
            }
        }
        //visiteur
        function ShowVisit() {
            var c = document.getElementById('pageAcc');
        
                c.style.display = 'none';
            
        }
                
        jQuery(document).ready(function($) {
        $('.resume') .hide()
        $('a[href^="#"]').on('click', function(event) {
        $('.resume') .hide()
            var target = $(this).attr('href');

            $('.resume'+target).toggle();

        });
        });
    </SCRIPT>
  	
</head>
<body>
    <!-- Erreurs -->
    <div class="global-errors" id="global-errors" onclick="location.href='home.php'">
				<?php
				if($error != "") {
					echo "<p>$error</p>";
				}
				?>
			</div>
	<!-- SUCCESS -->
			<div class="global-success" id="global-success" onclick="location.href='home.php'" >
				<?php
				if($success != "") {
					echo "<p>$success</p>";
				}
				?>
			</div>



	<div class="conta">
		<div class="navigation">
			<ul>
				<li>
					<a href="#">
						<span class="icon"><ion-icon name="diamond"></ion-icon></ion-icon></span>
						<span class="title">Projet interfilière  - ISTY</span>
					</a>
				</li>
				<li>
					<a href="#expe1" ONCLICK="ShowVisit()">
						<span class="icon"><ion-icon name="home-outline"></ion-icon></span>
						<span class="title">visiteur</span>
					</a>
				</li>
				<li>
					<a href="#expe2" ONCLICK="document.getElementById('pageAcc').style.display='none';">
						<span class="icon"><ion-icon name="calendar-outline"></ion-icon></span>
						<span class="title">visiteur Accepter</span>
					</a>
				</li>
				<li>
					<a href="#expe3" ONCLICK="document.getElementById('pageAcc').style.display='none';">
						<span class="icon"><ion-icon name="calendar-outline"></ion-icon></span>
						<span class="title">visiteur Refuser</span>
					</a>
				</li>

			</ul>
			
		</div>
	</div>
		<!-- main -->
		<div class="mi">
		<div class="topbar">
			<div class="toggle">
				<ion-icon name="menu-outline"></ion-icon>
			</div> 
			<div class="actpg" id="actpg">
				<span class="title" > GESTION DE VISITEURS</span>
			</div>
			
			<!-- username -->
			<div class="username">
				<div class="dropdown">
				    <button class="dropbtn">Hello <?= $accueil->getPrenom() ?> 
				      <i class="fa fa-caret-down"></i>
				    </button>
				    <div class="dropdown-content">
                      <input id="account" name="MonCompte" style="border: none;background: none;align-content: center;padding-left: 19px;" type="button" class="edu-icon edu-locked author-log-ic" aria-hidden="true" value="Mon compte" onclick="document.getElementById('pageAcc').style.display='flex';document.getElementById('expe1').style.display='none';document.getElementById('expe2').style.display='none';document.getElementById('expe3').style.display='none';"  >
                      <form action="home.php" method="post">
                        <button type="submit" name="logout_button" class="edu-icon edu-locked author-log-ic" style="border: none;background: none;align-content: center;padding-left: 19px;" onclick="return confirm('Etes-vous sur de se déconnecter ?')">Se deconnecter</button>
                      </form>
				    </div>
  				</div> 
                                                
		</div>

	</div>
		
<!-- hhhhhhhhhhhh -->
			<div class="pageAcc" id="pageAcc">
                <div id="account-action" >
                        <div class="row">
                            <!-- EDIT My EMAIL/ Password  -->
                                <?php
                                    include("includes/modifierMyInfo.php");
                                ?>
                        </div>
                </div>

			</div>
			<div class="visteur resume" id="expe1">
            <?php $afficher_visiteurs = Visiteur::getAllVisiteur();?>
                <?php if(count($afficher_visiteurs)) : ?>
                <div class="chi">
               
                    <?php for($i=0;$i<count($afficher_visiteurs);$i++) : ?>
                        <form action="actions/Acceptation.php?code=<?= $afficher_visiteurs[$i]->getID() ?>" method="POST" class="cho" style="display: block">

                                        <div class="panel-body custom-panel-jw">
                                            
                                            <h2><?= $afficher_visiteurs[$i]->getNom() ?> <?= $afficher_visiteurs[$i]->getPrenom() ?></h2>
                                            <h3>Motif:</h3>
                                            <p>
                                            <?= $afficher_visiteurs[$i]->getMotif() ?> 
                                            </p>
                                        </div>
                                        <div class="panel-footer contact-footer">
                                            <input name="Demande_accepté" type="submit" style="margin-right: 20px"  class="btn btn-custon-rounded-three btn-success"  value="Accepter" onclick="return confirm('Etes-vous sur d\'accepter cette demande?')">

                                            <input name="AffichePI" style="margin-right: 20px" type="button" class="btn btn-custon-rounded-three btn-primary" aria-hidden="true" value="Identite" onclick="document.getElementById('AffichePieceId<?=$afficher_visiteurs[$i]->getID()?>').style.display='flex';document.getElementById('ombre').style.display='flex';"  >

                                            <input name="Demande_rejeté" type="submit" style="margin-right: 20px"  class="btn btn-custon-rounded-three btn-danger" value="Refuser" onclick="return confirm('Etes-vous sur de supprimer cette demande?')">
                                        </div>
                        </form>

                         <!-- popUP afficher piece identité -->
								<div id="AffichePieceId<?=$afficher_visiteurs[$i]->getID()?>" class="AfPi">
									<div class="modal-contents">
										<div class="close" onclick="document.getElementById('AffichePieceId<?=$afficher_visiteurs[$i]->getID()?>').style.display='none';document.getElementById('ombre').style.display='none';">+</div>
											<!-- afficher la piece identité  -->
											<?php
												include("includes/afficher_pieceID.php");
											?>
										</div>
									</div>
                    <?php endfor; ?>
                            
                </div>
		
		    	<BUTTON ONCLICK="ShowAndHide1()"class="btn btn-custon-rounded-three btn-primary" id='hid1'>afficher plus</BUTTON>
                <?php else :        echo "Aucune Visiteur a été trouver"; endif; ?>	
			</div>


			<div class="AccVisit resume" id="expe2">
                <?php $afficher_visiteurs = Visiteur::getVisiteur_accepter();?>
                <?php if(count($afficher_visiteurs)) : ?>
                <div class="chi">
                    <?php for($i=0;$i<count($afficher_visiteurs);$i++) : ?>
                        <div class="cho" style="display: block">
                                <div class="panel-body custom-panel-jw">
                                    
                                <h2><?= $afficher_visiteurs[$i]->getNom() ?> <?= $afficher_visiteurs[$i]->getPrenom() ?></h2>
                                     <h3>Motif:</h3>
                                     <p>
                                         <?= $afficher_visiteurs[$i]->getMotif() ?> 
                                     </p>

                                </div>
                                <div class="panel-footer contact-footer">

                                   <button type="button" class="btn btn-custon-rounded-three btn-primary"  onclick="document.getElementById('AffichePieceIdVacp<?=$afficher_visiteurs[$i]->getID()?>').style.display='flex';document.getElementById('ombre').style.display='flex';"><i class="fa fa-info-circle edu-informatio" aria-hidden="true"></i> Identite</button>

                                </div>
                        </div>
                          <!-- popUP afficher piece identité -->
						<div id="AffichePieceIdVacp<?=$afficher_visiteurs[$i]->getID()?>" class="AfPi">
							    <div class="modal-contents">
									<div class="close" onclick="document.getElementById('AffichePieceIdVacp<?=$afficher_visiteurs[$i]->getID()?>').style.display='none';document.getElementById('ombre').style.display='none';">+</div>
										<!-- afficher la piece identité  -->
										<?php
												include("includes/afficher_pieceID.php");
										?>
								</div>
						</div>
                    <?php endfor; ?>

                </div>

			    <BUTTON ONCLICK="ShowAndHide2()"class="btn btn-custon-rounded-three btn-primary" id='hid2'>afficher plus</BUTTON>
                <?php else :        echo "Aucune Visiteur a été trouver"; endif; ?>
			</div>	

				
            <div class="RejeVisit resume" id="expe3">
                <?php $afficher_visiteurs = Visiteur::getVisiteur_rejeter();?>
                <?php if(count($afficher_visiteurs)) : ?>
				<div class="chi">
                   <?php for($i=0;$i<count($afficher_visiteurs);$i++) : ?>
			        <div class="cho" style="display: block">
                            <div class="panel-body custom-panel-jw">
                                
                                     <h2><?= $afficher_visiteurs[$i]->getNom() ?> <?= $afficher_visiteurs[$i]->getPrenom() ?></h2>
                                     <h3>Motif:</h3>
                                     <p>
                                         <?= $afficher_visiteurs[$i]->getMotif() ?> 
                                     </p>
                            </div>
                            <div class="panel-footer contact-footer">

                                 <button type="button" class="btn btn-custon-rounded-three btn-primary" onclick="document.getElementById('AffichePieceIdREJ<?=$afficher_visiteurs[$i]->getID()?>').style.display='flex';document.getElementById('ombre').style.display='flex';" ><i class="fa fa-info-circle edu-informatio" aria-hidden="true" ></i> Identite</button>
                               
                            </div>
                    </div>
                        <!-- popUP afficher piece identité -->
						<div id="AffichePieceIdREJ<?=$afficher_visiteurs[$i]->getID()?>" class="AfPi">
							    <div class="modal-contents">
									<div class="close" onclick="document.getElementById('AffichePieceIdREJ<?=$afficher_visiteurs[$i]->getID()?>').style.display='none';document.getElementById('ombre').style.display='none';">+</div>
										<!-- afficher la piece identité  -->
										<?php
												include("includes/afficher_pieceID.php");
										?>
								</div>
						</div>
                    <?php endfor; ?>
                      
			    </div>
			
			    <BUTTON ONCLICK="ShowAndHide3()"class="btn btn-custon-rounded-three btn-primary" id='hid3'>afficher plus</BUTTON>
                <?php else :        echo "Aucune Visiteur a été trouver"; endif; ?>
			</div>
			

      
	<!-- Ombre for popUp edit -->
    <div id="ombre"></div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> 
    <script> 
    	//Menu toggle
    	let toggle = document.querySelector('.toggle');
    	let navigation = document.querySelector('.navigation');
    	let mi = document.querySelector('.mi');

    	toggle.onclick = function(){
    		navigation.classList.toggle('active');
    		mi.classList.toggle('active');
    	}
    	//hovered
    	let list = document.querySelectorAll('.navigation li');
    	function activeLink(){
    		list.forEach((item) => 
    			item.classList.remove('hovered')); 
    			this.classList.add('hovered');
    	}
    	list.forEach((item) =>
    		item.addEventListener('mouseover',activeLink));
    </script>
    <script>
      function openForm() {
        document.getElementById("popupForm").style.display = "block";
      }

      function closeForm() {
        document.getElementById("popupForm").style.display = "none";
      }

  </script>
  
</body>
</html>


