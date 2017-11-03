<?php
include 'session_check.php';
  include 'dbconn.php';
  $name = $_POST['name'];
  $uob = $_POST['uob'];
  $year = $_POST['year'];
  $email = $_POST['email'];
  $contact = $_POST['contact'];
  $group = $_POST['group'];
  $dep = $_POST['dep'];
  $deg = $_POST['degree'];
  $id = $_POST['id'];

  if (empty($name) || empty($uob) || empty($email) || empty($contact)) {
    header("Location: ../add-student.php?index=FieldsEmpty%$name%");
    exit;
  }else{
    if(!preg_match("/^[a-zA-Z ]*$/",$name)){

      header("Location: ../add-student.php?noNumbersInName");
      exit;

    }else {

      if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      header("Location: ../add-student.php?emailwalascene");
      exit;
    }else {

      if(!preg_match("/^[0-9]{11}$/",$contact) || !preg_match("/^[0-9]{8}$/",$uob)){

        header("Location: ../add-student.php?incorretInfo");
        exit;
      }else {

        $sql="SELECT uob FROM students WHERE uob='$uob'";
        $result=mysqli_query($conn,$sql);
        $row_num=mysqli_num_rows($result);

        if ($row_num>1) {

            header("Location: ../add-student.php?alreadyExists");
            exit;
        }

        if($group=="none"){

          $sql="UPDATE students SET name='$name', group_name='$group',uob='$uob',year = '$year',email='$email',contact='$contact',department='$dep',degree='$deg' where id='$id'";
          mysqli_query($conn, $sql);
          header("Location: ../add-student.php?alreadyExists");
          exit;
        }elseif ($group!="none") {

          $sql="SELECT * FROM students WHERE group_name='$group'";
          $result=mysqli_query($conn, $sql);
          $row_num=mysqli_num_rows($result);

          if ($row_num>=8) {

             header("Location: ../add-student.php?groupFull");
             exit;
          }else {

            $sql="UPDATE students SET name='$name', group_name='$group',uob='$uob', year = '$year', email='$email', contact='$contact', department='$dep', degree='$deg' where id='$id'";
            mysqli_query($conn, $sql);
            header("Location: ../add-student.php?done");
             exit;
          }
        }


      }


    }

    }
  }

  echo json_encode ($name);
  exit;

?>
