<?php
if(!isset($_SESSION)){
    
        session_start();
}
include 'connect_db.php';
if(isset($_GET['dates']))
{  
    $dates = $_GET['dates'];
    $del = "DELETE from booking where dates='$dates'";
    $DELETE= mysqli_query($conn, $del);
    mysqli_close($conn);
    header("location:mesrdv.php");
}
					?> 