<?php
    require("config/user.php");

    $u = new user();
    $u->isSession();

    //echo $_SESSION['userName'];
?>

<!DOCTYPE html>

<html>
    <head>
        <?php
            require_once("static/head.html");
        ?>
    </head>

    <body>
        <?php
            require_once("static/nav.php");
        ?>
    </body>
</html>