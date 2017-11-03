<?php
  include 'include/session_check.php';
  include 'include/dbconn.php';
  $sqlyear = "SELECT * FROM yearly";
  $sqldeg = "SELECT * FROM degree";
  $resultyears = mysqli_query($conn,$sqlyear);
  $resultdegrees = mysqli_query($conn,$sqldeg);
  $grpname = $_SESSION['grpname'];
  $teacher = $_SESSION['teacher'];
  $sqlgrp = "SELECT * FROM groups";
  $resultgrp = mysqli_query($conn,$sqlgrp);

  $sql_students = "SELECT * FROM students WHERE group_name = '$grpname' ";
  $resultstudents = mysqli_query($conn,$sql_students);
  $sqldept = 'SELECT distinct department FROM students';
  $resultdept = mysqli_query($conn,$sqldept);



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


<title>Edit Group</title>
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
        <br><br>
        <!-- <div class="row">
          <div class="col-lg-2 col-lg-offset-4" >
            <select class="form-control" style="height:30px" data-style="btn-primary" id="choose">
            <option>All Years</option>
            <option>Year-1</option>
            <option>Year-2</option>
            <option>Year-3</option>
            <option>Year-4</option>
          </select>
        </div>
        <div class="col-lg-2">
          <select class="form-control" style="height:30px" data-style="btn-primary" id="choose">
          <option>Education</option>
          <option>Uder-Grad</option>
          <option>Post-Grad</option>
        </select>
          </div>
          <div class="col-lg-4">
            	<a href="add-student.php"><button class="btn btn-primary">Add Student</button></a><br /><br />
            </div>

        </div> -->


        <br>
        <div class="row">
          <div class="col-md-4">
            <h1 class="page-header "><?=$grpname?></h1>
          </div>
          <div class="col-md-4 col-md-offset-4">
            <h1 class="page-header "><?=$teacher?></h1>
          </div>

        </div>

        <table class="table table-striped table-bordered table-hover" id="studentstable">
        	<thead>
            	<tr>
                	<th>Name</th>
                    <th>UoB No</th>
                    <th>Year</th>

                    <th>Action</th>


                </tr>
            </thead>

            <tbody>
              <?php while ($row = mysqli_fetch_assoc($resultstudents)) {
                $str = $row["id"]."%".$row['name']."%".$row['uob']."%".$row["year"]."%".$row["email"]."%".$row["contact"]."%".$row["group_name"]."%".$row["department"]."%".$row["degree"];
                ?>

                <tr id="tablerow">
                      <td class="td"><?php echo $row['name'] ?></td>
                      <td class="td"><?php echo $row['uob'] ?></td>
                      <td class="td"><?php echo $row['year'] ?></td>
                      <!-- <td class="td"><?php echo $row['group_name'] ?></td> -->
                      <td class="td"><span data-placement="top" data-toggle="tooltip" title="Edit"><button id="<?=$str?>" onclick="getInfoId(this)" class=" btn btn-sm btn-primary" data-toggle="modal" data-target="#info"><span class="glyphicon glyphicon-pencil"></span></button></span>
                        <span data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-sm btn-danger" id="<?=$row['id']?>" onclick="getDelId(this)" data-toggle="modal" data-target="#info1"><span class="glyphicon glyphicon-trash" id="delete"></span></button></span>
                      </td>
                      <!-- <td><span class="input-group-addon" data-toggle="modal" data-target="#del" style="background-color: #f9243f; border-radius: 8px;">
                                <i class="glyphicon glyphicon-trash" id="delete"></i>
                              </span></td> -->
                  </tr>
              <?php  } ?>


            </tbody>
        </table>

        <div class="modal fade" id="del" role="dialog">
          <div class="modal-dialog modal-md" id="delmodal">

            <!-- Modal content-->
            <div class="modal-content" style="width: 600px; height: 200px;">
              <div class="modal-header">
                <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
                <h4 class="modal-title">Students Information</h4>
              </div>
              <div class="modal-body">
               <p>Are you sure you want to delete the contact??</p>

               <div id="kv-avatar-errors-1" class="center-block" style="width:800px;display:none"></div>


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                <button type="button" id="delbtn" class="btn btn-primary">Yes</button>
              </div>
            </div>

          </div>
        </div>

        <div class="modal fade" id="info" role="dialog">
          <div class="modal-dialog modal-md" id="mymodal">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
                <h4 class="modal-title">Students Information</h4>
              </div>
              <div class="modal-body" >
               <!-- <p>Some text in the modal.</p>-->
          <form class="form form-vertical" action="" method="POST" enctype="multipart/form-data">
          <div class="row">
              <!-- <div class="col-sm-4 text-center">
              <div class="form-group">
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
          </div>
                 <div class="kv-avatar">
                      <div class="file-loading">
                          <input id="avatar-1" name="avatar-1" type="file" required>
                      </div>
                  </div>
                  <div class="kv-avatar-hint">Select file < 1500 KB</div>
              </div> -->
              <div class="col-md-12">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="gname">Name<span class="kv-reqd">*</span></label>
                      <input type="text" class="form-control" name="stuname" id="stuname" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="gname">UoB<span class="kv-reqd">*</span></label>
                      <input type="text" class="form-control" name="uob" id="uob" required>
                    </div>
                  </div>
                </div>
                <div class="row" >
                  <div class="col-lg-6">
                    <label for="">Degree</label><br>
                    <select class="form-group form-control" data-style="btn-primary" style="height:33px;" name="degree" id="degree">
                      <option value="all_years" >Degree</option>
                      <?php while ($row = mysqli_fetch_assoc($resultdegrees)) { ?>
                        <option value="<?=$row['degrees'];?>" ><?php echo $row['degrees'];?></option>
                      <?php  } ?>
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">

                      <label for="class">Year<span class="kv-reqd">*</span></label><br>
                      <select class="form-group form-control" data-style="btn-primary" name="year" style="height:33px;" id="year">
                        <option value="All-Years" >All-Year</option>
                        <?php while ($row = mysqli_fetch_assoc($resultyears)) { ?>
                          <option value="<?=$row['years'];?>" ><?php echo $row['years'];?></option>
                        <?php  } ?>
                      </select>
                    </div>
                  </div>


                </div>

                <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                      <!-- <label for="gname">Group Name<span class="kv-reqd">*</span></label> -->
                      <!-- <input type="text" class="form-control" name="group" id="group" required> -->
                      <label for="gname">Group Name<span class="kv-reqd">*</span></label>
                      <select class="form-control" data-style="btn-primary" id="group" name="group" style="height: calc(2.25rem + 10px);">
                      <?php while($row=mysqli_fetch_assoc($resultgrp)){?>

                       <option><?php echo $row['group_name']  ?></option>


                       <?php }?>

                       </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="dept">Department <span class="kv-reqd">*</span></label>
                      <!-- <input type="text" class="form-control" name="subject" id="subject" required> -->
                      <select class="form-control" name="department" id="department" style="height:33px;" >
                        <?php while($row=mysqli_fetch_assoc($resultdept)){?>

                         <option><?php echo $row['department']  ?></option>


                         <?php }?>
                        <!-- <option value="">Computer Science</option> -->
                        <!-- <option>Computer Science</option>
                        <option>Electrical Engineering</option>
                        <option>BBA</option> -->
                      </select>
                    </div>
                  </div>
              </div>
              <div class="row" >
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="gname">Contact<span class="kv-reqd">*</span></label>
                    <input type="text" class="form-control" name="contact" id="contact" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="gname">Email<span class="kv-reqd">*</span></label>
                    <input type="text" class="form-control" name="email" id="email" required>
                  </div>
                </div>

              </div>

              </div>
          </div>
      </form>


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="update">Update</button>
              </div>
            </div>

          </div>
        </div>


  <!--           DELETE MODAL -->




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

  var id = ' ';
  function getInfoId(e){
    var specifcid = $(e).attr("id");
    var strarray = specifcid.split("%");
    // alert(strarray);
    id = strarray[0];
    // 3,Talha,15026435,Year-3,faizans2015@namal.edu.pk,03331234567,Noman grp,Electrical-Engineering,Post-Graduate
    $("#stuname").val(strarray[1]);
    $("#uob").val(strarray[2]);
    $("#year").val(strarray[3]);
    $("#email").val(strarray[4]);
    $("#contact").val(strarray[5]);
    $("#group").val(strarray[6]);
    $("#department").val(strarray[7]);
    // $("#department").val(strarray[8]);
    $("#degree").val(strarray[8]);
  }
  var delid = ''
  function getDelId(e){
    var specifcid = $(e).attr("id");
    delid = specifcid;
  }

  $("#delbtn").click(function(){

    // alert(delid);
    $.ajax({
      type : 'POST',
      url: "include/deldata.php",
      data:
      {

        'id' : delid,

      },
      success : function(response)
      {
        location.reload();
      }

    });
  });


  $('#update').click(function(){
    var name = $("#stuname").val();
    var uob = $("#uob").val();
    var year = $("#year").val();
    var email = $("#email").val();
    var contact = $("#contact").val();
    var group = $("#group").val();
    // alert(group);
    var department = $("#department").val();
    // alert(department);
    // var department = $("#department").val();
    var degree = $("#degree").val();

    $.ajax({
        type : 'POST',
        url: "include/editstudent.php",
        data:
        {
          'name' : name,
          'uob': uob,
          'year' : year,
          'email' : email,
          'contact' : contact,
          'group' : group,
          'dep' : department,
          // 'deg':degree,
          'id':id,

        },
        success : function(response)
        {
          // var s = $.parseJSON(response);
          // alert(group);
          // alert(s);
          location.reload();
        }
      });
    });


</script>

</body>
</html>
