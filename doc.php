<?php 
//include_once('connect.php'); 
$query="select * from medecin"; 
$result=mysqli_query(new mysqli('localhost','root','','medsol'),$query); 
?> 
<!DOCTYPE html> 
<html> 
	<head> 
		<title> Fetch Data From Database </title> 
	</head> 
	<body> 
	<table align="center" border="1px" style="width:600px; line-height:40px;"> 
	<tr> 
		<th colspan="4"><h2>Student Record</h2></th> 
		</tr> 
			  <th> CIN  </th> 
			  <th> Nom </th> 
			  <th> Prenom </th> 
			  <th> Specialité </th> 
              <th> Adresse </th> 
              <th> Email </th> 
		</tr> 
		
		<?php while($rows=mysqli_fetch_assoc($result)) 
		{ 
		?> 
		<tr> <td><?php echo $rows['cin_med']; ?></td> 
		<td><?php echo $rows['nom_med']; ?></td> 
		<td><?php echo $rows['prenom_med']; ?></td> 
        <td><?php echo $rows['specialite']; ?></td> 
        <td><?php echo $rows['adresse_med']; ?></td> 
        <td><?php echo $rows['doctor_email_address']; ?></td> 
		</tr> 
	<?php 
               } 
          ?> 

	</table> 
	</body> 
    </html>
    
							