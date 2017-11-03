<?php
include 'session_check.php';
  include 'dbconn.php';
  $name = $_POST['name'];
  $dept = $_POST['dept'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $id = $_POST['id'];
  // header('Location: jj.php');
  // exit();
  $sql = "UPDATE staff SET name = '$name', department = '$dept',email = '$email',contact = '$contact' WHERE id='$id'";
  // $sql = "UPDATE staff SET name = '$name' WHERE id='$id'";
  $result = mysqli_query($conn,$sql);
  // echo json_encode($name);

?>
