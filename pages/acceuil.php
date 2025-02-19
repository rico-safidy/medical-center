<?php

$title = 'Centre Medical | Accueil';
require_once '../models/model.php';
include_once '../layouts/header.php';

if (isset($_POST['appointment-btn'])) {
    $messages = appointment();
}
$users = list_user();
$actu = list_actu();
$teams = list_team();

?>

<!-- HEADER -->
<header class="header">
    <div class="header-content">
        <div class="header-content-left" data-aos="fade-right">
            <h1 class="title header-content-title">
                Prenez soins de votre santé en choisissant des docteurs
                <span class="header-content-title-style">Expérimentés</span> !
            </h1>
            <p class="para header-content-para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur sunt, magnam magni laudantium impedit illo.</p>

            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'user') { ?>
                <a href="#rdv" class="btn btn-primary" id="open-connexion-btn">Prendre un rendez-vous</a>
            <?php } elseif (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') { ?>
                <a href="../security/deconnexion.php" class="btn btn-secondary">Deconnexion</a>
            <?php } else { ?>
                <div class="header-content-container_btn">
                    <a href="connexion.php" class="btn btn-secondary" id="open-connexion-btn">Connexion</a>
                </div>
            <?php } ?>

        </div>
        <div class="header-content-right" data-aos="fade-left">
            <div class="header-content-right-content">
                <h2 class="title header-content-right-title">Horaire d'ouverture</h2>
                <hr class="header-content-right-line">
                <div class="header-content-right-timework">
                    <p class="header-content-right-para mb-0">Lundi - Vendredi</p>
                    <h3 class="header-content-right-subtitle">8h - 17h</h3>
                    <p class="header-content-right-para mb-0">Samedi - Dimanche</p>
                    <h3 class="header-content-right-subtitle">8h - 16h</h3>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- HEADER -->

<!-- ABOUT -->
<section class="section about">
    <div class="about-content">
        <div class="about-contact" data-aos="fade-up">
            <h2 class="subtitle about-subtitle">Contact</h2>
            <div class="about-contact-item about-location">
                <span class="about-contact-icon"><i class="fa-solid fa-location-dot"></i></span>
                <div class="about-location-desc">
                    <p class="para about-para mb-0">Madagascar</p>
                    <p class="para about-para mb-0">Antananarivo 101</p>
                    <p class="para about-para mb-0">2, rue Reallon - Tsaralalàna</p>
                </div>
            </div>
            <div class="about-contact-item about-tel">
                <a href="tel:+" class="about-contact-link">
                    <span class="about-contact-icon"><i class="fa-solid fa-phone"></i></span>
                    +261 34 58 541 25
                </a>
            </div>
            <div class="about-contact-item about-email">
                <?php if (isset($_SESSION['role'])) { ?>
                    <a href="mailto:" class="about-contact-link">
                        <span class="about-contact-icon"><i class="fa-solid fa-envelope"></i></span>
                        <?php foreach ($users as $user) { ?>
                            <?= $user['role'] === 'admin' ? $user['email'] : null ?>
                        <?php } ?>
                    </a>
                <?php } ?>
            </div>
            <div class="about-social-media">
                <a href="http://"><span class="about-contact-icon fb"><i class="fa-brands fa-facebook-f"></i></span></a>
                <a href="http://"><span class="about-contact-icon insta"><i class="fa-brands fa-instagram"></i></span></a>
            </div>
        </div>

        <div class="about-service" data-aos="fade-up">
            <h2 class="subtitle about-subtitle">Services</h2>
            <div class="about-service-item">
                <button class="about-service-item-title">
                    <span class="about-service-item-icon"><i class="fa-solid fa-barcode"></i></span>
                    Scanner
                </button>
                <p class="para about-service-item-para">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed impedit quisquam adipisci nihil nulla a deleniti! Explicabo, numquam. Illo dignissimos culpa blanditiis. Labore!
                </p>
            </div>
            <div class="about-service-item">
                <button class="about-service-item-title">
                    <span class="about-service-item-icon"><i class="fa-solid fa-stethoscope"></i></span>
                    Consultation
                </button>
                <p class="para about-service-item-para">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed impedit quisquam adipisci nihil nulla a deleniti! Explicabo, numquam.
                </p>
            </div>
            <div class="about-service-item">
                <button class="about-service-item-title">
                    <span class="about-service-item-icon"><i class="fa-solid fa-tooth"></i></span>
                    Dentiste
                </button>
                <p class="para about-service-item-para">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed impedit quisquam adipisci nihil nulla a deleniti! Explicabo,
                </p>
            </div>
            <a href="../pages/service.php" class="about-service-link btn-secondary">Voir Plus</a>
        </div>
    </div>
