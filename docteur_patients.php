<?php if(!isset($_SESSION)){
	session_start();
	}  
?>
<?php include('header_doc.php'); ?>





	<!-- this is for donor registraton -->
	<div class="search" style="background-color:;">
		<h3 class="text-center" style="background-color:#272327;color: #fff;padding: 5px;margin-top:150px;"> Informations Patient  </h3>

			<div class="formstyle" class="formstyle" style="padding: 10px;border: 1px solid lightgrey;margin-right: 376px;margin-left: 406px; margin-bottom: 25px;margin-top:20px;background-color:#f3f3f8;color:#141313;">

					<form action="" method="post" class="form-group">

					<!-- testing -->
					<label>
						<input type="text" name="search"  placeholder="Booking ID/phone/email" required style="margin-right: 140px;">
					</label><br><br>

					<button name="submit" type="submit" style="float: right;margin-right:66px;margin-top: -38px;border-radius: 3px;padding: 4px">Recherche</button> <br>
					
					</form>

		 	</div>
	</div>
			<?php 
					include('connect_db.php');
					if(isset($_POST["submit"])){

					$sql = " SELECT * FROM patient_table WHERE patient_phone_no = '" . $_POST["search"]."' OR patient_email_address = '" . $_POST["search"]."' ";
					$result = mysqli_query($conn,$sql);
					$count = mysqli_num_rows($result);

					if($count>=1){
						echo "<table border='1' align='center' cellpadding='32'>
							<tr>
								<th>Name</th>
								<th>Age</th>
								<th>Contact</th>
								<th>Address</th>
								
								<th>Email</th>
							</tr>";
						while($row=mysqli_fetch_array($result)){
								echo "<tr>";
								echo "<td>".$row['patient_first_name']." ".$row['patient_last_name']."</td>";
								echo "<td>".$row['patient_age']."</td>";
								
								echo "<td>".$row['patient_phone_no']."</td>";
								echo "<td>".$row['patient_address']."</td>";
								
								
								echo "<td>".$row['patient_email_address']."</td>";
								echo "</tr>";
						}
						echo "</table>";
					}
					else{
						print "<p align='center'>Désolé, Aucun résultat n'a été trouvé..!!!</p>";
					}
				}	

			?>
	

	
 <?php include('footer.php'); ?>


	
	</div><!--  containerFluid Ends -->




	<script src="js/bootstrap.min.js"></script>


 
 	 	 

<<!-- ?php 
	if(isset($_POST["sbmt"])){
		//header("location:result.php?bg=".$_POST["s2"]);
		echo "<script>location.replace('result.php?bg=". $_POST["s2"] ."');</script>";
	}

?>
 -->

</body>
</html>