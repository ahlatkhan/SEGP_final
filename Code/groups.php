<?php
  include 'include/session_check.php';
  include 'include/dbconn.php';
  $sql='SELECT * FROM groups';
  $result = mysqli_query($conn,$sql);
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
          <div class="col-md-12 col-md-offset-5">
            <a href="add-group.php"><button type="button" class="btn btn-md btn-primary">Add Group</button></a>

          </div>

        </div>
        <table class="table table-striped table-bordered table-hover" id="studentstable">
        	<thead>
            	<tr>
                	<th>Group Name</th>
                    <th>Teacher</th>
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
              <?php while ($row = mysqli_fetch_assoc($result)) {
                $str = $row['id'].'%'.$row['group_name'].'%'.$row['teacher_assigned'];
              ?>

                <tr>
                    <td><?=$row['group_name'];?></td>
                    <td><?=$row['teacher_assigned'];?></td>
                    <td><span data-placement="top" data-toggle="tooltip" title="Edit"><button id="<?=$str;?>" class="btn btn-sm btn-primary" onclick="getInfoId(this)"><span class="glyphicon glyphicon-pencil"></span></button></span>
                      <span data-placement="top" data-toggle="tooltip" title="Delete"><button id="<?=$str;?>" class="btn btn-sm btn-danger" onclick="getdelId(this)" data-toggle="modal" data-target="#info1"><span class="glyphicon glyphicon-trash" id="delete"></span></button></span>
                    </td>
                </tr>
              <?php } ?>

            </tbody>
            </table>





  <!-- MODAL DELETE -->
  <div class="modal fade" id="info1" role="dialog">
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
          <button type="button" class="btn btn-primary" id="delbtn">Yes</button>
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




	});

var id = ' ';
function getInfoId(e){
  var specifcid = $(e).attr("id");
  var strarray = specifcid.split("%");
  var groupname = strarray[1];
  var teacher = strarray[2];
  // alert(groupname+teacher);

  $.ajax({
    type : 'POST',
    url: "include/groupedit.php",
    data:
    {
      'grpname':groupname,
      'teacher':teacher,
    },
    success: function()
    {

      window.location.replace('group-edit.php');
      // $('#id').html(data);
    }
  });
}

var delid = '';
var group = '';
function getdelId(e){
  var specifcid = $(e).attr("id");
  var strarray = specifcid.split("%");
  delid = strarray[0];
  group = strarray[1];

}
$("#delbtn").click(function(){
  alert(delid+group);
  // alert(delid);
  $.ajax({
    type : 'POST',
    url: "include/delgroup.php",
    data:
    {

      'id' : delid,
      'group':group,

    },
    success : function(response)
    {
      alert(delid);
      location.reload();
    }

  });
});

</script>


</body>
</html>
