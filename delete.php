<?php 

  include_once('functions.php');

  if (isset($_GET['del'])) {
     $userid = $_GET['del'];
     $deletedata = new DB_con();
     $sql = $deletedata->delete($userid);
     
     if ($sql) {
        echo "<script>alert('Record DELETE Successfully!');</script>";
        echo"<script>window.location.href='admin.php'</script>";
    }
  }

?>