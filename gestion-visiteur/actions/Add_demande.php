<?php
//Auteur: EL BAROUDI Marouane - IATIC4 - 2021/2022
//on appel ce fichier après la soumission du formulaire visteur afin d'envoyer la demande à la personne d'accueil
    spl_autoload_register(function ($class_name) {
        include '../Classes/'. $class_name . '.php';
    });


    //Récupération des valeurs entrant
    $Nom = $_POST['first-name'];
    $Prenom = $_POST['last-name'];
    $Email = $_POST['email'];
    $tele = $_POST['phone'];
    $motif = $_POST['message'];
    $pieceIdentite = file_get_contents($_FILES["pieceIdentite"]["tmp_name"]);
    //$pieceIdentite = base64_decode($_POST["pieceIdentite"]);
  /*  if(!empty($_FILES["pieceIdentite"]["name"])){
        echo "true";
    }else{
        echo "false";
    }*/
    $visiteur =  new visiteur();
    $visiteur->setNom($Nom);
    $visiteur->setPrenom($Prenom);
    $visiteur->setTelephone($tele);
    $visiteur->setEmail($Email);
    $visiteur->setPiece_identite($pieceIdentite);
    
    $visiteur->setMotif($motif);
    $visiteur->setDateN(date("Y-m-d"));
    $visiteur->setAcceptation("en attente");

    if(visiteur::addVisiteur($visiteur)) {
        //visiteur added successfully
        header('Location: /gestion-visiteur/formulaire_visiteur.php?'. sha1('demande_sended'));
        die();
    } else {
        //visiteur not added
        header('Location: /gestion-visiteur/formulaire_visiteur.php?'.sha1('exc_problem'));
        die();

    }
  


?>
