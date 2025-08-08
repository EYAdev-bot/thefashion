
<?php

function comments($title, $content, $writer, $image_file, $video)
{
    global $conn;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $i = array(
            "title" => $title,
            "content" => $content,
            "writer" => $writer,
            "image" => $image_file,
            "video" => $video
        );

        try {
            $stmt = $conn->prepare("INSERT INTO post (title, content, writer, image, videos, date) VALUES (:title, :content, :writer, :image, :video, NOW())");
            $stmt->execute($i);
            echo "Insertion réussie !";
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    return $i;
}
