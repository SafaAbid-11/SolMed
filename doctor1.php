<?php
include('connect_db.php');
error_reporting(0);
session_start();
//doctor.php


/*
if(!$object->is_login())
{
    header("location:".$object->base_url."admin");
}

if($_SESSION['type'] != 'Admin')
{
    header("location:".$object->base_url."");
}
*/
include('header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Document</title>
</head>
<body>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Doctor Management</h1>

                    <!-- DataTales Example -->
                    <span id="message"></span>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                        	<div class="row">
                            	<div class="col">
                            		<h6 class="m-0 font-weight-bold text-primary">Doctor List</h6>
                            	</div>
                            	<!-- <div class="col" align="right">
                            		<button href="addDoctor.php" type="button" name="add_doctor" id="add_doctor" class="btn btn-success btn-circle btn-sm"><i class="fas fa-plus"></i></button>
                                </div>  -->
                                <div class="col-sm-6" align="right" style="margin-top: 80px;">
                                    <a href="#addEmployeeModal"  class="btn btn-success" data-toggle="modal" ><i class="material-icons">&#xE147;</i> <span>Add New Doctor</span></a>
                                </div>
                             </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                           
                            <?php
					$sql = " SELECT * FROM doctor_table";
					$result = mysqli_query($conn,$sql);
					$count = mysqli_num_rows($result);

					if($count>=1){
						echo "<table border='1' align='center' cellpadding='32'>
						<tr>
						<th>Image</th>
						<th>Email Address</th>
						<th>Password</th>
						<th>Doctor Name</th>
						<th>Doctor Phone No.</th>
						<th>Doctor Speciality</th>
						<th>Status</th>
						<th>Action</th>
					</tr>";
						while($row=mysqli_fetch_array($result)){
								echo "<tr>";
								// echo "<td>".$row['doctor_id']."</td>";
								echo "<td>".$row['doctor_profile_image']."</td>";
								
								echo "<td>".$row['doctor_email_address']."</td>";
								echo "<td>".$row['doctor_password']."</td>";
								echo "<td>".$row['doctor_name']."</td>";
								echo "<td>".$row['doctor_phone_no']."</td>";
								echo "<td>".$row['doctor_expert_in']."</td>";
								echo "<td>".$row['doctor_status']."</td>";
								echo "<td><a href='#editEmployeeModal'class=edit' data-toggle='modal'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>
								<button type='submit' name='delete' style='color:#000;'>Delete</button></td>";
								
								echo "</tr>";
						}
						echo "</table>";
					}
					else{
						print "<p align='center'>Sorry, No match found for your search result..!!!</p>";
					}

					?>
                            </div>
                        </div>
                    </div>

<?php
  if(isset($_POST['edit']))
  {   
	  $id = $_POST['update_id'];
	  
	  $fname = $_POST['fname'];
	  $lname = $_POST['lname'];
	  $course = $_POST['course'];
	  $contact = $_POST['contact'];

	  $query = "UPDATE student SET fname='$fname', lname='$lname', course='$course', contact=' $contact' WHERE id='$id'  ";
	  $query_run = mysqli_query($connection, $query);

	  if($query_run)
	  {
		  echo '<script> alert("Data Updated"); </script>';
		  header("Location:index.php");
	  }
	  else
	  {
		  echo '<script> alert("Data Not Updated"); </script>';
	  }
  }
?>


	<div id="editEmployeeModal" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content">
   <form enctype="multipart/form-data" action=""  method="post" class="text-center" style="margin-left: 110px">
			 <div class="col-md-12">
				  	
			 		
					<label>
					    <input type="text" name="name" value="" placeholder="Full name" autocomplete="on">
					</label><br><br>
					<label>
						 <input type="text" name="address" value="" placeholder="address" >
					</label><br><br>
					<label>
						 <input type="text" name="contact" value="" placeholder="contact" >
					</label><br><br>

					<label>
						 <input type="email" name="email"  value="" placeholder="email" >
					</label><br><br>
					
					<label>
						 <select name="expertise" >
										<option>-Expert in-</option>
										<option>Pharmacie</option>
										<option>Neurologie</option>
										<option>Pediatie</option>
										<option>Cardiologie</option>
										</select>
					</label><br><br>
					<label>
					     <input type="text" name="userid" value="" placeholder="userid" >
					</label><br><br>
					<label>
					   <input type="text" name="fee" value="" placeholder="Fee" >
					</label><br><br>
					<label>
					   <input type="password" name="password" value="" placeholder="password" >
					</label><br><br>
					<div style="margin-top: 10px;">
                    <label>
						 <input type="file" name="pic" id="pic">
					</label><br><br>
					
					<button name="submit" type="submit" style="margin-left:148px;margin-top: 4px;width:95px;border-radius: 3px;height: 30px">Add Doctor</button> <br>
				
			</div>	<!-- col-md-12 -->


				</form>
   </div>
  </div>
 </div>
 



<?php
 //include('../includes/scripts.php');
 include('footer.php');
 ?>
<div id="doctorModal" class="modal fade" >
  	<div class="modal-dialog">
    	<form method="POST" id="doctor_form">
      		<div class="modal-content">
        		<div class="modal-header" >
          			<h4 class="modal-title" id="modal_title">Add Doctor</h4>
          			<button type="button" class="close" data-dismiss="modal">&times;</button>
        		</div>
        		<div class="modal-body">
        			<span id="form_message"></span>
		          	<div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Doctor Email Address <span class="text-danger">*</span></label>
                                <input type="text" name="doctor_email_address" id="doctor_email_address" class="form-control" required data-parsley-type="email" data-parsley-trigger="keyup" />
                            </div>
                            <div class="col-md-6">
                                <label>Doctor Password <span class="text-danger">*</span></label>
                                <input type="password" name="doctor_password" id="doctor_password" class="form-control" required  data-parsley-trigger="keyup" />
                            </div>
		          		</div>
		          	</div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Doctor Name <span class="text-danger">*</span></label>
                                <input type="text" name="doctor_name" id="doctor_name" class="form-control" required data-parsley-trigger="keyup" />
                            </div>
                            <div class="col-md-6">
                                <label>Doctor Phone No. <span class="text-danger">*</span></label>
                                <input type="text" name="doctor_phone_no" id="doctor_phone_no" class="form-control" required  data-parsley-trigger="keyup" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Doctor Address </label>
                                <input type="text" name="doctor_address" id="doctor_address" class="form-control" />
                            </div>
                            <div class="col-md-6">
                                <label>Doctor Date of Birth </label>
                                <input type="text" name="doctor_date_of_birth" id="doctor_date_of_birth" readonly class="form-control" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Doctor Degree <span class="text-danger">*</span></label>
                                <input type="text" name="doctor_degree" id="doctor_degree" class="form-control" required data-parsley-trigger="keyup" />
                            </div>
                            <div class="col-md-6">
                                <label>Doctor Speciality <span class="text-danger">*</span></label>
                                <input type="text" name="doctor_expert_in" id="doctor_expert_in" class="form-control" required  data-parsley-trigger="keyup" />
                            </div>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label>Doctor Image <span class="text-danger">*</span></label>
                        <br />
                        <input type="file" name="doctor_profile_image" id="doctor_profile_image" value="<?php {echo @$pic;} ?> />
                        <div id="uploaded_image"></div>
                        <input type="hidden" name="hidden_doctor_profile_image" id="hidden_doctor_profile_image" />
                    </div> -->
        		</div>
        		<div class="modal-footer">
          			<input type="hidden" name="hidden_id" id="hidden_id" />
          			<input type="hidden" name="action" id="action" value="Add" />
          			<input type="submit" name="submit" id="submit_button" class="btn btn-success" value="Add" />
          			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        		</div>
      		</div>
    	</form>
  	</div>
</div>

<div id="viewModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modal_title">View Doctor Details</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body" id="doctor_details">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){

	var dataTable = $('#doctor_table').DataTable({
		"processing" : true,
		"serverSide" : true,
		"order" : [],
		"ajax" : {
			url:"doctor_action.php",
			type:"POST",
			data:{action:'fetch'}
		},
		"columnDefs":[
			{
				"targets":[0, 1, 2, 4, 5, 6, 7],
				"orderable":false,
			},
		],
	});

    $('#doctor_date_of_birth').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true
    });

	$('#add_doctor').click(function(){
		
		$('#doctor_form')[0].reset();

		$('#doctor_form').parsley().reset();

    	$('#modal_title').text('Add Doctor');

    	$('#action').val('Add');

    	$('#submit_button').val('Add');

    	$('#doctorModal').modal('show');

    	$('#form_message').html('');

	});

	$('#doctor_form').parsley();

	$('#doctor_form').on('submit', function(event){
		event.preventDefault();
		if($('#doctor_form').parsley().isValid())
		{		
			$.ajax({
				url:"doctor_action.php",
				method:"POST",
				data: new FormData(this),
				dataType:'json',
                contentType: false,
                cache: false,
                processData:false,
				beforeSend:function()
				{
					$('#submit_button').attr('disabled', 'disabled');
					$('#submit_button').val('wait...');
				},
				success:function(data)
				{
					$('#submit_button').attr('disabled', false);
					if(data.error != '')
					{
						$('#form_message').html(data.error);
						$('#submit_button').val('Add');
					}
					else
					{
						$('#doctorModal').modal('hide');
						$('#message').html(data.success);
						dataTable.ajax.reload();

						setTimeout(function(){

				            $('#message').html('');

				        }, 5000);
					}
				}
			})
		}
	});

	$(document).on('click', '.edit_button', function(){

		var doctor_id = $(this).data('id');

		$('#doctor_form').parsley().reset();

		$('#form_message').html('');

		$.ajax({

	      	url:"doctor_action.php",

	      	method:"POST",

	      	data:{doctor_id:doctor_id, action:'fetch_single'},

	      	dataType:'JSON',

	      	success:function(data)
	      	{

	        	$('#doctor_email_address').val(data.doctor_email_address);

                $('#doctor_email_address').val(data.doctor_email_address);
                $('#doctor_password').val(data.doctor_password);
                $('#doctor_name').val(data.doctor_name);
                $('#uploaded_image').html('<img src="'+data.doctor_profile_image+'" class="img-fluid img-thumbnail" width="150" />')
                $('#hidden_doctor_profile_image').val(data.doctor_profile_image);
                $('#doctor_phone_no').val(data.doctor_phone_no);
                $('#doctor_address').val(data.doctor_address);
                $('#doctor_date_of_birth').val(data.doctor_date_of_birth);
                $('#doctor_degree').val(data.doctor_degree);
                $('#doctor_expert_in').val(data.doctor_expert_in);

	        	$('#modal_title').text('Edit Doctor');

	        	$('#action').val('Edit');

	        	$('#submit_button').val('Edit');

	        	$('#doctorModal').modal('show');

	        	$('#hidden_id').val(doctor_id);

	      	}

	    })

	});

	$(document).on('click', '.status_button', function(){
		var id = $(this).data('id');
    	var status = $(this).data('status');
		var next_status = 'Active';
		if(status == 'Active')
		{
			next_status = 'Inactive';
		}
		if(confirm("Are you sure you want to "+next_status+" it?"))
    	{

      		$.ajax({

        		url:"doctor_action.php",

        		method:"POST",

        		data:{id:id, action:'change_status', status:status, next_status:next_status},

        		success:function(data)
        		{

          			$('#message').html(data);

          			dataTable.ajax.reload();

          			setTimeout(function(){

            			$('#message').html('');

          			}, 5000);

        		}

      		})

    	}
	});

    $(document).on('click', '.view_button', function(){
        var doctor_id = $(this).data('id');

        $.ajax({

            url:"doctor_action.php",

            method:"POST",

            data:{doctor_id:doctor_id, action:'fetch_single'},

            dataType:'JSON',

            success:function(data)
            {
                var html = '<div class="table-responsive">';
                html += '<table class="table">';

                html += '<tr><td colspan="2" class="text-center"><img src="'+data.doctor_profile_image+'" class="img-fluid img-thumbnail" width="150" /></td></tr>';

                html += '<tr><th width="40%" class="text-right">Doctor Email Address</th><td width="60%">'+data.doctor_email_address+'</td></tr>';

                html += '<tr><th width="40%" class="text-right">Doctor Password</th><td width="60%">'+data.doctor_password+'</td></tr>';

                html += '<tr><th width="40%" class="text-right">Doctor Name</th><td width="60%">'+data.doctor_name+'</td></tr>';

                html += '<tr><th width="40%" class="text-right">Doctor Phone No.</th><td width="60%">'+data.doctor_phone_no+'</td></tr>';

                html += '<tr><th width="40%" class="text-right">Doctor Address</th><td width="60%">'+data.doctor_address+'</td></tr>';

                html += '<tr><th width="40%" class="text-right">Doctor Date of Birth</th><td width="60%">'+data.doctor_date_of_birth+'</td></tr>';
                html += '<tr><th width="40%" class="text-right">Doctor Qualification</th><td width="60%">'+data.doctor_degree+'</td></tr>';

                html += '<tr><th width="40%" class="text-right">Doctor Speciality</th><td width="60%">'+data.doctor_expert_in+'</td></tr>';

                html += '</table></div>';

                $('#viewModal').modal('show');

                $('#doctor_details').html(html);

            }

        })
    });

	$(document).on('click', '.delete_button', function(){

    	var id = $(this).data('id');

    	if(confirm("Are you sure you want to remove it?"))
    	{

      		$.ajax({

        		url:"doctor_action.php",

        		method:"POST",

        		data:{id:id, action:'delete'},

        		success:function(data)
        		{

          			$('#message').html(data);

          			dataTable.ajax.reload();

          			setTimeout(function(){

            			$('#message').html('');

          			}, 5000);

        		}

      		})

    	}

  	});



});
</script>

	
<!-- Edit Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content">
   <form enctype="multipart/form-data" action=""  method="post" class="text-center" style="margin-left: 110px">
			 <div class="col-md-12">
				  	
			 		
					<label>
					    <input type="text" name="name" value="" placeholder="Full name" autocomplete="on">
					</label><br><br>
					<label>
						 <input type="text" name="address" value="" placeholder="address" >
					</label><br><br>
					<label>
						 <input type="text" name="contact" value="" placeholder="contact" >
					</label><br><br>

					<label>
						 <input type="email" name="email"  value="" placeholder="email" >
					</label><br><br>
					
					<label>
						 <select name="expertise" >
										<option>-Expert in-</option>
										<option>Pharmacie</option>
										<option>Neurologie</option>
										<option>Pediatie</option>
										<option>Cardiologie</option>
										</select>
					</label><br><br>
					<label>
					     <input type="text" name="userid" value="" placeholder="userid" >
					</label><br><br>
					<label>
					   <input type="text" name="fee" value="" placeholder="Fee" >
					</label><br><br>
					<label>
					   <input type="password" name="password" value="" placeholder="password" >
					</label><br><br>
					<div style="margin-top: 10px;">
                    <label>
						 <input type="file" name="pic" id="pic">
					</label><br><br>
					
					<button name="submit" type="submit" style="margin-left:148px;margin-top: 4px;width:95px;border-radius: 3px;height: 30px">Add Doctor</button> <br>
				
			</div>	<!-- col-md-12 -->


				</form>
   </div>
  </div>
 </div>
    
					<!-- inserting data -->
					<?php
						if(isset($_POST['submit'])){
                             echo "messsssss";
							$target_dir = "immg/";
							$target_file = $target_dir . basename($_FILES["pic"]["name"]);
							$uploadOk = 1;
							$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
							// Check if image file is a actual image or fake image

						    $check = getimagesize($_FILES["pic"]["tmp_name"]);
						    if($check !== false) {
						        // echo "File is an image - " . $check["mime"] . ".";
						        $uploadOk = 1;
						    } else {
						        echo "File is not an image.";
						        $uploadOk = 0;
						    }

							// Check if file already exists
							if (file_exists($target_file)) {
							    echo "<script>alert('Sorry, file already exists.');</script>";
							    $uploadOk = 1;
							}
							//aloow certain file formats
							if($imageFileType != "jpg" && $imageFileType !="png" && $imageFileType !="jpeg" && $imageFileType !="gif"){
								echo "sorry, only jpg, jpeg, Png & gif files are allowed.";
								$uploadok=0;
							}	
						else{
							if(move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
                                    
                                $sql1 = "SELECT * FROM doctor_table WHERE userid='".$_POST["userid"]."' OR doctor_email_address= '" . $_POST["email"] . "' ";
	              					$result = $conn->query($sql1);
	              					if($result->num_rows > 0){
	              						 echo "<script>alert('Sorry, Userid or E-mail already exist!');</script>";
	              					}
	              					else{

							$sql = "INSERT INTO doctor_table (doctor_id,doctor_email_address,doctor_password,doctor_name,doctor_phone_no,doctor_address,doctor_expert_in,doctor_fee,userid,doctor_profile_image)
							VALUES ('" . $_POST["doctor_id"] ."','" . $_POST["email"] . "','" . $_POST["password"] . "','" . $_POST["name"] . "','" . $_POST["contact"] . "','" . $_POST["address"] . "', '" . $_POST["expertise"] . "','" . $_POST["fee"] . "','" . $_POST["userid"] . "','" . $_POST["pic"] . "')";
                            $res = mysqli_query($conn, $sql);

						// 	if ($res) {
						// 	    echo "<script>alert('New Doctor Has been Added Successfully!');</script>";
                            
                        //     echo "<script type='text/javascript'>window.top.location='http://localhost/Medilab/admin/doctor1.php';</script>"; exit;
                        //     } else {
						// 	    echo "<script>alert('There was an Error')<script>";
						// 	}
                        // }
						// 	$conn->close();
						// 	} else {
						// 		echo "<script>alert('sorry there was an error!');</script>";
							}
							
							
						}
				}}
				?>
					<!-- inserting data -->
					<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>					
</body>
</html>