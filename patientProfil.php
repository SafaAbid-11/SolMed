<?php if(!isset($_SESSION)){
	session_start();
	}  
?>
<?php include('header.php'); ?>
<?php include('uptomenu.php'); ?>

<!-- for retriving data -->
				<?php 
							include('connect_db.php');
							$sql="SELECT * FROM patient_table where patient_email_address='" . $_SESSION["email"] . "'";
			
							$q=mysqli_query($conn,$sql);
							$row=mysqli_num_rows($q);
							
							$data=mysqli_fetch_array($q);
							$fname=$data[3];
							$lname=$data[4];
							$age=$data[13];
							$contact=$data[8];
							$address=$data[7];
							$bgroup=$data[5];
							$email=$data[1];

							mysqli_close($conn);
				?>
<!-- for retriving data -->

<div class="login" style="background-color:#fff;margin-top:100px;margin-bottom:300px;">
		<h3 class="text-center" style="background-color:#272327;color: #fff;">Mon profil</h3>
			<div class="formstyle" style="float: right;padding:20px;border: 1px solid lightgrey;margin-right:500px; margin-bottom:30px;background-color:#f3f3f8;color:#141313;">
				<form action="" method="post" class="text-center form-group">
					<label>
						Prenom: <input type="text" name="fname" value="<?php echo $fname; ?>" placeholder="First name" required>
					</label><br><br>
					<label>
						Nom: <input type="text" name="lname" value="<?php echo $lname; ?>" placeholder="Last name" required>
					</label><br><br>

					<label>
						Age: <input type="number" name="age"  value="<?php echo $age; ?>" placeholder="age" required="required"  title="please enter only  numbers between 2 to 2 for age"/>
					</label><br><br>
					<label>
						Telephone: <input type="text" name="contact" value="<?php echo $contact; ?>" placeholder="contact no" required="required"  title="please enter only numbers between 10 to 11 for mobile no."/>
					</label><br><br>
 					
 					<label>
						Adresse: <input type="text" name="address" value="<?php echo $address; ?>" placeholder="address" required>
					</label><br><br>
					

					<label>
						Email: <input type="email" name="email" value="<?php echo $email; ?>" placeholder="email" required>
					</label><br><br>
					
					
					
					<button name="submit" type="submit" style="margin-left:43px;width:108px;border-radius: 3px;">Modifier</button> <br>


			</form> <br>
				
				<br>

				
		
				
			
		
	</div>
	
	
</div>
<br><br><br>

			<!-- update information -->

				<?php
							include('./database/connexion.php');
							if(isset($_POST['submit'])){
							

							$sql="UPDATE patient_table SET patient_first_name='" .$_POST["fname"]. "',patient_last_name='" .$_POST["lname"]. "' ,patient_age='" .$_POST["age"]."' , patient_phone_no='" .$_POST["contact"]. "',patient_address='" .$_POST["address"]. "', patient_email_address='".$_POST["email"]."' WHERE patient_email_address='" .$_SESSION["email"]. "'";
		
							if (mysqli_query($conn, $sql)) {
						    echo "<script>alert(' Record updated successfully');</script>";
							} else {
							    echo "<script>alert('There was a Error Updating profile');</script>";
							}

						mysqli_close($conn);
													}
					?> 
			<!-- update information End -->


 <?php include('footer.php'); ?>


</body>
</html>
