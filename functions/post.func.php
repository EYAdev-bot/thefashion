<?php
function posts()
{
    global $conn;

    if (!isset($_GET['id'])) {
        return []; // Évite les erreurs si 'id' n'est pas défini
    }

$req = $conn->prepare("SELECT
    post.title,
    post.image,
    post.date,
    post.content,
    post.videos,
    admins.names
    FROM post
    JOIN admins ON post.writer = admins.emails
    WHERE post.id = :id
     AND post.posted= '1'
    "
);  
$req->execute(['id' => $_GET['id']]);  

$result = $req->fetchObject();


return $result;


    return $result;
}

function comment ($name,$mail,$comment){
    global $conn;
   $c= array(
    "name"    => $name,
    "mail"    => $mail,
    "comment" => $comment,
    "post_id" => $_GET["id"]
   );

   $sql = "INSERT INTO comments(names,emails,comments,post_id,date) VALUES (:name,:mail,:comment,:post_id, NOW())";
   $stmt=$conn->prepare($sql);
   $stmt->execute($c) ;
}

function get_comment(){
    global $conn ;
     
    $req = $conn->query(
        "SELECT * FROM comments WHERE post_id= '{$_GET['id']}' ORDER BY  date desc"
    );

    $result =[];

    while ($rows=$req->fetchObject()){
      $result[]=$rows ;
    }

    return $result ; 


}