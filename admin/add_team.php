<?php 

    $dash_title = 'Ajout Service';
    $title = 'Centre Medical | Service';
    require_once '../layouts/headerAdmin.php';

    $users = list_user();
    $services = list_service();

    if (isset($_POST['add_team_btn'])) {
        add_team();
    }

?>

    <div class="section add-service">
        <h2 class="add-service-title subtitle">Ajout d'Equipe</h2>
        
        <?php if(isset($messages)) { ?>
            <?php foreach ($messages as $message) { ?>
                <p style="color: red; text-align: center;"><?= $message ?></p>
            <?php } ?>
        <?php } ?>

        <form action="" method="post" class="add-service-form" enctype="multipart/form-data">
            <div class="input-content">
                <label for="" class="label input-label">Profile</label>
                <span class="input-icon"><i class="fa-regular fa-image"></i></span>
                <input class="input connexion-input" type="file" name="profile" id="name-inscription">
            </div>
            <div class="input-content">
                <label for="" class="label input-label">Nom</label>
                <span class="input-icon"><i class="fa-solid fa-user"></i></span>
                <input class="input connexion-input" type="text" name="name" id="name-inscription" placeholder="Nom">
            </div>
            <div class="input-content">
                <label for="" class="label input-label">Prénom</label>
                <span class="input-icon"><i class="fa-solid fa-user"></i></span>
                <input class="input connexion-input" type="text" name="lastname" id="name-inscription" placeholder="Prénom">
            </div>
            <div class="input-content">
                <label for="" class="label input-label">Email</label>
                <span class="input-icon"><i class="fa-solid fa-envelope"></i></span>
                <input class="input connexion-input" type="email" name="email" id="name-inscription" placeholder="Exemple@gmail.com">
            </div>
            <div class="input-content">
                <label for="" class="label input-label">Specialité</label>
                <span class="input-icon"><i class="fa-solid fa-stethoscope"></i></span>
                <input class="input connexion-input" type="text" name="speciality" id="name-inscription" placeholder="Specialité">
            </div>
            <button class="btn btn-primary" name="add_team_btn">Ajouter</button>
        </form>
    </div>

<script src="../public/js/admin.js"></script>