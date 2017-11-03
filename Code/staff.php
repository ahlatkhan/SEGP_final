<?php
include 'include/session_check.php';
  include 'include/dbconn.php';
  //talha's file


  $sql_years = "SELECT * FROM yearly";
  $sql_degrees = "SELECT * FROM degree";
  $resultyears = mysqli_query($conn,$sql_years);
  $resultdegrees = mysqli_query($conn,$sql_degrees);
  $sql_staff = "SELECT * FROM staff";
  $resultstaff = mysqli_query($conn,$sql_staff);
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


<title>Staff Page</title>
</head>

<body id="back">

<?php include 'include/navbar.php'; ?>




    <br><br>
    <div class="container" id="decorate">
      <br><br>
        <div class="row" style="margin-left:75px;">
          <div class="col-lg-4">
          <a href="students.php"><button class="btn btn-primary" type="button"  style="width:200px;">Students</button></a>
          </div>
            <div class="col-lg-4">
            	<a href="staff.php"><button class="btn btn-primary" style="width:200px;">Staff</button></a><br /><br />
            </div>

		<div class="col-lg-4">
            	<a href="groups.php"><button class="btn btn-primary" style="width:200px;">Group</button></a><br /><br />
            </div>
          </div>




          <div class="row">
            <div class="col-md-offset-5 col-md-1">
              <a href="add-staff.php"><button class="btn btn-primary">Add Staff</button></a>
            </div>
          </div>





        <!--<div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" id="dropdown" type="button" data-toggle="dropdown">Year
            </button>
            <ul class="dropdown-menu" id="drop">
            <li><a href="#">All Years</a></li>
            <li><a href="#">Year-1</a></li>
            <li><a href="#">Year-2</a></li>
            <li><a href="#">Year-3</a></li>
            <li><a href="#">Year-4</a></li>
            </ul>
        </div>-->
        <!-- <div class="row">
          <div class="col-lg-6 col-lg-offset-4">
            <select class="form-group" data-style="btn-primary" id="choose">
            <option value="all_years" >All Year</option>
            <?php while ($row = mysqli_fetch_assoc($resultyears)) { ?>
              <option value="<?=$row['years'];?>" ><?php echo $row['years'];?></option>
            <?php  } ?>
          </select>
        </div>
        <div class="col-lg-6 col-lg-offset-4">
          <select class="form-group" data-style="btn-primary" id="choose">
          <option value="degree">Degree</option>
              <?php while ($row = mysqli_fetch_assoc($resultdegrees)) { ?>
                <option value="<?=$row['degrees'];?>" ><?php echo $row['degrees'];?></option>
              <?php  } ?>
        </select>
          </div>
        </div> -->
        <br><br>
        <table class="table table-striped table-bordered table-hover" id="studentstable">
        	<thead>
            	<tr>
                	  <th>Name</th>
                    <th>Department</th>
                    <th>Group Name</th>
                    <th>Action</th>

                </tr>
            </thead>
            <!--<tfoot>
            	<tr>
           		    <th>ID</th>
                    <th>XYZ</th>
                    <th>XYZ</th>
                    <th>XYZ</th>
                </tr>
            </tfoot>-->
            <tbody>
				<?php

            while($rows=mysqli_fetch_assoc($resultstaff)){

            $str = $rows["id"]."%".$rows["name"]."%".$rows["department"]."%".$rows["group_name"]."%".$rows["email"]."%".$rows["contact"];

                ?>
                <tr>

                      <td><?php echo $rows['name'] ?></td>
                      <td><?php echo $rows['department'] ?></td>
                      <td><?php echo $rows['group_name'] ?></td>
                        <td><span data-placement="top" data-toggle="tooltip"  title="Edit"><button id="<?=$str?>" onclick="getInfoId(this)" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#info" ><span class="glyphicon glyphicon-pencil"></span></button></span>
                        <span data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-sm" data-toggle="modal" id="<?=$str?>" onclick="getdelid(this)" data-target="#del" style="background-color: #f9243f;"><span class="glyphicon glyphicon-trash" id="delete"></span></button></span>
                      </td>
                      <!-- <td><span class="input-group-addon" data-toggle="modal" data-target="#del" style="background-color: #f9243f; border-radius: 8px;">
                              	<i class="glyphicon glyphicon-trash" id="delete"></i>
                              </span></td> -->
                  </tr>
              <?php  } ?>
            </tbody>
        </table>

        <div class="modal fade" id="del" role="dialog">
          <div class="modal-dialog" id="mymodal">

            <!-- Modal content-->
            <div class="modal-content" id="remove">
              <div class="modal-header">
                <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
                <h4 class="modal-title">Delete</h4>
              </div>
              <div class="modal-body">
                <p>Are you sure you want to delete this contact??</p>

      <div id="kv-avatar-errors-1" class="center-block" style="width:800px;display:none"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                <button type="button" id="delbtn" class="btn btn-primary">OK</button>
              </div>
            </div>
          </div>
        </div>

  <div class="modal fade" id="info" role="dialog">
    <div class="modal-dialog" id="mymodal">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
          <h4 class="modal-title">Staff Information</h4>
        </div>
        <div class="modal-body">
         <!-- <p>Some text in the modal.</p>-->
         <form class="form form-vertical" action="" method="post" enctype="multipart/form-data">
    <div class="row">
        <!-- <div class="col-sm-4 text-center"> -->
        <!-- <div class="form-group">
        <label>Upload Image</label>
        <div class="input-group">
            <span class="input-group-btn">
                <span class="btn btn-default btn-file">
                    Browse… <input type="file" id="imgInp">
                </span>
            </span>
            <input type="text" class="form-control" readonly>
        </div>
        <img id='img-upload'/>
    </div> -->
           <!--<div class="kv-avatar">
                <div class="file-loading">
                    <input id="avatar-1" name="avatar-1" type="file" required>
                </div>
            </div>
            <div class="kv-avatar-hint">Select file < 1500 KB</div>-->
        <!-- </div> -->

