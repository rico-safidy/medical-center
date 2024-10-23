<?php 

    $dash_title = 'Service';
    $title = 'Centre Medical | Service';
    require_once '../layouts/headerAdmin.php';

    $users = list_user();
    $services = list_service();

    if(isset($_POST['id-service'])) {
        delete_service();
    }

?>

    <div class="section user">
        <table class="user-table">
            <tr class="user-table-row-head">
                <th>Image</th>
                <th>Titre</th>
                <th>Contenue</th>
                <th>Option</th>
            </tr>
            <?php foreach($services as $service) { ?>
                <div class="user-table-list">
                    <tr class="user-table-row-def">
                        <td>
                            <img src="../upload/<?= $service['image'] ?>" alt="" class="service-table-img">
                        </td>
                        <td><?= $service['title'] ?></td>
                        <td><?= $service['content'] ?></td>
                        <td>
                            <a href="" class="btn btn">Detail</a>

                            <form action="service.php" method="post">
                                <input type="hidden" name="id-service" id="" value="<?= $service['id'] ?>">
                                <button type="submit" class="btn user-btn-danger">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                </div>
            <?php } ?>
        </table>
        <a href="../admin/add_service.php" class="btn btn-primary">Ajouter</a>
    </div>

<script src="../public/js/admin.js"></script>