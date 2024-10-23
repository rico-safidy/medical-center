<?php

$title = 'Centre Medical | Rendez Vous';
$dash_title = 'Rendez-vous';
require_once '../layouts/headerAdmin.php';
require_once '../models/modelAdmin.php';

$users = list_user();
$accepted_appointments = appointment_accepted();
if (isset($_POST['id_add_app'])) {
    appointment_accepted();
}

?>

<div class="dash-rdv-now">
    <div class="dash-rdv-title-list">
        <h4 class="dash-rdv-title-item">Nom</h4>
        <h4 class="dash-rdv-title-item">Motif</h4>
        <h4 class="dash-rdv-title-item">Date et Heure</h4>
    </div>

    <div class="dash-rdv-list-content">
        <?php foreach ($accepted_appointments as $appointment) { ?>

            <div class="dash-rdv-list">
                <div class="dash-rdv-item">
                    <h3 class="subtitle dash-rdv-name"><?= $appointment['pseudo'] ?></h3>
                </div>
                <div class="dash-rdv-item">
                    <p class="para dash-rdv-motif"><?= $appointment['motif'] ?></p>
                </div>
                <div class="dash-rdv-item">
                    <p class="para dash-rdv-hour"><?= $appointment['date'] ?> à <?= $appointment['hour'] ?></p>
                </div>
            </div>

        <?php } ?>
    </div>
</div>

</header>
</section>

<script src="../public/fontawesome-free-6.0.0-web/js/all.min.js"></script>
<script src="../public/js/admin.js"></script>
</body>

</html>