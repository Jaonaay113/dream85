<?php
    require("config/db.php");
    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'dream');
    
     class DB_con {

          function construct() {
              $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
              $this->dbcon = $conn;

              if (mysqli_connect_errno()) {
                  echo "Failed tp connect to MySQL : " . mysqli_connect_error();
              }

          }
          public function insert($firstname, $lastname,	$email,	$Phonenumber, $address,) {
              $result = mysqli_query($this->con, "INSERT INTO tbluser(firstname, lastname, email,
              Phonenumber, address) VALUES('$firstname', '$lastname', '$email', '$Phonenumber', '$address')");
              return $result;
            }

            public function fetchdata() {
                $result = mysqli_query($this->con, "SELECT * FROM tblusers");
                return $result;
            }

     }
?>