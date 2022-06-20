<?php
if(!isset($_SESSION)){
	session_start();
	}  
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>mms-patient</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="../style.css">
</head>
<body>

<?php

// if($_SESSION['donorstatus']==""){
// 	header("location:../userlogin.php");
// }

?>
	
    <?php include('header.php'); ?>
<main>
  
	<!-- this is for donor registraton -->
	<div class="dashboard" style="background-color:#fff;">
		<h3 class="text-center" style="background-color:#272327;color: #fff;padding: 5px;margin-top:0px;">Welcome to Your Panel</h3>
		</div>
		<?php include('body.php');?>
			
		
	
</main>	
<?php include('footer.php'); ?>


	
</div><!--  containerFluid Ends -->

<script src="js/bootstrap.min.js"></script>


</body>
</html>
