<?php

$title = 'Centre Medical | Dashboard';
$dash_title = 'Tableau de bord';
require_once '../layouts/headerAdmin.php';
require_once '../models/modelAdmin.php';

$users = list_user();
$appointments = list_appointment();
// $appointment_now = list_appointment_now(); 
$appointment_now = appointment_accepted();
$date_now = date('Y-m-d');

if (isset($_POST['id_app'])) {
    delete_appointment();
}
if (isset($_POST['id_add_app'])) {
    accept_appointment();
}

?>

<div class="dash-rdv">

    <!-- APPOINTMENT NOW -->
    <div class="dash-rdv-now">
        <h3 class="dash-rdv-title subtitle">Rendez-vous aujourd'hui</h3>
        <div class="dash-rdv-title-list">
            <h4 class="dash-rdv-title-item">Nom / Motif</h4>
            <h4 class="dash-rdv-title-item">Heure</h4>
        </div>

        <div class="dash-rdv-list-content">
            <?php foreach ($appointment_now as $appointment) { ?>
                <?php if ($appointment['date'] == $date_now) { ?>
                    <div class="dash-rdv-list">
                        <div class="dash-rdv-item">
                            <h3 class="subtitle dash-rdv-name"><?= $appointment['pseudo'] ?></h3>
                            <p class="para dash-rdv-motif"><?= $appointment['motif'] ?></p>
                        </div>
                        <div class="dash-rdv-item">
                            <p class="para dash-rdv-hour"><?= $appointment['hour'] ?></p>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>

        <a href="appointment.php" class="dash-rdv-now-link">Voir tous</a>
    </div>
    <!-- APPOINTMENT NOW -->

    <!-- APPOINTMENT REQUEST -->
    <div class="dash-rdv-request">
        <h3 class="dash-rdv-title subtitle">Demande de rendez-vous</h3>
        <div class="dash-rdv-list-content" id="appointment">

            <?php if (isset($messages)) { ?>
                <?php if ($messages) { ?>
                    <?php foreach ($messages as $message) { ?>
                        <h4 style="color: #33b71b; text-align: center; margin: 1rem"><?= $message ?></h4>
                    <?php } ?>
                <?php } ?>
            <?php } ?>

            <?php foreach ($appointments as $appointment) { ?>
                <?php if ($appointment['accept'] != 1) { ?>
                    <?php if ($appointment['date'] >= $date_now) { ?>
                        <div class="dash-rdv-list">
                            <div class="dash-rdv-item">
                                <h3 class="subtitle dash-rdv-name"><?= $appointment['pseudo'] ?></h3>
                                <p class="para dash-rdv-motif"><?= $appointment['motif'] ?></p>
                            </div>
                            <div class="dash-rdv-item dash-rdv-btn-list">
                                <div class="dash-rdv-btns">
                                    <form action="dashboard.php" method="post">
                                        <input type="hidden" name="id_add_app" value="<?= $appointment['id'] ?>">
                                        <button type="submit" class="dash-rdv-btn dash-rdv-btn-ok">
                                            <span class="dash-rdv-btn-icon">
                                                <i class="fa-solid fa-check"></i>
                                            </span>
                                        </button>
                                    </form>

                                    <form action="dashboard.php" method="post">
                                        <input type="hidden" name="id_app" value="<?= $appointment['id'] ?>">
                                        <button type="submit" class="dash-rdv-btn dash-rdv-btn-no" name="">
                                            <span class="dash-rdv-btn-icon">
                                                <i class="fa-solid fa-xmark"></i>
                                            </span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            <?php } ?>

            <a href="appointment.php" class="dash-rdv-now-link">Voir tous</a>
        </div>
        <!-- APPOINTMENT REQUEST -->

    </div>

    </header>
    </section>

    <script src="../public/fontawesome-free-6.0.0-web/js/all.min.js"></script>
    <script src="../public/js/admin.js"></script>
    </body>

    </html>