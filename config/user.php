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
            if(!isset($_SESSION['userName'])){ // set edilmediyse yok et
                session_destroy();
            }
        }

        public function login($userName, $passW) {
            $this->userName = $userName; //this zamir classı ifade eder. (CAlssın zamiri)
            $this->passW = $passW;

            require_once "db.php";

            $query = $db->prepare("SELECT * FROM users WHERE
             userName = ? AND passW = ?
             '$userName'");//query hazırlığı yapar. (???? - Burada hangi userName i kullanacağımızı seçer)

             $query->execute(array($this->userName, $this->passW)); // (?) - ? lerini doldurur (look ne işe yarıyor????)

             if($query->rowCount()) // ya eşleşiyor ya eşleşmiyor. Aynı isme ve password a sahip iki kişi yok. username ve password yan yana yazılıyor.
             {
                session_start();
                foreach($query as $row)
                {
                    $_SESSION['userID'] = $row['userID'];
                    $_SESSION['userName'] = $row['userName'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['RGTime'] = $row['RGTime'];
                }
             }
        }
    }
?>