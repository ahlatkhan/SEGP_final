<?php
include 'session_check.php';
  include 'dbconn.php';
  $id = $_POST['id'];
  $group = $_POST['group'];
  // echo $id;

  $sql = "UPDATE students SET group_name='none' WHERE group_name='$group'";
  $result = mysqli_query($conn,$sql);
  $sql_del = "DELETE FROM groups WHERE id='$id'";
  $resultdel = mysqli_query($conn,$sql_del);
?>
