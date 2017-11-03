<?php
include 'session_check.php';
  include 'dbconn.php';
  $id = $_POST['id'];
  // echo $id;
  $sql = "DELETE FROM students WHERE id='$id'";
  $result = mysqli_query($conn,$sql);
?>
