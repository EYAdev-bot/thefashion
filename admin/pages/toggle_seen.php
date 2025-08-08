<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pdo = new PDO('mysql:host=localhost;dbname=blog', 'root', '');
    $id = $_POST['id'];

    $stmt = $pdo->prepare("SELECT seen FROM comments WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $row = $stmt->fetch();

    if ($row) {
        $newSeen = $row['seen'] ? 0 : 1;
        $updateStmt = $pdo->prepare("UPDATE comments SET seen = :newSeen WHERE id = :id");
        $updateStmt->execute([':newSeen' => $newSeen, ':id' => $id]);
    }
}

?>