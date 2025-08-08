<?php
function in_table($table,$query){
    global $conn ;

    $stmt= $conn->query($query);

    return $nombre = $stmt->fetch();
}

function getColor ($table,$colors){
    if (isset($colors[$table])) {
        return $colors[$table];
    }else{
        return "orange-500";
    }
}

function get_comment(){
    global $conn ;

    $req=$conn->query(
        "SELECT comments.id,
                comments.names,
                comments.emails,
                comments.date,
                comments.post_id,
                comments.comments,
                post.title
                
                FROM comments
                JOIN post
                ON comments.post_id=post.id

               WHERE comments.seen = '0'
               ORDER BY comments.date ASC
        "
    );

    $results = [];

    while ($rows=$req->fetchObject()) {
       $results[] = $rows ;
    }

    return $results;
}

?>

