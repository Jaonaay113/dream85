 <?php
    session_start();
    

     $errors = array();

    if (isset($_POST['reg_user'])) { 
        $username = mysql_real_escape_string($conn, $_POST['username']);
        $email = mysql_real_escape_string($conn, $_POST['email']);
        $password_1 = mysql_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysql_real_escape_string($conn, $_POST['password_2']);
       
        if (empty($username)) {
            array_push($errors, "Username is required");
        }
        if (empty($email)) {
            array_push($errors, "Email is required");
        }
        if (empty($password_1)) {
            array_push($errors, "Password is required");
        }
        if ($password_1 != $password_2)  {
            array_push($errors,"รหัสผ่านไม่ถูกต้องโปรดลองอีกครั้ง");
        }

        $user_check_query = "SELECT * FROM user WHERE username = '$username' OR emil = '$email' ";
        $query = mysqli_query($conn, $user_check_query);
        $result = mysqli_fetch_assoc($query);

        if ($result) { // if user exists
            if ($result['username'] == $username) {
               array_push($serrors, "Username already exists");
            }
            if ($result['email'] == $email) {
                array_push($serrors, "email already exists");
            }
        }

        if (count($errors) == 0) {
           $password = md5($password_1);

           $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
           mysqli_query($conn, $sql);

           $_SESSION['username'] = $username;
           $_SESSION['success'] = "คุณได้เข้าสู่ระบบแล้วค้าบบ";
           header('location: index.php');
        }
    }

?>