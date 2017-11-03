<?php
  include 'include/session_check.php';
  include 'include/dbconn.php';
  $sql='SELECT distinct group_name FROM groups';
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


<title>ADD STUDENT</title>
</head>

<body id="back">

  <?php include 'include/navbar.php'; ?>

    <br><br>
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

          <br><br>
          <form class="form form-vertical" action="include/add-student.php" method="POST">


                 <div class="form-group">

                 <div class="col-md-9">
                   <div class="row">
                     <div class="col-md-4 col-md-offset-4">
                       <div class="form-group">
                         <label for="name">Name<span class="kv-reqd">*</span></label>
                         <input type="name" class="form-control" name="name" required>
                       </div>
                     </div>
                     <div class="col-md-4">
                       <div class="form-group">
                         <label for="class">Year<span class="kv-reqd">*</span></label>
                         <select class="form-control" data-style="btn-primary" id="choose" name="year" style="height: calc(2.25rem + 10px);">
                         <option>Year-1</option>
                         <option>Year-2</option>
                         <option>Year-3</option>
                         <option>Year-4</option>
                       </select>
                       </div>
                     </div>
                   </div>




                   <div class="row">
                     <div class="col-md-4 col-md-offset-4">
                       <div class="form-group">

                        <label for="dept">Group Name <span class="kv-reqd">*</span></label>
                         <select class="form-control" data-style="btn-primary" id="choose" name="group" style="height: calc(2.25rem + 10px);">
                        <?php while($row=mysqli_fetch_assoc($result)){?>

                         <option><?php echo $row['group_name']  ?></option>


                         <?php }?>
                       </div>
                        </select>
                       </div>
                     </div>





                     <div class="col-md-4">
                       <div class="form-group">
                         <label for="dept">Department <span class="kv-reqd">*</span></label>
                         <select class="form-control" data-style="btn-primary" id="choose" name="dept" style="height: calc(2.25rem + 10px);">
                         <option>Computer-Science</option>
                         <option>Electrical-Engineering</option>
                         <option>BBA</option>
                       </select>
                       </div>
                     </div>
                   </div>



                   <div class="row">
                     <div class="col-md-4 col-md-offset-4">
                       <div class="form-group">
                         <label for="uob">Uob No.<span class="kv-reqd">*</span></label>
                         <input type="text" class="form-control" name="uob" required>
                       </div>
                     </div>
                     <div class="col-md-4">
                       <div class="form-group">
                         <label for="email">Email <span class="kv-reqd">*</span></label>
                         <input type="email" class="form-control" name="email" required>
                       </div>
                     </div>
                   </div>



                   <div class="row">
                     <div class="col-md-4 col-md-offset-4">
                       <div class="form-group">
                         <label for="contact">Contact No<span class="kv-reqd">*</span></label>
                         <input type="text" class="form-control" name="contact" required>
                       </div>
                     </div>

                     <div class="col-md-4">
                       <label for="degree">Degree <span class="kv-reqd">*</span></label>
                       <select class="form-control" data-style="btn-primary" id="degree" name="degree" style="height: calc(2.25rem + 10px);">
                       <option>Under-Graduate</option>
                       <option>Post-Graduate</option>
                     </select>
                   </div>



                   </div>

                   <br><br>
                 <div class="row">
                 <div class="col-md-5 col-md-offset-7">
                   	<button class="btn btn-primary" type="submit" name="submit">Add</button>
                   </div>

                 </div>

                 </div>

             </div>
         </form>
         <!--<div id="kv-avatar-errors-1" class="center-block" style="width:800px;display:none"></div>-->
</div>


</div> <br><br>


    <script src "js/jquery.js"></script>
    <script src "js/bootstrap.min.js"></script>
    <script src "js/jquery.dataTables.min.js"></script>
    <script src "js/dataTables.bootstrap.min.js"></script>
    <!-- FUNCTION  DATA TABLES-->
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
  <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
  <script>
  $(function(){
    $("#studentstable").dataTable();
  })
  </script>
  <!-- FUNCTION  DATA TABLES-->

  <!-- IMAGE UPLOAD CODE -->
 <script>
 $(document).ready( function() {
    	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});

		$('.btn-file :file').on('fileselect', function(event, label) {

		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;

		    if( input.length ) {
		        input.val(log);
		    } else {
		        if( log ) alert(log);
		    }

		});
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();

		        reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
		        }

		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#imgInp").change(function(){
		    readURL(this);
		});
	});
</script>

</body>
</html>
