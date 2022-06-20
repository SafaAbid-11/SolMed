<?php if(!isset($_SESSION)){
	session_start();
	}  
?>
<?php 
// error_reporting(0);
// session_start();
include('header_doc.php'); ?>


<!-- for retriving data -->
				<?php 
							include('connect_db.php');
						//	$sql="SELECT * FROM doctor_table where doctor_email_address='" . $_SESSION["email"] . "'";
						
						
						$sql="SELECT * FROM doctor_table where doctor_email_address='" . $_SESSION["docemail"] . "'";
							
							$q=mysqli_query($conn,$sql);
							$row=mysqli_num_rows($q);
							echo $row;
							$data=mysqli_fetch_array($q);
							$name=$data[3];
							$address=$data[6];
							$contact=$data[5];
							$email=$data[1];
							$userid=$data[14];
							$expertise=$data[9];
							$fee=$data[12];
							$pic = $data[4];

							mysqli_close($conn);
				?>
<!-- for retriving data -->

<div class="login" style="background-color:#fff;margin-top:100px;">
		<h3 class="text-center" style="background-color:#272327;color: #fff;">Mon profil</h3>
			<div class="formstyle" style="float: right;padding:20px;border: 1px solid lightgrey;margin-right:415px; margin-bottom:30px;background-color:#f3f3f8;color:#141313;">
				<form action="" method="post" class="text-center form-group">
					<img src="assets/img/<?php echo @$pic; ?>" style="padding-left:40px;width:165px;height:115px;float: left;margin-bottom:60px;margin-left:35px;"/>
                    <div style="margin-top: 10px;">
                    <label>
						 <input type="file" name="pic" value="<?php {echo @$pic;} ?>">
					</label><br><br>

					<label>
						Votre Nom: <input type="text" name="name" value="<?php echo $name; ?>" required>
					</label><br><br>

 					<label>
						Adresse: <input type="text" name="address" value="<?php echo $address; ?>"  required>
					</label><br><br>
                    <label>
						Telephone: <input type="text" name="contact" value="<?php echo $contact; ?>"  required="required" />
					</label><br><br>
 					<label>
						Email: <input type="email" name="email" value="<?php echo $email; ?>" " required>
					</label><br><br>
					<label>
						Userid: <input type="text" name="userid" value="<?php echo $userid; ?>"  disabled>
					</label><br><br>
					<label>
						 Specialté: <input type="email" name="email" value="<?php echo $expertise; ?>"  disabled>
					</label><br><br>

					<label>
						Prix: <input type="text" name="fee" value="<?php echo $fee; ?>"  disabled>
					</label><br><br>
					<label>

					</div>
					
					<button name="submit" type="submit" style="margin-left:30px;width:108px;border-radius: 3px;">Modifier</button> <br>


			</form> <br><br>

	</div>
	
	
</div>


			<!-- update information -->

				<?php

						include('connect_db.php');
						if(isset($_POST['submit'])){
							

							$sql="UPDATE doctor_table SET doctor_name='" .$_POST["name"]. "' ,doctor_address='" .$_POST["address"]."' , doctor_phone_no='" .$_POST["contact"]. "',doctor_email_address='" .$_POST["email"]. "' ,doctor_profile_image='" .$_POST["pic"]. "' WHERE doctor_email_address='" . $_SESSION["docemail"] . "'";
		
							if (mysqli_query($conn, $sql)) {
							echo "<script>alert(' Record updated successfully');</script>";
							echo "<script type='text/javascript'>window.top.location='http://localhost/SolMed/doctorProfil.php';</script>"; exit;
							} else {
							    echo "<script>alert('There was a Error Updating profile');</script>";
							   
							}

						mysqli_close($conn);
													}
					?> 
	</div>		<!-- update information End -->

<div style="margin-top:750px;">
  <?php include('footer.php'); ?>
</div>

	
	<!--  containerFluid Ends -->




	<script src="js/bootstrap.min.js"></script>



</body>
</html>
