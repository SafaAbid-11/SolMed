
<?php   

    $conn=mysqli_connect('localhost:3307','root', '','doctor_appointment');
    if($conn === false)
    {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
?>