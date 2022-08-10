        <?php
                require_once "config/user.php";
                $userName = $_POST['userName'];
                $passW = md5($_POST['passW']);

            $u = new user(); //user clasından u isimli nesne üretti

            $u->login($userName, $passW);
        ?>