
<?php if(!isset($_SESSION)){
	session_start();
	}  
?>
<?php include('header.php'); ?>
<?php include('uptomenu.php'); ?>

	<div class="search form-group"  style="background-color: #7faf81;">
		<h3 class="text-center" style="background-color:#272327;color: #fff;padding: 5px;margin-top:30px;">Resultat de recherche </h3>
		
	</div>
<!-- result -->
<?php
 include 'connect_db.php'; 
?>
<?php
// include('../config.php');
					// include 'connect_db.php';
                    if(isset($_POST['submit'])){
					$sql = " SELECT *  FROM doctor_table WHERE doctor_expert_in='" . $_POST["expertise"]."' AND doctor_address='" . $_POST["address"]."'";
					$result = mysqli_query($conn,$sql);
					$count = mysqli_num_rows($result);
                    
					if($count>=1){
						echo "<table border='1' align='center' cellpadding='32'>
							<tr>
								<th>SL.</th>
								<th>Nom</th>
								<th>Adresse</th>
								
								<th>Telephone</th>
								
								<th>Email</th>
								<th> Spécialité</th>
								<th>Prix</th>
								<th> Rendez-vous</th>
								
							</tr>";
						while($row=mysqli_fetch_array($result)){
								echo "<tr>";
								echo "<td>".$row['doctor_id']."</td>";
								echo "<td>".$row['doctor_name']."</td>";
								echo "<td>".$row['doctor_address']."</td>";
								
								echo "<td>".$row['doctor_phone_no']."</td>";
								echo "<td>".$row['doctor_email_address']."</td>";

								echo "<td>".$row['doctor_expert_in']."</td>";
								echo "<td>".$row['doctor_fee']."</td>";
?>
							<td><a href="booking.php?doctor_id=<?php echo $row['doctor_id'] ?>">Réserver</a></td>;
						<?php 		
								
								echo "</tr>";
						}
						echo "</table>";
					} 
					else{
						print "<p align='center'>Aucun résultat n'a été trouvé..!!!</p>";
					}
                }
					?>
					<!-- result -->


	<button style="margin-left: 605px; width:180px;background-color:#332f30;color: antiquewhite;height: 50px;margin-top:25px;">
	<a href="search_doctor.php">Nouvelle  Recherche</a></button>
	
 <?php include('footer.php'); ?>


	
	</div><!--  containerFluid Ends -->




	<script src="js/bootstrap.min.js"></script>


 


	
</body>
</html>
