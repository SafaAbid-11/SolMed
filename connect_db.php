
<?php
/*
$host='localhost';
$root='root';
$mdp='';
$db='testphp';
*/
/* $connexion = mysqli_connect($host,$root,$mdp) or die("erreur");
$con=mysqli_select_db($connexion,$db) or die("Base introuvable");
*/

/*$connexion=new mysqli($host,$root, $mdp, $db);
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error(); }
   */ 

    /*$connexion = new PDO("mysql:host=localhost;dbname=agence", $root, $mdp);
   $connexion->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
   */



?>


<?php   

    $conn=mysqli_connect('localhost:3307','root', '','doctor_appointment');
    if($conn === false)
    {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
?>