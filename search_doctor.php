<?php if(!isset($_SESSION)){
	session_start();
	}  
?>
<?php include('header.php'); ?>


<!-- <?php include('function.php'); ?> -->



	<!-- this is for donor registraton -->
	<div class="search" style="background-color:white;margin-top:150px;">
		<h3 class="text-center" style="background-color:#272327;color: #fff;padding: 5px;">Recherche par :</h3>

		 <div class="formstyle" style="padding:70px;border: 1px solid lightgrey;margin-right: 293px;margin-bottom: 30px;background-color:#f3f3f8;color:#141313;width: 530px;margin-left: 400px;">
					<form action="search_result.php" method="post" class="form-group">

					<!-- testing -->
					<label>
						Ville: </label>
						<select name="address" type="text" style="width: 110px;margin-right: 175px;" />
												<option>-Select-</option>
												<option>Sousse</option>
												<option>Tunis</option>
												<option>Monastir</option>
												<option>Nabeul</option>
												
											</select>

					<br><br>
					<!-- testing end-->

					<label>
						 Spécialité:     </label>
						 <select name="expertise" type="text" style="width: 110px;margin-right: 175px;" />
												<option>-Select-</option>
												<option>Pharmacie</option>
												<option>Cardiologie</option>
												<option>Dermatologie</option>
												<option>Neurologie</option>
												<option>Pneumologie</option>
												<option>Psychiatrie</option>
												<option> Néphrologie</option>
												<option> Dentaire</option>
												<option>Médecine générale</option>
											</select>

					
					<button name="submit" type="submit" style="border-radius: 3px;color:#000;margin-left: 145px;margin-top: 8px;">Recherche</button>
					<br>
					
					</form>



					
		 	</div>
	</div>
	
	

	
 <?php include('footer.php'); ?>


	
	</div><!--  containerFluid Ends -->




	<script src="js/bootstrap.min.js"></script>




</body>
</html>