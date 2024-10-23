<?php 

    $dash_title = 'Ajout Service';
    $title = 'Centre Medical | Service';
    require_once '../layouts/headerAdmin.php';

    $users = list_user();
    $services = list_service();

    if (isset($_POST['add_btn'])) {
        add_service();
    }

?>

    <div class="section add-service">
        <h2 class="add-service-title subtitle">Ajout de service</h2>
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
            <button class="btn btn-primary" name="add_btn">Ajouter</button>
        </form>
    </div>

<script src="../public/js/admin.js"></script>