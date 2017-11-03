<?php


	session_start();


	if (isset($_POST['submit'])) {

		include 'dbconn.php';
		$username=mysqli_real_escape_string($conn,$_POST['username']);
		$pwd=mysqli_real_escape_string($conn,$_POST['password']);

		if (empty($username) || empty($pwd)) {
			header("Location: ../login.php?index=empty");
 			exit;
		}else{
			$sql="SELECT * FROM admin WHERE username='".$username."'";
			$result=mysqli_query($conn,$sql);
			$CheckResult=mysqli_num_rows($result);

			if ($CheckResult <1) {
				header("Location: ../login.php?index=notfound");
 			    exit;
			}else{
					if($row = mysqli_fetch_assoc($result)){


						if ($row['password']!=$pwd) {

							header("Location: ../login.php?index=passwordIncorrect");
 			   				exit;


						}elseif($row['username']!=$username){

							header("Location: ../login.php?index=passwordIncorrect");
 			   				exit;

						}else{


							$_SESSION['username']=$row['username'];

							header("Location: ../students.php?index=success");
 			   				exit;

						}





				}
			}

	}

}else{
			header("Location: ../login.php?index=123");
 				exit;
		}




?>
