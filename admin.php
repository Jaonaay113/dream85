<?php  

   session_start();
   require_once 'config/db.php';
   if (!isset($_SESSION['admin_login'])) {
       header('location: signin.php');
   }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
     <div class="container">
     <h1 class="mt-5">ตารางงงงนี้เหนื่อยมากน่ะ</h1>
     <a href="insert.php" class="btn btn-success">ไปหน้ากรอกข้อมูลadmin</a>
     <table id="mytable" class="table table-bordered table-striped">
            <thead>
                <th>#</th>
                <th>first name</th>
                <th>Last name</th>
                <th>Email</th>
                <th>Phone number</th>
                <th>Address</th>
                <th>Posting Data</th>
                <th>Edit</th>
                <th>Delete</th>
            </thead>

            <tbody>
                <?php  
                    
                    require('functions.php');
                    $fetchdata = new DB_con(); 
                    $sql = $fetchdata->fetchdata();
                    while($row = mysqli_fetch_array($sql)) {
                         
                   ?>

                     <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['firstname']; ?></td>
                        <td><?php echo $row['lastname']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td><?php echo $row['Phonenumber']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td><?php echo $row['postingdate']; ?></td>
                        <td><a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">แก้ไข</a></td>
                        <td><a href="delete.php?del=<?php echo $row['id']; ?>" class="btn btn-danger">ลบ</a></td>
                    </tr>
               
               <?php

                   }
             ?>
            </tbody>
        </table>
     </div>
    
        <div class="container">
        <?php 
        
            if (isset($_SESSION['admin_login'])) {
               $admin_id = $_SESSION['admin_login'];
               $stmt = $conn->query("SELECT * FROM users WHERE id = $admin_id");
               $stmt->execute();
               $row = $stmt->fetch(PDO::FETCH_ASSOC);
            }
          
        ?>
        <h3 class="mt-4">WELCOME ADMIN, <?php echo $row['firstname'] . '' . $row['lastname']?></h3>
        <a href="logout.php" class="btn btn-dabger">logout</a>
    </div>
</body>
</html>