<?php
  
  include 'session_check.php';
  $var1 = $_POST['grpname'];
  $var2 = $_POST['teacher'];
  // echo("sss");
  $_SESSION['grpname'] = $var1;
  $_SESSION['teacher'] = $var2;

  header("Location: ../group-edit.php");
  exit();
  // echo ($var1.$var2)
?>
