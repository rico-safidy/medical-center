<?php

    $title = 'Centre Medical | Connexion';
    require_once '../layouts/header.php';

    if(isset($_POST['login_btn'])) {
        $connexion_messages = connexion();
    }

?>

<section class="section connexion">
    <form action="" class="form connexion-form m-auto rounded" id="connexion" method="POST">
        <div class="connexion-left">
            <h2 class="subtitle">Connectez-vous</h2>

            <div style="text-align: center; color: red; margin: 1rem">
                <?php if(isset($connexion_messages)) { ?>
                    <?php if($connexion_messages) { ?>
                        <?php foreach ($connexion_messages as $connexion_message) { ?>
                            <p><?= $connexion_message ?></p>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
            </div>

            <div class="input-content">
                <label for="" class="input-label connexion-label">Email</label>
                <span class="input-icon"><i class="fa-solid fa-envelope"></i></span>
                <input class="input connexion-input" type="email" name="email" id="email-connexion" placeholder="Exemple@gmail.com">
            </div>
            <div class="input-content">
                <label for="" class="input-label connexion-label">Mot de passe</label>
                <span class="input-icon"><i class="fa-solid fa-lock"></i></span>
                <input class="input connexion-input" type="password" name="password" id="password-connexion" placeholder="*******">

                <span class="connexion-input-icon psd-btn" id="hide-psd">
                    <i class="fa-regular fa-eye-slash"></i>
                </span>
                <span class="connexion-input-icon psd-btn" id="show-psd">
                    <i class="fa-regular fa-eye"></i>
                </span>
                
            </div>
            <div class="connexion-btn-content">
                <button class="btn btn-primary connexion-btn w-100" type="submit" name="login_btn">Connexion</button>
            </div>

            <p class="mb-0">
                Vous n'avez pas encore un compte ?
                <a href="inscription.php" class="text-decoration-none">Inscrivez-vous</a>
            </p>

        </div>
    </form>
    
</section>

<?php 

    require_once '../layouts/footer.php';