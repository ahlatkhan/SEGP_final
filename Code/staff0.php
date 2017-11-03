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

  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" id="navback">NAMAL PAT SYSTEM</a>
      </div>
      <ul class="nav navbar-nav">
        <li><button type="button" class="btn btn-danger" id="log">logout</button></li>
      </ul>
    </div>
  </nav>




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
        <div class="row">
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
          <select class="form-control" style="height:30px" data-style="btn-primary">
          <option>Education</option>
          <option>Uder-Grad</option>
          <option>Post-Grad</option>
        </select>
          </div>
          <div class="col-lg-4">
              <a href="add-staff.php"><button class="btn btn-primary">Add Staff</button></a><br /><br />
            </div>
        </div>

        <table class="table table-striped table-bordered table-hover" id="studentstable">
          <thead>
              <tr>
                  <th>Name</th>
                    <th>UoB No</th>
                    <th>Group Name</th>
                    <th>Phone Number</th>
                    <th>Action</th>
                    <!-- <th></th> -->

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
              <tr>
                    <td>Sheryar Saleem</td>
                    <td>1502584</td>
                    <td>Adil Raja</td>
                    <td>3352568971</td>
                    <td><span data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#info"><span class="glyphicon glyphicon-pencil"></span></button></span>
                      <span data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#info1"><span class="glyphicon glyphicon-trash" id="delete"></span></button></span>
                    </td>
                    <!-- <td><span class="input-group-addon" data-toggle="modal" data-target="#del" style="background-color: #f9243f; border-radius: 8px;">
                              <i class="glyphicon glyphicon-trash" id="delete"></i>
                            </span></td> -->
                </tr>


            </tbody>
        </table>

        <div class="modal fade" id="info" role="dialog">
          <div class="modal-dialog modal-md" id="mymodal">

            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
                <h4 class="modal-title">Students Information</h4>
              </div>
              <div class="modal-body">
               <!-- <p>Some text in the modal.</p>-->
               <div class="col-lg-12 well well-sm" style="padding-bottom: 50px;">
                 <form class="form form-vertical" action="" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-sm-4 text-center">
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
                           <!--<div class="kv-avatar">
                                <div class="file-loading">
                                    <input id="avatar-1" name="avatar-1" type="file" required>
                                </div>
                            </div>
                            <div class="kv-avatar-hint">Select file < 1500 KB</div>-->
                        </div>
                        <div class="col-sm-8">
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="name">Name<span class="kv-reqd">*</span></label>
                                <input type="name" class="form-control" name="name" required>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="dept">Department<span class="kv-reqd">*</span></label>
                                <select class="form-control" data-style="btn-primary" id="choose" style="height: calc(2.25rem + 10px);">
                                <option>Computer Science</option>
                                <option>Electrical Engineering</option>
                                <option>BBA</option>
                              </select>
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="email">Email<span class="kv-reqd">*</span></label>
                                <input type="email" class="form-control" name="email" required>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="contact">Contact <span class="kv-reqd">*</span></label>
                                <input type="text" class="form-control" name="contact" required>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="subject">Subjects<span class="kv-reqd">*</span></label>
                                <input type="text" class="form-control" name="subject" required>
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group">
                                <label for="group">Group Name <span class="kv-reqd">*</span></label>
                                <input type="text" class="form-control" name="group" required>
                              </div>
                            </div>
                          </div>

                        <div class="row">
                          <div class="col-sm-6">
                            <label for="degree">Degree <span class="kv-reqd">*</span></label>
                            <select class="form-control" data-style="btn-primary" id="choose" style="height: calc(2.25rem + 10px);">
                            <option>Uder-Grad</option>
                            <option>Post-Grad</option>
                          </select>
                        </div>
                        <div class="col-sm-6">
                          <label for="group">Group<span class="kv-reqd">*</span></label>
                          <select class="form-control" data-style="btn-primary" id="choose" style="height: calc(2.25rem + 10px);">
                          <option>Adil Raja</option>
                          <option>Noman Javed</option>
                        </select>
                      </div>
                    </div><br><br>
                        </div>
                    </div>
                </form>
                <!--<div id="kv-avatar-errors-1" class="center-block" style="width:800px;display:none"></div>-->
       </div>
    <!--  <div id="kv-avatar-errors-1" class="center-block" style="width:800px;display:none"></div>-->


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary">Save</button>
              </div>
            </div>

          </div>
        </div>

  <!--           DELETE MODAL -->

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
          <button type="button" class="btn btn-primary">Yes</button>
        </div>
      </div>

    </div>
  </div>

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
</script>

</body>
</html>
