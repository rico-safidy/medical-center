<?php

require_once '../database/db.php';
require_once '../models/modelAdmin.php';
require_once '../models/model.php';

// function getDb() {
//     return Db();
// }

// Number user
function number_users()
{
    $request = getDb()->query('SELECT COUNT(*) AS totalUser
                                FROM users WHERE role = "user"');
    return $request->fetch();
}

// Number appointment
function number_appointment()
{
    $request = getDb()->query('SELECT COUNT(*) AS totalAppointment FROM appointments');
    return $request->fetch();
}

// Number appointment now
function number_appointment_now()
{
    $today = date('Y-m-d');
    $request = getDb()->query("SELECT COUNT(*) AS totalAppointment FROM appointments WHERE DATE(date) = '$today'");
    return $request->fetch();
}

// List User
function list_user()
{
    $request = getDb()->query("SELECT * FROM users ORDER BY id DESC");
    $alluser = $request->fetchAll();
    return $alluser;
}
// List Appointment
function list_appointment()
{
    $request = getDb()->query("SELECT * FROM appointments ORDER BY id DESC");
    $all_appointment = $request->fetchAll();
    return $all_appointment;
}

// Accept appointment
function accept_appointment()
{
    $id = intval($_POST['id_add_app']);
    $request = getDb()->prepare('UPDATE appointments SET accept = true WHERE id = ?');
    $request->execute([$id]);
}

// appointment accepted
function appointment_accepted()
{
    $request = getDb()->query("SELECT * FROM appointments WHERE accept = true ORDER BY id DESC");
    $all_appointment = $request->fetchAll();
    return $all_appointment;
}

// Delete appointment
function delete_appointment()
{
    $id = intval($_POST['id_app']);
    $request = getDb()->prepare("DELETE FROM appointments WHERE id = ?");
    $request->execute([$id]);
}

// Service
function list_service()
{
    $request = getDb()->query('SELECT * FROM services ORDER BY id DESC');
    $all_service = $request->fetchAll();
    return $all_service;
}

// Add Service
function add_service()
{
    $messages = [];

    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $valid = false;

    if (!empty($_POST['title']) && !empty($_POST['content'])) {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            if ($_FILES['image']['size'] <= 30000000) {
                $valid = true;
            } else {
                $messages[] = 'Votre fichier est trop volumineux !';
            }
        } else {
            $messages[] = 'Verifiez votre fichier !';
        }
    } else {
        $messages[] = 'Veuillez remplir tous lec champs !';
    }

    if ($valid) {
        $info_image = pathinfo($_FILES['image']['name']);
        $extension = $info_image['extension'];
        $extension_array = ['jpg', 'png', 'jpeg', 'gif'];

        if (in_array($extension, $extension_array)) {
            $image = rand() . '.' . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], '../upload/' . $image);

            $request = getDb()->prepare('INSERT INTO services(image, title, content)
                                        VALUES(?,?,?) 
                                        ');
            $request->execute([$image, $title, $content]);
            unset($_POST['title']);
            unset($_POST['content']);
            $messages[] = 'Ajout avec succes !';
        }
    }

    return $messages;
}

//  delete service 
function delete_service()
{
    $id = intval($_POST['id-service']);
    $request = getDb()->prepare("DELETE FROM services WHERE id = ?");
    $request->execute([$id]);
}

// Actuality
function list_actu()
{
    $request = getDb()->query("SELECT * FROM actuality WHERE id LIMIT 4");
    $all_actu = $request->fetchAll();
    return $all_actu;
}

// Add Actuality
function add_actu()
{
    $messages = [];

    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $valid = false;

    if (!empty($_POST['title']) && !empty($_POST['content'])) {
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            if ($_FILES['image']['size'] <= 30000000) {
                $valid = true;
            } else {
                $messages[] = 'Votre fichier est trop volumineux !';
            }
        } else {
            $messages[] = 'Verifiez votre fichier !';
        }
    } else {
        $messages[] = 'Veuillez remplir tous lec champs !';
    }

    if ($valid) {
        $info_image = pathinfo($_FILES['image']['name']);
        $extension = $info_image['extension'];
        $extension_array = ['jpg', 'png', 'jpeg', 'gif'];

        if (in_array($extension, $extension_array)) {
            $image = rand() . '.' . $extension;
            move_uploaded_file($_FILES['image']['tmp_name'], '../upload/' . $image);

            $request = getDb()->prepare('INSERT INTO actuality(title, content, image)
                                        VALUES(?,?,?)
                                        ');
            $request->execute([$title, $content, $image]);
            unset($_POST['title']);
            unset($_POST['content']);
            $messages[] = 'Ajout avec succes !';
        }
    }

    return $messages;
}

// Team
function list_team()
{
    $request = getDb()->query('SELECT * FROM teams WHERE id LIMIT 3');
    $all_team = $request->fetchAll();
    return $all_team;
}
// Add Team
function add_team()
{
    $messages = [];

    $name = htmlspecialchars($_POST['name']);
    $last_name = htmlspecialchars($_POST['lastname']);
    $email = htmlspecialchars($_POST['email']);
    $speciality = htmlspecialchars($_POST['speciality']);
    $valid = false;

    if (!empty($_POST['name']) && !empty($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['speciality'])) {
        if (isset($_FILES['profile']) && $_FILES['profile']['error'] === 0) {
            if ($_FILES['profile']['size'] <= 30000000) {
                $valid = true;
            } else {
                $messages[] = 'Votre fichier est trop volumineux !';
            }
        } else {
            $messages[] = 'Verifiez votre fichier !';
        }
    } else {
        $messages[] = 'Veuillez remplir tous lec champs !';
    }

    if ($valid) {
        $info_image = pathinfo($_FILES['profile']['name']);
        $extension = $info_image['extension'];
        $extension_array = ['jpg', 'png', 'jpeg', 'gif'];

        if (in_array($extension, $extension_array)) {
            $profile = rand() . '.' . $extension;
            move_uploaded_file($_FILES['profile']['tmp_name'], '../upload/' . $profile);

            $request = getDb()->prepare('INSERT INTO teams(profile, name, lastname, email, speciality)
                                        VALUES(?,?,?,?,?)
                                        ');
            $request->execute([$profile, $name, $last_name, $email, $speciality]);
            unset($_POST['profile']);
            unset($_POST['name']);
            unset($_POST['lastname']);
            unset($_POST['email']);
            unset($_POST['speciality']);
            $messages[] = 'Ajout avec succes !';
        }
    }

    return $messages;
}
