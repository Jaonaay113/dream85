<?php
    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'dream');
    
     class DB_con {

            public function construct() {
              $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
              $this->dbcon = $conn;

              if (mysqli_connect_errno()) {
                  echo "Failed tp connect to MySQL : " . mysqli_connect_error();
              }
              return $conn;
            }
            
            public function insert($firstname, $lastname, $email, $Phonenumber, $address) {
                $result = mysqli_query($this->construct(), "INSERT INTO tbluser(firstname, lastname, email,
                Phonenumber, address) VALUES('$firstname', '$lastname', '$email', '$Phonenumber', '$address')");
                return $result;
            }

            public function fetchdata() {
                $result = mysqli_query($this->construct(), "SELECT * FROM tbluser");
                return $result;
            }

            public function fetchonerecord($userid) {
                $result = mysqli_query($this->construct(), "SELECT * FROM tbluser WHERE id = '$userid'");
                return $result;
            }

            public function update($firstname, $lastname, $email, $Phonenumber, $address, $userid) {
                 $result = mysqli_query($this->construct(), "UPDATE tbluser SET 
                    firstname = '$firstname',
                    lastname = '$lastname',
                    email = '$email',
                    Phonenumber = '$Phonenumber',
                    address = '$address'
                    WHERE id = '$userid'
                 ");
                 return $result;
            }

            public function delete($userid) {
                $deleterecord = mysqli_query($this->construct(), "DELETE FROM tbluser WHERE id = '$userid'");
                return $deleterecord;
            }

     }
?>