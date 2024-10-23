<?php

    $title = 'Centre Medical | Inscription';
    require_once '../layouts/header.php';

    if(isset($_POST['sign_btn'])) {
        $inscri_messages = inscription();
    }

?>

<section class="section connexion">
    
    <form action="" method="POST" class="form connexion-form inscription mx-auto rounded" id="inscription" enctype="multipart/form-data">
        <div class="connexion-left" id="inscription">
            <h2 class="subtitle">Inscrivez-vous</h2>

            <div style="text-align: center; color: red">
                <?php if(isset($inscri_messages)) { ?>
                    <?php if($inscri_messages) { ?>
                        <?php foreach ($inscri_messages as $inscri_message) { ?>
                            <p><?= $inscri_message ?></p>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </div>

            <div class="input-content">
                <label for="" class="label input-label">Nom</label>
                <span class="input-icon"><i class="fa-solid fa-user"></i></span>
                <input class="input connexion-input" type="text" name="pseudo" id="name-inscription" placeholder="John Doe">
            </div>
            <div class="input-content">
                <label for="" class="label input-label">Email</label>
                <span class="input-icon"><i class="fa-solid fa-envelope"></i></span>
                <input class="input connexion-input" type="email" name="email" id="email-inscription" placeholder="Exemple@gmail.com">
            </div>
            <div class="input-content">
                <label for="" class="label input-label">Mot de passe</label>
                <span class="input-icon"><i class="fa-solid fa-lock"></i></span>
                <input class="input connexion-input" type="password" name="password" id="password-inscription" placeholder="*******">

                <span class="connexion-input-icon psd-btn" id="hide-psd">
                    <i class="fa-regular fa-eye-slash"></i>
                </span>
                <span class="connexion-input-icon psd-btn" id="show-psd">
                    <i class="fa-regular fa-eye"></i>
                </span>

            </div>

            <div class="input-content">
                <label for="" class="label input-label">Photo</label>
                <input type="file" name="image" id="" class="input connexion-input">
            </div>

            <div class="connexion-btn-content">
                <button class="btn btn-primary connexion-btn w-100" name="sign_btn" type="submit">Inscrire</button>
            </div>

            <p class="mb-0">
                Vous avez dejà un compte ?
                <a href="connexion.php" class="text-decoration-none">Connectez-vous</a>
            </p>
        </div>
    </form>
</section>

<?php 

    require_once '../layouts/footer.php';