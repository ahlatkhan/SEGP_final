<?php
  include 'include/session_check.php';
  include 'include/dbconn.php';
  $deg = $_POST['finddegree'];
  $year = $_POST['findyear'];

  if ($year != 'All-Years' && $deg != 'Degree') {
    $sql = "SELECT * FROM students WHERE degree = '$deg'AND year = '$year'";
  }elseif ($deg !='Degree'){
    $sql = "SELECT * FROM students WHERE degree = '$deg'";
  }
  $result = mysqli_query($conn,$sql);

  $sql_years = "SELECT * FROM yearly";
  $resultyears = mysqli_query($conn,$sql_years);
  $sql_degrees = "SELECT * FROM degree";
  $resultdegrees = mysqli_query($conn,$sql_degrees);
  $sqlgrp='SELECT group_name FROM groups';
  $resultgrp=mysqli_query($conn,$sqlgrp);
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


<title>Student Page</title>
</head>

<body id="back">
  <?php include 'include/navbar.php'?>






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
        <div class="row">
          <!-- <form > -->


      <form role="form" class=" form-inline col-lg-6 col-lg-offset-2" method="POST" action="find.php">

        <div class="form-group" style=" padding:10px 10px 10px 100px;">


          <select class="form-control" style="height:30px" name="finddegree" data-style="btn-primary" id="finddegree">
            <option>Degree</option>
            <option value="Under-Graduate">Under-Graduate</option>
            <option value="Post-Graduate">Post-Graduate</option>

          </select>
        </div>
          <div class="form-group " style="padding:10px 10px 10px 10px;" >

            <select class="form-control" style="height:30px" name="findyear" data-style="btn-primary" id="findyear">
              <option value="All-Years">All-Years</option>
              <option value="Year-1">Year-1</option>
              <option value="Year-2">Year-2</option>
              <option value="Year-3">Year-3</option>
              <option value="Year-4">Year-4</option>

          </select>


        </div >
          <div class="form-group" style="padding:10px 10px 10px 10px;">
            <input type="submit" class="btn btn-primary" id="find" value="Find Students">
          </div><div style="padding:10px 10px 10px 0px;"></div>


            <!-- </form> -->
            </form>
            <div class="col-lg-2" style=" padding:10px 10px 10px 0px;">
              <a href="add-student.php"><button class="btn btn-primary">Add Student</button></a>
            </div>
        </div>







        <table class="table table-striped table-bordered table-hover" id="studentstable">
        	<thead>
            	<tr>
                	<th>Name</th>
                    <th>UoB No</th>
                    <th>Year</th>
                    <th>Degree</th>
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
            <tbody class="tbody" id="Stable">
              <?php while ($row = mysqli_fetch_assoc($result)) {
                $str = $row["id"]."%".$row['name']."%".$row['uob']."%".$row["year"]."%".$row["email"]."%".$row["contact"]."%".$row["group_name"]."%".$row["department"]."%".$row["degree"];
                ?>

                <tr id="tablerow">
                  	  <td class="td"><?php echo $row['name'] ?></td>
                      <td class="td"><?php echo $row['uob'] ?></td>
                      <td class="td"><?php echo $row['year'] ?></td>
                      <td class="td"><?php echo $row['degree'] ?></td>
                      <td class="td"><?php echo $row['group_name'] ?></td>
                      <td class="td"><span data-placement="top" data-toggle="tooltip" title="Edit"><button id="<?=$str?>" onclick="getInfoId(this)" class=" btn btn-sm btn-primary" data-toggle="modal" data-target="#info"><span class="glyphicon glyphicon-pencil"></span></button></span>
                        <span data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-sm btn-danger" id="<?=$row['id'];?>" onclick="getDelId(this)"   data-toggle="modal" data-target="#del"><span class="glyphicon glyphicon-trash" id="delete"></span></button></span>
                      </td>
                      <!-- <td><span class="input-group-addon" data-toggle="modal" data-target="#del" style="background-color: #f9243f; border-radius: 8px;">
                              	<i class="glyphicon glyphicon-trash" id="delete"></i>
                              </span></td> -->
                  </tr>
              <?php  } ?>


            </tbody>
        </table>



  <!--           DELETE MODAL -->

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



    $("#find").attr('disabled',true);
    $("#findyear").attr('disabled',true);


    $('#finddegree').change(function(){

      var deg =  $('#finddegree').val();
      var year = $('#findyear').val();
      // alert(deg+year);
      $("#findyear").attr('disabled',true);
      if(deg !='Degree'){
        $("#findyear").attr('disabled',false);
        $("#find").attr('disabled',false);
      }
    });

    $('#year').change(function(){


      var deg =  $('#finddegree').val();
      var year = $('#findyear').val();
      // alert(deg+year);
      // if(year =='All-Years'){
      //   $("#find").attr('disabled',true);
      // }
      if(year !='All-Years'){
        $("#find").attr('disabled',false);
      }
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
    var department = $("#department").val();
    // alert(department);
    // var department = $("#department").val();
    var degree = $("#degree").val();
    // alert(degree);

    // return false;
    // alert(name+group+uob+year+email+contact+department+degree+id);
    // return false;
    // Sheharyar SaleemNoman grp15026388Year-3sheharyar@gmail.com03234938688Computer ScienceUnder-Graduate4

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
          'degree':degree,
          'id':id,

        },
        success : function(response)
        {
          var s = $.parseJSON(response);
          alert(s);
          // alert(s);
          location.reload();
        }
      });
    });




</script>

</body>
</html>
