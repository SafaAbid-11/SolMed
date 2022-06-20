<?php if(!isset($_SESSION)){
	session_start();
	}  
?>

<?php include('header_doc.php'); ?>






	<!-- this is for donor registraton -->
	<div class="dashboard" style="background-color:#fff;margin-top:150px;">
		<h3 class="text-center" style="background-color:#272327;color: #fff;padding: 5px;">Rendez-vous d'aujourd'hui </h3>
		
		
	</div>
		
			<div class="all_user" style="margin-top:0px; margin-left: 40px;">
				<?php 
					include('connect_db.php');

					$sql = " SELECT * FROM booking WHERE demail='doc1@gmail.com'";
					$result = mysqli_query($conn,$sql);
					$count = mysqli_num_rows($result);

					if($count>=1){
						echo "<table border='1' align='center' cellpadding='32'>
							<tr>
								<th>Nom patient </th>
								<th>Telephone</th>
								<th>E-mail</th>
								<th>Adresse</th>
								<th>Date</th>
								<th>Heure</th>
							</tr>";
						while($row=mysqli_fetch_array($result)){
								echo "<tr>";
								echo "<td>".$row['pname']."</td>";
								echo "<td>".$row['pcontact']."</td>";
								echo "<td>".$row['email']."</td>";
								echo "<td>".$row['address']."</td>";
								echo "<td>".$row['dates']."</td>";
								echo "<td>".$row['time']."</td>";
								echo "</tr>";
						}
						echo "</table>";
					}
					else{
						print "<p align='center'>Sorry, No match found for your search result..!!!</p>";
					}

					?>
			</div>
		
	
	
	

	
 <?php include('footer.php'); ?>


	
	</div><!--  containerFluid Ends -->




	<script src="js/bootstrap.min.js"></script>


 
			



	
</body>
</html>
