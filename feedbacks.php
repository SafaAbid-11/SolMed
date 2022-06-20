<?php session_start();  ?>
<?php include('header.php'); ?>
<?php include('uptomenu.php'); ?>


	<div class="login" style="background-color:#fff;margin-bottom: 10px;">
		<h3 class="text-center" style="background-color:#272327;color: #fff;margin-top:50px;">Mon Feedback</h3>
			<div class="formstyle" style="float: right;padding:20px;border: 1px solid lightgrey;margin-right:415px; margin-bottom:30px;background-color:#f3f3f8;color:#141313;margin-top: 10px;">
				<form action="" method="post" class="text-center form-group">
					<label>
						<span> Feedback:</span><br><br><textarea name="feedback" id="" cols="40" rows="4" required></textarea>
					</label><br><br>
					
					<button name="submit" type="submit" style="margin-left: -26px;width: 85px;border-radius: 3px;">Envoyer</button> <br>

					


					<!-- login validation -->
			<?php 
					
							include('connect_db.php');
							if(isset($_POST['submit'])){
							

							$sql = "INSERT INTO feedback (email,feedback)	VALUES ('" . $_SESSION["email"] ."','" . $_POST["feedback"] ."')";

							if ($conn->query($sql) === TRUE) {
							    echo "<script>alert('Merci pour votre feedback !');</script>";
							} else {
							    echo "<script>alert('Une erreur a survenue !!!!')<script>";
							}

							$conn->close();
						}
					
 			?>
		<!-- login validation End-->


				</form> <br>&nbsp;&nbsp;&nbsp;
				
				<br>

				
		
				
			
		
	</div>
	
	
</div>
<div style="margin-top:300px;">
 <?php include('footer.php'); ?>

</div>
</body>
</html>
