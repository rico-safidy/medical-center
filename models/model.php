<?php

function getDb()
{
    return Db();
}

// SIGNIN
function inscription()
{
    $inscri_messages = [];
    $valid = false;

    $pseudo = strip_tags($_POST['pseudo']);
    $email = strip_tags($_POST['email']);
    $password = strip_tags($_POST['password']);

    if (!empty($pseudo) && !empty($email) && !empty($password)) {
        $pseudoLength = strlen($pseudo);

        if ($pseudoLength >= 1) {
            $emailExist = getDb()->prepare('SELECT * FROM users WHERE email = ?');
            $emailExist->execute([$email]);
            $emailValid = $emailExist->rowCount();

            if ($emailValid === 0) {
                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                        $valid = true;
                        header('Location: connexion.php');
                    } else {
                        $inscri_messages[] = "Verifiez votre fichier !";
                    }
                } else {
                    $inscri_messages[] = "Entrez un Email valide !";
                }
            } else {
                $inscri_messages[] = "Cette Email est déjà utilisé !";
            }
        } else {
            $inscri_messages[] = "Nom trop court !";
        }
    } else {
        $inscri_messages[] = "Veuillez remplir tout les champs !";
    }

    if ($valid) {
        $infoImage = pathinfo($_FILES['image']['name']);
        $extension = $infoImage['extension'];
        $image = rand() . '.' . $extension;
        move_uploaded_file($_FILES['image']['tmp_name'], '../upload/' . $image);

        // INSERTION DANS LA BASE
        $request = getDb()->prepare('INSERT INTO users(pseudo, email, password, profile, role)
                                     VALUES(:pseudo, :email, :password, :profile, "user")
        ');
        $request->execute([
            'pseudo' => $pseudo,
            'email' => $email,
            'password' => sha1($password),
            'profile' => $image
        ]);

        unset($_POST['pseudo']);
        unset($_POST['email']);
        unset($_POST['password']);
    }
    return $inscri_messages;
}

// LOGIN
function connexion()
{
    $connexion_messages = [];

    $email = strip_tags($_POST['email']);
    $password = sha1($_POST['password']);

    if (!empty($_POST['email'] && !empty($_POST['password']))) {
        $request = getDb()->prepare('SELECT * FROM users WHERE email=? AND password=?');
        $request->execute([$email, $password]);
        $valid = $request->rowCount();

        if ($valid !== 0) {
            $userConnect = $request->fetch();

            $_SESSION['id'] = $userConnect['id'];
            $_SESSION['pseudo'] = $userConnect['pseudo'];
            $_SESSION['email'] = $userConnect['email'];
            $_SESSION['password'] = $userConnect['password'];
            $_SESSION['profile'] = $userConnect['profile'];
            $_SESSION['role'] = $userConnect['role'];
            $_SESSION['auth'] = true;

            header('Location: acceuil.php');
        } else {
            $connexion_messages[] = "Verifiez votre Email ou mot de passe !";
        }
    } else {
        $connexion_messages[] = "Veuillez remplir tous les champs !";
    }
    return $connexion_messages;
}

// APPOINTMENT
function appointment()
{
    $messages = [];

    $pseudo = htmlspecialchars($_POST['pseudo']);
    $date = htmlspecialchars($_POST['date']);
    $date_str = date('Y-m-d');
    $hour = htmlspecialchars($_POST['hour']);
    $motif = htmlspecialchars($_POST['motif']);
    $id = 2;

    if (!empty($pseudo) && !empty($date) && !empty($hour)) {

        $pseudoExist = getDb()->prepare('SELECT * FROM users WHERE pseudo = ?');
        $pseudoExist->execute([$pseudo]);
        $pseudoValid = $pseudoExist->rowCount();

        if ($pseudoValid === 1) {

            $dateNow = date('Y-m-d');
            if ($dateNow <= $date) {

                $request = getDb()->prepare("INSERT INTO appointments(pseudo, date, hour, motif, id_user)
                                             VALUES(?, ?, ?, ?,?)");
                $request->execute([$pseudo, $date_str, $hour, $motif, $id]);
            } else {
                $messages[] = 'La date est dejà passée !';
            }
        } else {
            $messages[] = "Votre nom n'est pas valid !";
        }
    } else {
        $messages[] = "Veuillez remplir tous les champs !";
    }
    return $messages;

    header('Location: acceuil.php#rdv');
}
