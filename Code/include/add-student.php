<?php
  include 'session_check.php';
 	if (isset( $_POST['submit'] )) {

 		include 'dbconn.php';

 		$name = mysqli_real_escape_string($conn, $_POST['name']);
 		$year = mysqli_real_escape_string($conn, $_POST['year']);
 		$dept = mysqli_real_escape_string($conn, $_POST['dept']);
 		$uob = mysqli_real_escape_string($conn, $_POST['uob']);
 		$email = mysqli_real_escape_string($conn, $_POST['email']);
 		$contact = mysqli_real_escape_string($conn, $_POST['contact']);
 		$degree = mysqli_real_escape_string($conn, $_POST['degree']);
 		$group = mysqli_real_escape_string($conn, $_POST['group']);



 		if (empty($name) || empty($year) || empty($dept) || empty($uob)  || empty($email) || empty($contact) || empty($degree) || empty($group)) {
 			header("Location: ../add-student.php?index=FieldsEmpty%$name%");
 			exit;
 		}else{

 			if(!preg_match("/^[a-zA-Z ]*$/",$name)){

 				header("Location: ../add-student.php?noNumbersInName");
 				exit;

 			}else{

 					if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
 					header("Location: ../add-student.php?emailwalascene");
 					exit;
 				}else{
 						if(!preg_match("/^[0-9]{11}$/",$contact) || !preg_match("/^[0-9]{8}$/",$uob)){

 							header("Location: ../add-student.php?incorretInfo");
 							exit;
						}else{

              $sql="SELECT uob FROM students WHERE uob='$uob'";
              $result=mysqli_query($conn,$sql);
              $row_num=mysqli_num_rows($result);

              if ($row_num>1) {

                 	header("Location: ../add-student.php?alreadyExists");
                 	exit;
              }

							if ($group=="none") {

               $sql = "INSERT INTO students (name, uob, year, email, contact, group_name, department, degree) values ('$name','$uob','$year','$email','$contact','$group','$dept','$degree')";
               mysqli_query($conn,$sql);

               header("Location: ../add-student.php?done");
  							exit;

             }else{

               $sql="SELECT * FROM students WHERE group_name='$group'";
               $result=mysqli_query($conn, $sql);
               $row_num=mysqli_num_rows($result);

               if ($row_num>=8) {

                  header("Location: ../add-student.php?groupFull");
                  exit;
               }else{



                 $sql = "INSERT INTO students (name, uob, year, email, contact, group_name, department, degree) values ('$name','$uob','$year','$email','$contact','$group','$dept','$degree')";
                 mysqli_query($conn,$sql);
                 header("Location: ../add-student.php?done");
    							exit;
               }


             }










}
 				}

 			}
 		}

 	} else{
 		header("Location: ../index.php?wapis");
 		exit;
 	}


?>
