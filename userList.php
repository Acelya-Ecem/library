<?php
    require "config/db.php"; //Bu sayfaya veri tabanı dahil edilmiş oluyor.
    $query = $db->query("SELECT * FROM users WHERE userName ='acelyaecem'"); //query -> sql kodları
    if($query->rowCount()){ //rowCount satır sayıyor.
        foreach ($query as $row) {
            echo $row['userName']." ".$row['name']."<br>"; //br etiketi alt satıra indiriyor
        }
    }
?>