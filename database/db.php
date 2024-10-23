<?php

function Db() {
    try {
        $db = new PDO('mysql:dbname=medicalcenter;host=localhost', 'root', '');
        $db->exec('SET NAMES UTF8');
        // echo "database connected";
    } catch (PDOExcecution $e) {
        echo 'Connexion error : ' . $e->getMessage();
    }
    return $db;
}