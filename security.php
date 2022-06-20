<?php
session_start();
include('database/connexion.php');

if($conn)
{
    // echo "Database Connected";
}
else
{
    header("Location: database/connexion.php");
}
?>