<?php
include 'session_check.php';
include 'dbconn.php';
// $year = $_POST['year'];
$deg = $_POST['deg'];
$sql = "SELECT * FROM students WHERE degree = '$deg'";
// $sql = "SELECT * FROM students WHERE degree = 'Post-Graduate'";

$result = mysqli_query($conn,$sql);
$array = [];
$i = 0;
while ($row = mysqli_fetch_assoc($result)) {
  $arrays[$i++] = $row['name']."%".$row['uob']."%".$row['year']."%".$row['email']."%".$row['contact']."%".$row['group_name']."%".$row['subjects']."%".$row['department']."%".$row['degree'];
  // $arrays[$i++] = $row;
}
// print_r($array);
echo json_encode($arrays);
exit();
?>
