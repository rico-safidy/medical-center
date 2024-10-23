<?php

    $title = 'Centre Medical | Contact';
    include_once '../layouts/header.php';

?>
    
    <section class="section contact">
        <div class="contact-btn-content">
            <h2 class="title contact-subtitle">Contactez-nous</h2>
            <ul class="contact-btn-list">
                <li class="contact-btn-item">
                    <span class="contact-btn-icon"><i class="fa-solid fa-phone"></i></span>
                    <p class="contact-btn-title">Numéro du Téléphone</p>
                    <p class="contact-btn-link">+261 34 58 541 25</p>
                </li>
                <li class="contact-btn-item">
                    <span class="contact-btn-icon"><i class="fa-solid fa-envelope"></i></span>
                    <p class="contact-btn-title">Email</p>
                    <p class="contact-btn-link">centremedical@gmail.com</p>
                </li>
                <li class="contact-btn-item">
                    <span class="contact-btn-icon"><i class="fa-solid fa-location-dot"></i></span>
                    <p class="contact-btn-title">Adresse</p>
                    <p class="contact-btn-link">Antananarivo 101 <br> 2 rue, Reallon Tsaralalàna</p>
                </li>
            </ul>
        </div>
        
        <div class="contact-content">
            <div class="contact-input-content">
                <form action="" class="contact-form form">
                    <div class="contact-form-content">
                        <label for="" class="label contact-label">Nom</label>
                        <input type="text" class="contact-input" placeholder="Enter votre nom">
                    </div>
                    <div class="contact-form-content">
                        <label for="" class="label contact-label">Email</label>
                        <input type="email" class="contact-input" placeholder="Enter votre Email">
                    </div>
                    <div class="contact-form-content contact-form-msg">
                        <label for="" class="label contact-label">Message</label>
                        <input type="text" class="contact-input" placeholder="Ecrivez votre message ici">
                    </div>
                    <div class="contact-input-btn">
                        <button class="btn btn-primary">Envoyer</button>
                    </div>
                </form>
            </div>
            
            <div class="contact-input-desc">
                <h2 class="subtitle contact-input-title">Entez en contact</h2>
                <h3 class="subtitle contact-input-subtitle">Abonnez pour avoir plus de nouvelles</h3>
                <p class="para contact-input-para">Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus, corrupti.</p>
                <div class="contact-input-desc-icon-list">
                    <a href="" class="contact-input-desc-icon-link fb"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="" class="contact-input-desc-icon-link insta"><i class="fa-brands fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </section>


<?php

    require_once '../layouts/footer.php';

?>