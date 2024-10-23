<?php 

    session_start();
    require_once('../database/db.php');
    require_once('../models/modelAdmin.php');

    $nbr_user = number_users();
    $users = list_user();
    $nbr_appointment = number_appointment();
    $nbr_appointment_now = number_appointment_now();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/fontawesome-free-6.0.0-web/css/all.min.css">
    <link rel="stylesheet" href="../public/css/style.css">
    <title><?= $title ?></title>
    </head>
<body>
    
    <section class="dashboard">
            <div class="dash-left-nav">

                <a href="../pages/acceuil.php" class="dash-left-nav-link">
                    <span class="dash-left-nav-link-icon">
                        <i class="fa-solid fa-house"></i> 
                    </span>
                    <span class="dash-left-nav-menu-text">
                        Acceuil
                    </span>
                </a>

                <span class="dash-left-nav-btn dash-x">
                    <i class="fa-solid fa-xmark"></i>
                </span>

                <div class="dash-left-nav-profile">
                    <img src="../upload/<?= $_SESSION['profile'] ?>" alt="" class="dash-left-nav-profile-img">
                    <div class="dash-left-nav-profile-desc">
                        <h3 class="dash-left-nav-profile-name">Dr. <?= $_SESSION['pseudo'] ?></h3>
                        <p class="para dash-left-nav-profile-role">Directeur Médical</p>
                    </div>
                </div>

                <hr class="line">
    
                <ul class="dash-left-nav-menu">
                    <li class="dash-left-nav-menu-item">
                        <a href="../admin/dashboard.php" class="dash-left-nav-menu-link">
                            <span class="dash-left-nav-menu-icon">
                                <i class="fa-solid fa-table-cells-large"></i>
                            </span>
                            <span class="dash-left-nav-menu-text">
                                Tableau de bord
                            </span>
                        </a>
                    </li>
                    <li class="dash-left-nav-menu-item">
                        <a href="../admin/appointment.php" class="dash-left-nav-menu-link">
                            <span class="dash-left-nav-menu-icon">
                                <i class="fa-regular fa-calendar-days"></i>
                            </span>
                            <span class="dash-left-nav-menu-text">
                                Rendez-vous
                            </span>
                        </a>
                    </li>
                    <li class="dash-left-nav-menu-item">
                        <button href="" class="dash-left-nav-menu-link dash-left-nav-menu-link-btn btn">
                            <span class="dash-left-nav-menu-icon">
                                <i class="fa-solid fa-list-check"></i>
                            </span>
                            <span class="dash-left-nav-menu-text">
                                Opération
                            </span>
                            <span class="dash-left-nav-menu-arrow">
                                <i class="fa-solid fa-angle-down"></i>  
                            </span>
                        </button>
                            <div class="dash-left-nav-dropdown" id="dash-dropdown">
                                <a class="dash-left-nav-menu-link dash-dropdown-item" href="../admin/team.php">
                                    <i class="fa-solid fa-user-doctor"></i> 
                                    Equipes
                                </a>
                                <a class="dash-left-nav-menu-link dash-dropdown-item" href="../admin/user.php">
                                    <i class="fa-solid fa-user"></i> 
                                    Utilisateurs
                                </a>
                                <a class="dash-left-nav-menu-link dash-dropdown-item" href="../admin/service.php">
                                    <i class="fa-solid fa-briefcase-medical"></i>
                                    Services
                                </a>
                                <a class="dash-left-nav-menu-link dash-dropdown-item" href="../admin/actuality.php">
                                    <i class="fa-regular fa-clipboard"></i>
                                    Acualités
                                </a>
                            </div>
                    </li>
                    <li class="dash-left-nav-menu-item">
                        <a href="../security/deconnexion.php" class="dash-left-nav-menu-link">
                            <span class="dash-left-nav-menu-icon">
                                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            </span>
                            <span class="dash-left-nav-menu-text">
                                Déconnecter
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
    
        <header class="dash-header">
            <div class="dash-nav">
                <ul class="dash-nav-list">

                    <span class="dash-nav-list-btn dash-menu">
                        <i class="fa-solid fa-bars"></i>
                    </span>

                    <li class="dash-nav-item">
                        <h2 class="dash-nav-title subtitle"><?= $dash_title ?></h2>
                    </li>
                </ul>
            </div>

            <div class="dash-stat-card">
                <ul class="dash-stat-card-list">
                    <li class="dash-stat-card-item">
                        <span class="dash-stat-card-icon">
                            <i class="fa-solid fa-person-dots-from-line"></i>
                        </span>
                        <div class="dash-stat-card-desc">
                            <p class="para dash-stat-card-title">Total Utilisateurs</p>
                            <h2 class="subtitle dash-stat-card-subtitle">
                                <?= $nbr_user['totalUser'] ?>
                            </h2>
                            <p class="para dash-stat-card-para">Jusqu'à aujourd'hui</p>
                        </div>
                    </li>
                    <li class="dash-stat-card-item">
                        <span class="dash-stat-card-icon">
                            <i class="fa-solid fa-user-clock"></i>
                        </span>
                        <div class="dash-stat-card-desc">
                            <p class="para dash-stat-card-title">Rendez-vous aujourd'hui</p>
                            <h2 class="subtitle dash-stat-card-subtitle">
                                <?php  ?>
                                <?php echo $nbr_appointment_now['totalAppointment'] ?>
                            </h2>
                            <p class="para dash-stat-card-para"><?= date('d '. 'M, '.'Y') ?></p>
                        </div>
                    </li>
                    <li class="dash-stat-card-item">
                        <span class="dash-stat-card-icon">
                            <i class="fa-solid fa-calendar-day"></i>
                        </span>
                        <div class="dash-stat-card-desc">
                            <p class="para dash-stat-card-title">Total Rendez-vous</p>
                            <h2 class="subtitle dash-stat-card-subtitle"><?= $nbr_appointment['totalAppointment'] ?></h2>
                            <p class="para dash-stat-card-para">Jusqu'à aujourd'hui</p>
                        </div>
                    </li>
                </ul>
            </div>