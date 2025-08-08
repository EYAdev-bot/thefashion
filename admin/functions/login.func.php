<?php

function is_admin($email,$password){

    global $conn ;

    $a = array(
        "email"=>$email,
        "password"=>sha1($password)
    );

    $sql= "SELECT * FROM admins WHERE emails=:email AND passwords=:password ";

    $stmt=$conn->prepare($sql);
    $stmt->execute($a);

    $existe = $stmt->rowCount();
    return $existe;
}

?>