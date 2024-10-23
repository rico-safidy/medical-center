<?php

    $title = 'Centre Medical | Service';
    include_once '../layouts/header.php';
    require_once '../models/modelAdmin.php';

    $services = list_service();

?>
    
    <section class="section service">
        <h1 class="service-title title">Nos Services</h1>
        <hr class="line">
        <p class="para service-para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum quidem ut fugit cum pariatur autem minima rerum expedita nam sapiente.</p>
        <div class="service-card">
            <?php foreach($services as $service) { ?>
                <div class="service-card-item">
                    <img src="../upload/<?= $service['image'] ?>" alt="" class="service-card-img" width="100%">
                    <h5 class="service-card-title subtitle"><?= $service['title'] ?></h5>
                    <p class="service-sarc-para"><?= $service['content'] ?></p>
                </div>
            <?php } ?>
        </div>
    </section>


<?php

    include_once '../layouts/footer.php';

?>