<?php
// $id=$_post["id"];
// $pseudo_ad=$_post["pseudo_ad"];
// $mdp_ad=$_post["mdp_ad"];
$mysqli = new mysqli("localhost", "root", "", "doctor_appointment");
include 'index.html';
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

// if (!$mysqli->query("SET a=1")) {
//     printf("Error message: %s\n", $mysqli->error);
// }

/* close connection */
$mysqli->close();
?>
<!DOCTYPE html>
<html>
<head>
	<title> Login Form in HTML5 and CSS3</title>
	<link rel="stylesheet" a href="css\style.css">
	<link rel="stylesheet" a href="css\font-awesome.min.css">
</head>
<body>
	<!-- <div class="container">
	<img src="image/login.png"/>
		<form action="">
			<div class="form-input">
				<input type="text" name="text" placeholder="Enter the User Name"/>	
			</div>
			<div class="form-input">
				<input type="password" name="password" placeholder="password"/>
			</div>
			<input type="submit" type="submit" value="LOGIN" class="btn-login"/>
		</form>
	</div> -->
</body>
</html>