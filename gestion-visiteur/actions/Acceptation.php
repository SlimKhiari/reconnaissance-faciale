<?php
//Auteur: EL BAROUDI Marouane - IATIC4 - 2021/2022
//Ce fichier traite les demandes d'acceptation / rejection des differents visiteurs
    spl_autoload_register(function ($class_name) {
        include '../Classes/'. $class_name . '.php';
    });

    session_start();

    if(!isset($_SESSION['Id_acc'])) {
        header('Location: /gestion-visiteur/');
        die();
    }

    if($_POST['Demande_accepté']) {

        $visiteur = Visiteur::findBy($_GET['code']);
        $visiteur->setAcceptation("accepter");
       
        if(Visiteur_Accepted::addVisiteurAccepted($visiteur) && Visiteur::UpdVisiteur($visiteur)) {
             header('Location: /gestion-visiteur/home.php?'.sha1('visiteur_accepted'));
            die();

        } else {
            //demande Not accepted | Server Issues
            header('Location: /gestion-visiteur/home.php?'. sha1('exc_problem'));
            die();
        }

    }else{
        if($_POST['Demande_rejeté']) {

            $visiteur = Visiteur::findBy($_GET['code']);
            $visiteur->setAcceptation("Rejeter");
           
            if(Visiteur_rejected::addVisiteurRejected($visiteur) && Visiteur::UpdVisiteur($visiteur)) {
                 header('Location: /gestion-visiteur/home.php?'.sha1('visiteur_rejected'));
                die();
    
            } else {
                //demande Not accepted | Server Issues
                header('Location: /gestion-visiteur/home.php?'. sha1('exc_problem'));
                die();
            }
    
        }else{
            echo "erreur!!";
        }
    }

?>
