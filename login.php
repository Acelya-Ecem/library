<!DOCTYPE html> <!--html5 formatında (son format?) -->

<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>

    <body>
        <form action="login.php" method="POST">
            <div class="d-flex justify-content-center"><input class="col-md-3 m-1 form-control" type="text" name="userName" id="userName" placeholder="Username"></div>
            <div class="d-flex justify-content-center"><input class="col-md-3 m-1 form-control" type="text" name="passW" id="passW" placeholder="Password"></div>
            <div class="d-flex justify-content-center">
                <button class="col-sm-1 m-2 btn btn-lg bd-btn-lg btn-bd-primary d-flex align-items-center justify-content-center fw-semibold" style="background-color: blueviolet; color:aliceblue" name="button" id="button">
                    Login
                </button>
            </div>
        </form>

        <?php
            if(isset($_POST['button'])){
                require_once "config/user.php";
                $userName = $_POST['userName'];
                $passW = md5($_POST['passW']);
            }
        ?>
    </body>
</html>