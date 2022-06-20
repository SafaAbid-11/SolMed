<?php if(!isset($_SESSION)){
	session_start();
	}  
?>
<?php include('header.php'); ?>
<?php include('uptomenu.php'); ?>

	
<!-- result -->
<?php 
	$doctor_id = isset($_GET['doctor_id'])?$_GET['doctor_id']:"";
	
 ?>
				<!-- fetching doctor info -->
					<?php 
					include('connect_db.php');
					

							$sql="SELECT * FROM doctor_table WHERE doctor_id = $doctor_id ";

							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
							    // output data of each row
							    while($row  = $result->fetch_assoc()) {
							        $doc_id   = $row["doctor_id"];
							        $name 	= $row["doctor_name"];
							        $expertise 	= $row["doctor_expert_in"];
							        $contact 	= $row["doctor_phone_no"];
							        $fee = $row["doctor_fee"];
									 $userid = $row["userid"];
									 $demail=$row["doctor_email_address"];
							    }
							}
							
							$conn->close();

					?>
					<!-- fetching doctor info -->

	<!-- 	booking info-->
		<div class="login" style="background-color:#fff;margin-top:50px;margin-bottom:100px;">
		<h3 class="text-center" style="background-color:#272327;color: #fff;">Book Appoinment</h3>
			<div class="formstyle" style="float: right;padding:20px;border: 1px solid lightgrey;margin-right:415px; margin-bottom:30px;background-color:#f3f3f8;color:#141313;">
				<form action="" method="post" class="text-center form-group" enctype="multipath/form-data">
					

					<label>
						Nom Dr: <input type="text" name="dname" value="<?php echo $name; ?>" >
					</label><br><br>

 					<label>
						Telephone: <input type="text" name="dcontact" value="<?php echo $contact; ?>" />
					</label><br><br>
 					
					<label>
						Spécialité: <input type="text" name="expertise" value="<?php echo $expertise; ?>" >
					</label><br><br>

					<label>
						prix(dt): <input type="text" name="fee" value="<?php echo $fee; ?>" >
					</label><br><br>
					<label>
						Votre Nom: <input type="text" name="pname" value="">
					</label><br><br>

 					<label>
						 Telephone: <input type="text" name="pcontact" value=""/>
					</label><br><br>
					<label>
						 E-mail: <input type="email" name="email" value=""/>
					</label><br><br>
 					
					<label>
						 Adresse: <input type="text" name="address" value="">
					</label><br><br>
					<label>
						 Date: <input type="date" name="dates" value="">
					</label><br><br>
					<label>
						 Heure: <select name="tyme" required>
										<option value="">-select-</option>
										<option value="11.00am">10.00am</option>
										<option value="11.00am">11.00am</option>
										<option value="03.00pm">03.00pm</option>
										<option value="03.00pm">04.00pm</option>
									</select>
					</label><br><br>
					<label>
						 Paiement: <select name="payment" required>
										<option value="">-select-</option>
										<option value="enligne">en ligne</option>
										<option value="sp">sur place</option>
									</select>
					</label><br><br>
					<label>
						  <input type="hidden" name="userid" value="<?php echo $userid; ?>">
					</label><br><br>
					<label>
						  <input type="hidden" name="demail" value="<?php echo $demail; ?>">
					</label><br><br>
					
					<button name="submit" type="submit" style="padding-right:5px;border-radius:3px;margin-right:0%;">Confirm</button> 
					<a href="search_doctor.php"><button name="" type="" style="padding-right:5px;border-radius:3px;margin-right:-150px;">Cancel</button></a> <br>


				</form> <br><br>

			</div>
			
	
		</div>
		<div style="margin-top: 900px;">
		
<?php include('footer.php'); ?>
		</div>
				<!-- 	booking info-->
				
			<!-- confirming booking -->
					<?php

						include('connect_db.php');
						if(isset($_POST['submit'])){
							

						$sql = " INSERT INTO booking (dname,userid,dcontact,expertise,fee, pname,pcontact,email,address,dates,time,payment,demail)
							VALUES ('" . $_POST["dname"] . "','" . $_POST["userid"] . "','" . $_POST["dcontact"] . "','" . $_POST["expertise"] . "', '" . $_POST["fee"] . "','" . $_POST["pname"] . "','". $_POST["pcontact"] . "','". $_POST["email"] . "','". $_POST["address"] . "','". $_POST["dates"] . "','". $_POST["tyme"] . "','". $_POST["payment"] . "','" . $_POST["demail"] . "' )";

							if ($conn->query($sql) === TRUE) {
							    echo "<script>alert('Your booking has been accepted!');</script>";
							} else {
							    echo "<script>alert('There was an Error')<script>";
							}

							$conn->close();
						}
					?> 

				<!-- confirming booking -->

	
	


	
	<!--  containerFluid Ends -->



 

	<script src="js/bootstrap.min.js"></script>


 


	
</body>
</html>
