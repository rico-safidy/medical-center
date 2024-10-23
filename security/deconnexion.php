<?php 

function deconnexion() {
    session_start();

    unset($_SESSION['id']);
    unset($_SESSION['pseudo']);
    unset($_SESSION['email']);
    unset($_SESSION['password']);
    unset($_SESSION['profile']);

    session_destroy();
    header('Location: ../pages/connexion.php');
}
deconnexion();