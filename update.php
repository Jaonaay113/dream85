<?php 
  
     include_once('functions.php');

     $updatedata = new DB_con();

     if (isset($_POST['update'])) { 
        $userid = $_GET['id'];  
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $email = $_POST['email'];
        $Phonenumber = $_POST['Phonenumber'];
        $address = $_POST['address'];
             
        $sql = $updatedata->update($fname, $lname, $email, $Phonenumber, $address, $userid);
        if ($sql) {
                echo "<script>alert('Updated  Successfully!');</script>";
                echo"<script>window.location.href='admin.php'</script>";
            } else {
                 echo "<script>alert('Something went wrong! Please try again!');</script>";
                 echo"<script>window.location.href='update.php'</script>";
            }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Page</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    
   <div class="container">
        <h1 class="mt-5">อัพเดตรายชื่อ</h1>
        <hr>
        <?php 
        
          $userid = $_GET['id'];
          $updateuser = new DB_con();
          $sql = $updateuser->fetchonerecord($userid);
          while($row = mysqli_fetch_array($sql)) {
        ?>

        <form action="" method="post">
             <div class="mb-3">
                <label for="firstname" class="form-label">First name</label>
                <input type="text" class="form-control" name="firstname" 
                   value="<?php echo $row['firstname']; ?>" required>
        </div>
        <div class="mb-3">
                <label for="lastname" class="form-label">Last name</label>
                <input type="text" class="form-control" name="lastname"
                   value="<?php echo $row['lastname']; ?>" required>
        </div>
        <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" 
                   value="<?php echo $row['email']; ?>" required>
        </div>
        <div class="mb-3">
                <label for="Phonenumber">Phone Number</label>
                <input type="text" class="form-control" name="Phonenumber"
                   value="<?php echo $row['Phonenumber']; ?>" required>
        </div>
        <div class="mb-3">
                <label for="address">Address</label>
                <textarea name="address"cols="30" rows="10" class="form-control" required><?php echo $row
                ['address']; ?></textarea>
        </div>
        <?php } ?>
        <button type="submit" name="update" class="btn btn-success">Update</button>
        </form>
   </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>