</section>
<!-- ABOUT -->

<!-- TEAM -->
<section class="section equipe">
    <h1 class="title equipe-title">Notre Equipe</h1>
    <hr class="line">
    <p class="para equipe-para">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Officia, voluptates.</p>
    <div class="equipe-card">

        <?php foreach ($teams as $team) { ?>
            <div class="equipe-card-item">
                <div class="equipe-card-item-img_container">
                    <img src="../upload/<?= $team['profile'] ?>" alt="" class="equipe-card-img">
                </div>
                <div class="equipe-card-desc">
                    <h2 class="subtitle equipe-card-name">Dr. <?= $team['name'] ?> <?= $team['lastname'] ?></h2>
                    <p class="para equipe-card-post mb-0"><?= $team['speciality'] ?></p>
                </div>
                <div class="equipe-card-desc-content">
                    <div class="equipe-card-desc-icon-content">
                        <a href="" class="equipe-card-desc-icon-link">
                            <span class="equipe-card-desc-icon facebook"><i class="fa-brands fa-facebook"></i></span>
                        </a>
                        <a href="" class="equipe-card-desc-icon-link">
                            <span class="equipe-card-desc-icon instagram"><i class="fa-brands fa-instagram"></i></span>
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <a href="equipe.php" class="btn-secondary">Voir Plus</a>
</section>
<!-- TEAM -->

<!-- START APPOINTMENT -->
<?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'user') { ?>
    <section id="rdv" class="section appointment">
        <aside id="" class="appointment-form-content">
            <form action="" class="form appointment-form" method="POST">
                <h1 class="title appointment-title" id="appointment">Prenez un rendez-vous</h1>
                <hr class="line">
                <p class="para appointment-para mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis voluptate voluptatum dolore qui quo.</p>

                <?php if (isset($messages)) { ?>
                    <?php if ($messages) { ?>
                        <?php foreach ($messages as $message) { ?>
                            <p style="color: red; text-align: center; margin: 1rem"><?= $message ?></p>
                        <?php } ?>
                    <?php } else { ?>
                        <h4 style="color: #33b71b; text-align: center; margin: 1rem">Votre demande a été envoyé !</h4>
                    <?php } ?>
                <?php } ?>

                <div class="input-content">
                    <label for="" class="input-label">Nom</label>
                    <span class="input-icon"><i class="fa-solid fa-user"></i></span>
                    <input type="text" name="pseudo" id="pseudo-rdv" class="input" placeholder="Entrer votre nom">
                </div>
                <div class="input-date-content">
                    <div class="input-content">
                        <label for="" class="input-label">Date du rendez-vous</label>
                        <span class="input-icon"><i class="fa-solid fa-calendar-days"></i></span>
                        <input type="date" name="date" id="date-rdv" class="input" placeholder="">
                    </div>
                    <div class="input-content">
                        <label for="" class="input-label">Heure du rendez-vous</label>
                        <span class="input-icon"><i class="fa-solid fa-clock"></i></span>
                        <input type="text" name="hour" id="hour-rdv" class="input" placeholder="Entrer l'heure">
                    </div>
                </div>
                <div class="input-content">
                    <label for="" class="input-label">Motif</label>
                    <span class="input-icon"><i class="fa-solid fa-message"></i></span>
                    <input type="text" name="motif" id="motif" class="input" placeholder="Entrer">
                </div>
                <div class="connexion-btn-content">
                    <button class="btn btn-primary connexion-btn" type="submit" name="appointment-btn" id="appointment-btn">Envoyer</button>
                </div>
            </form>
        </aside>
    </section>
<?php } ?>
<!-- END APPOINTMENT -->

<!-- ACTUALITY -->
<div class="section actuality" id="actuality">
    <h2 class="actuality-title title">Actualités</h2>
    <hr class="line">
    <p class="actuality-para para">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Minus, eveniet.</p>
    <div class="actuality-card">
        <?php foreach ($actu as $item) { ?>
            <div class="actuality-card-item">
                <div class="actuality-card-item-img_container">
                    <img src="../upload/<?= $item['image'] ?>" class="actuality-card-item-img" alt="">
                </div>
                <div class="actuality-card-item-desc">
                    <h3 class="actuality-card-item-title"><?= $item['title'] ?></h6>
                        <p class="actuality-card-item-para"><?= $item['content'] ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<!-- ACTUALITY -->

<?php

include_once '../layouts/footer.php';

?>