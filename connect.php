<?php
 echo "here is the connection page";
	$cin_med = $_POST['cin_med'];
    $nom_med = $_POST['nom_med'];
    $prenom_med = $_POST['prenom_med'];
    $adresse_med = $_POST['adresse_med'];
	$specialite = $_POST['specialite'];
	$email_med = $_POST['email_med'];
	$pw_med = $_POST['pw_med'];
	// $number = $_POST['number'];

	// Database connection
	$conn = new mysqli('localhost','root','','medsol');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into medecin(cin_med, nom_med, prenom_med,specialite,adresse_med, email_med, pw_med) values( ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssssi", $cin_med, $nom_med, $prenom_med, $specialite, $adresse_med, $email_med, $pw_med);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		

		$sql="select * from medecin ;";
		$result=mysqli_query($conn,$sql);
		$resultCheck=mysqli_num_rows($result);
		if($resultCheck>0){
			while($row=mysqli_fetch_assoc($result)){
				echo $row["nom_med"]."<br>".$row["prenom_med"]."<br>".$row["adresse_med"]."<br>".$row["specialite"]."<br>".$row["specialite"]."<br>".$row["specialite"]."<br>";
				
			}
		}
$conn->close();
	}
?>