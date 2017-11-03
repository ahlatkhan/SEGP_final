<?php
include 'session_check.php';
 	if (isset( $_POST['add'] )) {

 		include 'dbconn.php';

 		$name = mysqli_real_escape_string($conn, $_POST['name']);
 		$dept = mysqli_real_escape_string($conn, $_POST['dept']);
 		$email = mysqli_real_escape_string($conn, $_POST['email']);
 		$contact = mysqli_real_escape_string($conn, $_POST['contact']);
 		$subject = mysqli_real_escape_string($conn, $_POST['subject']);
 	// 	$degree = mysqli_real_escape_string($conn, $_POST['degree']);




 		if (empty($name) || empty($dept) || empty($email) || empty($contact)) {
 			header("Location: ../add-staff.php?index=FieldsEmpty");
 			exit;
 		}else{

 			if(!preg_match("/^[a-zA-Z ]*$/",$name)){

 				header("Location: ../add-staff.php?noNumbersInName");
 				exit;

 			}else{

 					if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
 					header("Location: ../add-staff.php?emailwalascene");
 					exit;
 				}else{
 						if(!preg_match("/^[0-9]{11}$/",$contact)){

 							header("Location: ../add-staff.php?contactIncorrect");
 							exit;
						}else{

							$sql = "SELECT * FROM staff WHERE name='$name'";
 							$result = mysqli_query($conn,$sql);
 							$rows_num= mysqli_num_rows($result);

              if ($rows_num>0) {
 							header("Location: ../add-staff.php?staffExists");
 							exit;
 							}

							$sql="INSERT INTO staff (name,contact,email,department) VALUES ('$name','$contact','$email','$dept')";
 							mysqli_query($conn,$sql);

 							header("Location: ../add-staff.php?done");
 							exit;
 						}


 				}

 			}
 		}

 	} else{
 		header("Location: ../index.php?wapis");
 		exit;
 	}


?>
