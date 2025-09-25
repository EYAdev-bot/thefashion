<?php
function get_post()
{
    global $conn;

    $req = $conn->query("SELECT  * FROM post
                        ORDER BY date DESC
                                
                    ");
    $req->execute();

    $result = array();
    while ($rows = $req->fetchObject()) {
        $result[] = $rows;
    }

    return $result;
}
