<?php 

    $dash_title = 'Ajout Service';
    $title = 'Centre Medical | Service';
    require_once '../layouts/headerAdmin.php';

    $users = list_user();
    $actus = list_actu();

    if (isset($_POST['add_actu_btn'])) {
        add_actu();
    }

?>

    <div class="section add-service">
        <h2 class="add-service-title subtitle">Ajout d'actualité</h2>
        <form action="" method="post" class="add-service-form" enctype="multipart/form-data">
            <div class="input-content">
                <label for="" class="label input-label">Image</label>
                <span class="input-icon"><i class="fa-regular fa-image"></i></span>
                <input class="input connexion-input" type="file" name="image" id="name-inscription">
            </div>
            <div class="input-content">
                <label for="" class="label input-label">Titre</label>
                <span class="input-icon"><i class="fa-solid fa-heading"></i></span>
                <input class="input connexion-input" type="text" name="title" id="name-inscription" placeholder="Titre">
            </div>
            <div class="input-content">
                <label for="" class="label input-label">Contenue</label>
                <span class="input-icon"><i class="fa-solid fa-quote-left"></i></span>
                <textarea class="input connexion-input" name="content" id="name-inscription" placeholder="Entrer le contenue.."></textarea>
            </div>
            <button class="btn btn-primary" name="add_actu_btn">Ajouter</button>
        </form>
    </div>

<script src="../public/js/admin.js"></script>