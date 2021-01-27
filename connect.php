<?php

try {

    $db = new PDO('mysql:host=localhost;dbname=crud', 'root', "");
    $db->exec('SET NAMES "UTF8"');

} catch (PDOEXception $e) {
    echo 'Erreur : ' .$e->getMessage();
    die();
}