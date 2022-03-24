<?php

    session_start();

    spl_autoload_register(function ($class_name) {
        include '../Classes/'. $class_name . '.php';
    });

    if(isset($_SESSION['Id_acc'])) {
        if(Accueil::findBy($_SESSION['Id_acc'])) {
          header('Location: /gestion-visiteur/');
          die();
        }
     }
    if(!isset($_POST['signin_email']) && !isset($_POST['signin_password'])) {
        header('Location: /gestion-visiteur/');
        die();
    }

    $email = $_POST['signin_email'];
    $password = $_POST['signin_password'];

    if(($accueil = Accueil::findBy($email, 'email')) != null) {

      if($password == $accueil->getPassword()) {

        $_SESSION['Id_acc'] = $accueil->getID();
        $_SESSION['nom'] = $accueil->getNom();
        $_SESSION['email'] = $accueil->getEmail();
        header('Location: /gestion-visiteur/home.php');

      } else {

        //wrong password
        header('Location: /gestion-visiteur/?'. sha1('wrong_password'));

      }

    } else {

        //Email not found
        header('Location: /gestion-visiteur/?'. sha1('not_found'));

    }

?>
