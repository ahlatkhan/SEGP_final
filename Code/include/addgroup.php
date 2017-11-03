<?php
include 'session_check.php';
 	if (isset( $_POST['submit'] )) {

 		include 'dbconn.php';

 		$group = mysqli_real_escape_string($conn, $_POST['group']);
 		$teacher = mysqli_real_escape_string($conn, $_POST['teacher']);

 		$str=$group;
 		$str=strtoupper($str);



 		if ($str=="NONE" ) {
 			header("Location: ../add-group.php?index=GroupCantBeNone");
 			exit;
 		}elseif(empty($group) || empty($teacher)){
 			header("Location: ../add-group.php?index=FieldEmpty");
 			exit;
 		}else{

 			if(!preg_match("/^[a-zA-Z ]*$/",$group)){

 				header("Location: ../add-group.php?noNumbersInName");
 				exit;

 			}else{



							$sql = "SELECT * FROM groups WHERE group_name='$group'";
 							$result = mysqli_query($conn,$sql);
 							$rows_num= mysqli_num_rows($result);

 							if ($rows_num>0) {
 							header("Location: ../add-group.php?group_nameExists");
 							exit;
 							}

							$sql="INSERT INTO groups (group_name, teacher_assigned) VALUES ('$group', '$teacher')";
 							mysqli_query($conn,$sql);
              $sql = "UPDATE staff SET group_name='$group' WHERE name='$teacher'";
              mysqli_query($conn,$sql);


 							header("Location: ../add-group.php?done");
 							exit;
 						}


 				}



}
?>
