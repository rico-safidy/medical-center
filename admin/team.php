<?php 

    $dash_title = 'Equipes';
    $title = 'Centre Medical | Equipes';
    require_once '../layouts/headerAdmin.php';

    $teams = list_team();

?>

    <div class="section user">
        <div class="user-table-list">
            <table class="user-table">
                <tr class="user-table-row-head">
                    <th>Profile</th>
                    <th>Nom et Prénom</th>
                    <th>Email</th>
                    <th>Specialité</th>
                    <th>Option</th>
                </tr>
                <?php foreach($teams as $team) { ?>
                    <tr class="user-table-row-def">
                        <td>
                            <img src="../upload/<?= $team['profile'] ?>" alt="" class="user-table-img">
                        </td>
                        <td><?= $team['name'] ?> <?= $team['lastname'] ?></td>
                        <td><?= $team['email'] ?></td>
                        <td><?= $team['speciality'] ?></td>
                        <td>
                            <a href="" class="btn btn">Detail</a>
                            <button class="btn user-btn-danger">Supprimer</button>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <a href="../admin/add_team.php" class="btn btn-primary">Ajouter</a>
    </div>

<script src="../public/js/admin.js"></script>