<!--
        $id = (int) $_REQUEST["id"];

	// retrieve posted data * end *

	$query_select = "SELECT * FROM menu WHERE id = '".$id."'";
	$result_select = mysql_query($query_select);
	$row_select = mysql_fetch_array($result_select);
	mysql_free_result($result_select);

-->








        <div class="col-sm-12">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="name">Name<span class="kv-reqd">*</span></label>
                <input type="name" id="staffname" class="form-control" name="name" required >
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="class">Department<span class="kv-reqd">*</span></label>
                <input type="text" id="staffdepartment" class="form-control" name="dept" required>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="gname">Group Name<span class="kv-reqd">*</span></label>
                <input type="text" id="staffgroup_name" class="form-control" name="gname"  readonly>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="dept">Email <span class="kv-reqd">*</span></label>
                <input type="text" id="staffemail" class="form-control" name="email" required>
              </div>
            </div>

          </div>
            <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="gname">Contact No<span class="kv-reqd">*</span></label>
                <input type="text" id="staffcontact" class="form-control" name="contact" required>
              </div>
            </div>

          </div>


          <!--<div class="form-group">
            <hr>
          <div class="text-right">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>-->
        </div>

    </div>
</form>
<div id="kv-avatar-errors-1" class="center-block" style="width:800px;display:none"></div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
          <button type="button" id="editstaff" class="btn btn-primary">Update</button>
        </div>
      </div>

    </div>
  </div>

  <!--           DELETE MODAL -->



</div><br><br>

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

    var id = '';
    function getInfoId(e){
        var specificid = $(e).attr("id");
        var strarray = specificid.split("%");
        // alert(strarray);
        id = strarray[0];
        $("#staffname").val(strarray[1]);
        $("#staffdepartment").val(strarray[2]);
        $("#staffgroup_name").val(strarray[3]);
        $("#staffemail").val(strarray[4]);
        $("#staffcontact").val(strarray[5]);
    }

    $("#editstaff").click(function(){
      var staffname = $("#staffname").val();
      var staffdepartment = $("#staffdepartment").val();
      var staffgrpname = $("#staffgroup_name").val();
      var staffemail = $("#staffemail").val();
      var staffcontact = $("#staffcontact").val();
      // alert(id+name+department+grpname+email+contact);
      // return false;
      // var degree = $("#degree").val();


      $.ajax({

          type : 'POST',
          url: 'include/editstaffdata.php',
          data:
          {
            'name' : staffname,
            'dept': staffdepartment,
            'email' : staffemail,
            'contact' : staffcontact,
            'id':id,

          },
          success : function()
          {
            // var res = $.parseJSON(response);

            // alert(res);
            location.reload();
          }
        });
      });




    var delid ='';
    var grpname = '';
    function getdelid(e){
      var specificid = $(e).attr("id");
      var strarray = specificid.split("%");
      // alert(strarray);
      delid = strarray[0];
      grpname = strarray[3];


    }
    $('#delbtn').click(function() {
      // alert(delid+grpname);
      $.ajax({
        type : 'POST',
        url: "include/delstaffdata.php",
        data:
        {

          'id' : delid,
          'grpname':grpname,

        },
        success : function(response)
        {
          location.reload();
        }

      });
    });

    </script>

</body>
</html>
