<?php

session_start();


    $servername = "mysql-ekanga.alwaysdata.net";
    $dbname = "ekanga_thefashion";
    $username = "ekanga";
    $password = "670670178";


    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération des posts : " . $e->getMessage();
        return [];
    }

?>
