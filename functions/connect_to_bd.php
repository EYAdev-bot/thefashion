<?php

session_start();

$servername = "127.0.0.1";
$dbname = "blog";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname; $username,$password");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Une erreur est survenue lors de la connexion a la base de donnée' . $e->getMessage();
}

if (isset($_POST['subscribe'])) {
    $email=$_POST['mail'];

    try {
        $stmt=$conn->prepare("INSERT INTO subcriber (emails) VALUE (:email)");
        $stmt->bindParam(':email',$email);
        $stmt->execute();
        $message="";
    } catch (PDOException $e) {
        echo "error".$e->getMessage();
    }
}
?>
