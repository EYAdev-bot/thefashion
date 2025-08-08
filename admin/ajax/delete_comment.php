<?php
require '../../functions/connect_to_bd.php';

if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $query = "DELETE FROM comments WHERE id = :id";

    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }
}
?>