<?php
function get_post() {
    global $conn;

    $req= $conn->query("SELECT  post.id,
                                post.title,
                                post.image,
                                post.date,
                                post.content,
                                admins.names
                                FROM post
                                JOIN admins
                                ON post.writer=admins.emails
                                WHERE posted='1'
                                ORDER BY date DESC
                                LIMIT 0,2
                    ");
    $req->execute();

    $result=array();
    while($rows = $req->fetchObject()){
        $result[] = $rows ;
    }

    return $result ;
}
?>