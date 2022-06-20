<?php if(!isset($_SESSION)){
	session_start();
	}  
?>

<?php include('header_doc.php');

?>


 



	<!-- this is for donor registraton -->
	<div class="dashboard" style="background-color:#fff;margin-top:150px;">
		<!-- <h3 class="text-center" style="background-color:#272327;color: #fff;padding: 5px;">  Espace docteur </h3> -->
		
		
	<!-- <span class="adminDashboard" style="font-size: 45px;font-weight: bold;color: blue;font-family: serif;margin-left: 180px;">Bienvenue dans l'espace docteur  </span> -->
	<?php	
	// echo $_SESSION["docemail"];
		 ?>
	</div>
	
	<?php include('body.php'); ?>

	
 <?php include('footer.php'); ?>


	
	</div><!--  containerFluid Ends -->




	<script src="js/bootstrap.min.js"></script>


 
			



	
</body>
</html>
