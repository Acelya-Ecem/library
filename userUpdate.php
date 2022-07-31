<?php
    require "config/db.php"; //Nesneyi sayfaya çeker.
    $query = $db->prepare("UPDATE users SET 
    passW = ?
    WHERE userName = 'acelyaecem'
    ");

    $update = $query->execute(array(md5("4321")));
    if($update){
        echo "Password changed successfully.";
    }

?>