<?php
include_once "functions/connect_to_bd.php";
if (isset($_GET['q'])) {
   try {
    $search = htmlspecialchars($_GET['q']); // Sécurisation de la requête
    $query = $conn->prepare("SELECT * FROM post WHERE title LIKE ? OR content LIKE ?");
    $query->execute(["%$search%", "%$search%"]);
    $res=$query->fetchAll(PDO::FETCH_ASSOC);
   } catch (PDOException $e) {
    echo "error".$e->getMessage();
   }

}

echo json_encode($res);


?>