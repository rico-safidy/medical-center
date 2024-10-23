<?php 

    $dash_title = 'Actualité';
    $title = 'Centre Medical | Actualité';
    require_once '../layouts/headerAdmin.php';

    $users = list_user();
    $actus = list_actu();

?>

    <div class="section user">
        <div class="user-table-list">
        <table class="user-table">
            <tr class="user-table-row-head">
                <th>Image</th>
                <th>Titre</th>
                <th>Contenue</th>
                <th>Option</th>
            </tr>
            <?php foreach($actus as $actu) { ?>
                    <tr class="user-table-row-def">
                        <td>
                            <img src="../upload/<?= $actu['image'] ?>" alt="" class="service-table-img">
                        </td>
                        <td><?= $actu['title'] ?></td>
                        <td><?= $actu['content'] ?></td>
                        <td>
                            <a href="" class="btn btn">Detail</a>
                            <button class="btn user-btn-danger">Supprimer</button>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        <a href="../admin/add_actuality.php" class="btn btn-primary">Ajouter</a>
    </div>

<script src="../public/js/admin.js"></script>