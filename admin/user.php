<?php

$dash_title = 'Utilisateurs';
$title = 'Centre Medical | Utilisateurs';
require_once '../layouts/headerAdmin.php';

$users = list_user();

?>

<div class="section user">
    <table class="user-table">
        <tr class="user-table-row-head">
            <th>Profile</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Option</th>
        </tr>
        <div class="user-table-list">
            <?php foreach ($users as $user) { ?>
                <?php if (isset($user['role']) && $user['role'] === 'user') { ?>
                    <tr class="user-table-row-def">
                        <td>
                            <img src="../upload/<?= $user['profile'] ?>" alt="" class="user-table-img">
                        </td>
                        <td><?= $user['pseudo'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td>
                            <a href="" class="btn btn">Detail</a>
                            <button class="btn user-btn-danger">Supprimer</button>
                        </td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </div>
    </table>
</div>

<script src="../public/js/admin.js"></script>