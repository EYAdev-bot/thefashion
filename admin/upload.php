<?php
if (isset($_FILES['file'])) {
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true); // Crée le dossier si non existant
    }

    $fileName = uniqid() . "_" . basename($_FILES["file"]["name"]);
    $targetFile = $targetDir . $fileName;

    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
        // Retourner le lien complet (ou relatif selon ton besoin)
        echo json_encode(['location' => $targetFile]);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Erreur lors de l\'upload']);
    }
}
