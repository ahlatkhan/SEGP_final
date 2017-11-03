<?php
  include 'include/session_check.php';
  include 'dbconn.php';
  $id = $_POST['id'];
  $grpname = $_POST['grpname'];
  // echo $id;
  $sqlstudentgrp = "UPDATE students SET group_name = 'none' WHERE group_name = '$grpname'";
  $result = mysqli_query($conn,$sqlstudentgrp);

  $sql = "DELETE FROM staff WHERE id='$id'";
  $result = mysqli_query($conn,$sql);
?>
