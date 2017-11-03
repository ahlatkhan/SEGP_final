
<?php
  include 'include/session_check.php';
  include 'include/dbconn.php';
  $sql='SELECT distinct name FROM staff';
  $result=mysqli_query($conn,$sql);


?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<!-- BOOTSTRAPP -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-grid.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-reboot.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-reboot.min.css" rel="stylesheet" type="text/css" />
<!-- END   -->
<!-- CSS FILES -->
 <link rel = "stylesheet" type = "text/css" href = "style.css" />
<!-- END -->

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

 <!-- NAVBAR -->
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 <!-- DROPDOWN -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 <!-- TABLES  -->
 <link href="css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />

 <!-- MODAL -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<title>Groups Page</title>
</head>

<body id="back">



  <?php include 'include/navbar.php'; ?>


    <div class="container" id="decorate">
    <br><br>
        <div class="row" style="margin-left:75px;">
          <div class="col-lg-4">
              <a href="students.php"><button class="btn btn-primary" style="width:200px;">Students</button></a><br /><br />
            </div>
            <div class="col-lg-4">
              <a href="staff.php"><button class="btn btn-primary" style="width:200px;">Staff</button></a><br /><br />
            </div>

    <div class="col-lg-4">
              <a href="groups.php"><button class="btn btn-primary" style="width:200px;">Group</button></a><br /><br />
            </div>
          </div>





        <div class="col-lg-12 well well-sm" style="padding-bottom: 50px;">
          <form class="form form-vertical" action="include/addgroup.php" method="POST">
             <br><br>
             <div class="row">

                 <div class="col-sm-8">
                   <div class="row">
                     <div class="col-sm-4 col-sm-offset-4">
                       <div class="form-group">
                         <label for="name">Group Name<span class="kv-reqd">*</span></label>
                         <input type="name" class="form-control" name="group" required>
                       </div>
                     </div>


                     <div class="col-sm-4">
                       <div class="form-group">

                        <label for="dept">Teacher<span class="kv-reqd">*</span></label>
                         <select class="form-control" data-style="btn-primary" id="choose" name="teacher" style="height: calc(2.25rem + 10px);">
                        <?php while($row=mysqli_fetch_assoc($result)){?>

                         <option><?php echo $row['name']  ?></option>


                         <?php }?>
                       </select>
                  </div>
                </div>

                 </div>



                 <div class="row">
                 <div class="col-md-5 col-md-offset-7">
                    <button class="btn btn-primary" type="submit" name="submit">Add</button>
                   </div>

                 </div>


         </form>

















         <!--<div id="kv-avatar-errors-1" class="center-block" style="width:800px;display:none"></div>-->




 <br>







</body>
</html>
