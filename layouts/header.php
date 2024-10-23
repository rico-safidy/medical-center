<?php

session_start();
require_once '../database/db.php';
require_once '../models/model.php';
require_once '../models/modelAdmin.php';

Db();

$users = list_user();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/dist/aos.css">
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="shortcut icon" href="../public/images/favicon.jpg" type="image/x-icon">
    <title><?= $title ?></title>
</head>

<body>

    <!-- NAV-TOP -->
    <nav class="nav">
        <div class="nav-top m-auto w-100">
            <?php if (isset($_SESSION['role'])) { ?>
                <a href="" class="nav-top-link">
                    <?php foreach ($users as $user) { ?>
                        <?= $user['role'] === 'admin' ? $user['email'] : null ?>
                    <?php } ?>
                </a>
            <?php } ?>
        </div>
    </nav>
    <!-- NAV-TOP -->

    <!-- NAVBAR -->
    <ul class="nav-navbar mb-0">
        <!-- LOGO  -->
        <li class="nav-navbar-item">
            <a href="../pages/acceuil.php" class="nav-navbar-logo">
                <span class="nav-navbar-logo-icon"><i class="fa-solid fa-heart-pulse"></i></span>
                <span class="nav-navbar-logo-title">Centre <br> Medicale</span>
            </a>
        </li>
        <!-- LOGO  -->

        <!-- NAVBAR LINK  -->
        <ul class="nav-navbar-item" id="navbar-item">

            <a href="../pages/acceuil.php" class="nav-navbar-link">Acceuil</a>
            <a href="../pages/service.php" class="nav-navbar-link">Service</a>
            <a href="../pages/equipe.php" class="nav-navbar-link">Equipe</a>
            <a href="../pages/contact.php" class="nav-navbar-link">Contact</a>

            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'user') { ?>

            <?php } elseif (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {  ?>
                <a href="../admin/dashboard.php" class="nav-navbar-link">Dashboard</a>
            <?php } else { ?>

            <?php } ?>
            <span class="nav-navbar-icon hide"><i class="fa-solid fa-chevron-up"></i></span>

        </ul>
        <!-- NAVBAR LINK  -->

        <!-- NAVBAR BTN  -->
        <div class="nav-navbar-btn-content">

            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'user') { ?>
                <li class="nav-navbar-item-list">
                    <a href="profile.php" class="nav-navbar-item-link">
                        <img src="../upload/<?= $_SESSION['profile'] ?>" alt="" class="nav-navbar-item-img">
                    </a>
                <li class="nav-navbar-item-list">
                    <a href="../security/deconnexion.php" class="btn" title="Deconnexion">
                        <span class="nav-navbar-icons">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        </span>
                    </a>
                </li>
                </li>

            <?php } elseif (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {  ?>
                <li class="nav-navbar-item-list">
                    <a href="profile.php" class="nav-navbar-item-link">
                        <img src="../upload/<?= $_SESSION['profile'] ?>" alt="" class="nav-navbar-item-img">
                    </a>
                <li class="nav-navbar-item-list">
                    <a href="../security/deconnexion.php" class="btn" title="Deconnexion">
                        <span class="nav-navbar-icons"><i class="fa-solid fa-arrow-right-from-bracket"></i></span>
                    </a>
                </li>
                </li>

            <?php } else { ?>
                <li class="nav-navbar-item-list">
                    <a href="connexion.php" class="btn" id="open-connexion-btn" title="Connexion">
                        <span class="nav-navbar-icons">
                            <i class="fa-solid fa-arrow-right-to-bracket"></i>
                        </span>
                    </a>
                </li>
            <?php } ?>
            <span class="nav-navbar-icon bar"><i class="fa-solid fa-bars"></i></span>
        </div>
        <!-- NAVBAR BTN  -->
    </ul>
    <!-- NAVBAR  -->