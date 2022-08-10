<?php
    class user{
        public $userId;
        public $userName;
        public $name;
        public $surName;
        private $passW;
        public $RGTime;

        public function __construct() //nesne ilk tanımlandığında bu fonksiyon çalışacak. "!" tersi olursa anlamına gelir.
        {
            session_start();

            /* if(!isset($_SESSION['userName'])){ // set edilmediyse yok et
                session_destroy();
            } */
        }

        public function login($userName, $passW){
            require("db.php");

            $query = $db->prepare("SELECT * FROM users Where userName = ? and passW = ?"); //böyle yaparsak daha güvenli
            $query->execute(array($userName, $passW));

            $users = $query->fetchAll(PDO::FETCH_OBJ); //obje olarak parçalanıyor
            $passW = null; //şifreye gerek kalmdaı

            if($query->rowCount() == 1){ //tam anlamadım ?? ama peki
                //session_start(); gereksiz olduğu için koddan çıkarıldı

                foreach($users as $u){ //tam anlamadım ?? ama peki (galiba veri tabnanından çekip classa aktarıyor)
                    $this->userID = $u->userID; //this --> $u ??
                    $this->userName = $u->userName;
                    $this->name = $u->name;
                    $this->surName = $u->surName;
                    $this->RGTime = $u->registertime;
                }
                $_SESSION['userID'] = $this ->userID;
                $_SESSION['userName'] = $this ->userName;
                $_SESSION['name'] = $this ->name;
                $_SESSION['RGTime'] = $this ->RGTime;

                header("Refresh:0 ; url=index.php");
            }

            else{
                $message = "User not found or wrong password!";
                echo  "
                    <script type = 'text/javascript'>
                        alert('$message');
                    </script>
                ";
                $this->logout();
            }
        }

        public function logout(){
            session_unset();
            session_destroy();
            header("Refresh:0 ; url=index.html"); //kullanıcıyı sayfalar arasında yönlendirir
            exit();
        }

        public function isSession(){
            if(!isset($_SESSION['userName']) && !isset($_SESSION['userID'])){ //session username VE userID tanımlanMAmışsa (tam işlevi benim açımdan sorgulanabilir.)
                $this->logout();
            }
        }
    }
?>