<?php

    $title = 'Centre Medical | Profile';
    require_once '../layouts/header.php';

?>

    <div class="section profile">
        <div class="profile-item">
            <img src="../upload/<?= $_SESSION['profile'] ?>" alt="" class="profile-img">
        </div>
        <div class="profile-item profile-desc">
            <h2 class="profile-title subtitle"><?= $_SESSION['pseudo'] ?></h2>
            <p class="profile-para para"><?= $_SESSION['email'] ?></p>
            <a href="../security/deconnexion.php" class="btn btn-primary">Deconnexion</a>
        </div>
    </div>

<?php 

    require_once '../layouts/footer.php';