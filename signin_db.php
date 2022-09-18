<?php

    session_start();
    require_once 'config/db.php';
    
    if (isset($_POST['signin'])){
       $email = $_POST ['email'];
       $password = $_POST ['password'];
       
    
    if (empty($email)) {
       $_SESSION['error'] = 'กรอกอีเมลด้วยนะค้าบอย่าดื่อ';
       header("location: signin.php");
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $_SESSION['error'] = 'อีเมลไม่ถูกต้องนะ';
       header("location: signin.php");
    } else if (empty($password)) {
       $_SESSION['error'] = 'กรอกรหัสผ่านด้วยนะค้าบอย่าดื่อ';
       header("location: signin.php");
    } else if (strlen($_POST['password']) >50|| strlen($_POST['password']) < 5) {
       $_SESSION['error'] = 'รหัสผ่านต้องมีความอยาว 5 ถึง 20 ตัวอักษร';
       header("location: signin.php");
    } else {
        try {

            $check_data= $conn->prepare("SELECT * FROM users WHERE email= :email");
            $check_data->bindParam(":email", $email);
            $check_data->execute();
            $row = $check_data->fetch(PDO::FETCH_ASSOC);

            if ($check_data->rowCount() > 0) {

                if ($email == $row['email']){
                   if (password_verify($password, $row['password'])) {
                      if ($row['urole'] == 'admin') {
                         $_SESSION['admin_login'] = $row['id'];
                         header("location: admin.php");
                      } else {
                          $_SESSION['user_login'] = $row['id'];
                          header("location: user.php");
                      }
                   } else {
                     $_SESSION['error'] = 'รหัสผ่านผิดค้าบบ';
                     header("location: signin.php");
                   }
                } else{
                  $_SESSION['error'] = 'อีเมลผิดค้าบบ';
                  header("location: signin.php");
                }                                        
            }else {
                $_SESSION['error'] = "ไม่มีข้อมูลในระบบทำไงดี";
                header("location: signin.php");         
            }

        }catch(PDOException $e) {
            echo $e->getMessage();
        }
    }
 }


?>