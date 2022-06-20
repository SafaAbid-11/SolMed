<?php
// require './database/connexion.php';
require 'connect_db.php';
error_reporting(0);
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Patient - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<?php
/*
if(isset($_POST['register']))
{
    $firstname= $_POST['fname'];
    $lastname= $_POST['lname'];
    $email = $_POST['email'];
    $pwd = $_POST['password'];
    $repwd = $_POST['repassword'];

    $email_query = "SELECT * FROM adherent WHERE email='$email' ";
    $email_query_run = mysqli_query($conn, $email_query);
    if(mysqli_num_rows($email_query_run) > 0)
    {
        $_SESSION['status'] = "<div>Email Already Taken. Please Try Another one.</div>";
        echo "bhn";
        $_SESSION['status_code'] = "error";
        header('Location: register.php');  
    }
    else
    {
        if($pwd === $repwd)
        {
            $query = "INSERT INTO adherent (nom,prénom,email,pwd) VALUES ('$firstname,'$lastname','$email','$pwd')";
            $query_run = mysqli_query($conn, $query);
            
            if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Admin Profile Added";
                $_SESSION['status_code'] = "success";
                header('Location: login.php');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: register.php');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Password and Confirm Password Does Not Match";
            $_SESSION['status_code'] = "warning";
            header('Location: register.php');  
        }
    }

}
*/
?>
<?php
if(isset($_POST['register'] )) 
{
    
     if ((empty($_POST['fname']) || 
   	    empty($_POST['lname'])|| 
        empty($_POST['email']) ||
        empty($_POST['age'])||
        empty($_POST['contact']) ||   
        empty($_POST['address']) ||
		empty($_POST['password'])||
		empty($_POST['repassword'])))
	{
    $message = "All fields must be Required!";
    echo "<script>alert('All fields must be required');</script>";
  }
		
		
	else
	{
	
	$check_username= mysqli_query($conn, "SELECT patient_first_name FROM patient_table where patient_first_name = '".$_POST['fname']."' ");
	$check_email = mysqli_query($conn, "SELECT patient_email_address FROM patient_table where patient_email_address = '".$_POST['email']."' ");
		

	
	if($_POST['password'] != $_POST['repassword']){  
       	
          echo "<script>alert('Passwords did not match');</script>"; 
    }
	elseif(strlen($_POST['password']) < 8)  
	{
      echo "<script>alert('Password Must be >=8');</script>"; 
	}

    elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) 
    {
          echo "<script>alert('Invalid email, please type a valid email!');</script>"; 
    }
	elseif(mysqli_num_rows($check_username) > 0) 
     {
       echo "<script>alert('Username Already exists!');</script>"; 
     }
	elseif(mysqli_num_rows($check_email) > 0) 
     {
       echo "<script>alert('Email Already exists!');</script>"; 
     }
	else{
        
	$mql = "insert into patient_table(patient_email_address,patient_password,patient_first_name,patient_last_name,patient_age,patient_phone_no,patient_address) VALUES('".$_POST['email']."','".$_POST['password']."','".$_POST['fname']."','".$_POST['lname']."','".$_POST['age']."','".$_POST['contact']."','".$_POST['address']."')";
	mysqli_query($conn, $mql);
	echo "<script type='text/javascript'>window.top.location='http://localhost/SolMed/login.php';</script>"; exit;
		 //header("refresh:0.1;url=login.php");
    }
	}

}
?>
<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" action="" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="First Name" name="fname">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name" name="lname">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Age" name="age">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="contact" name="contact">
                                    </div>
                                    </div>
                                    <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="address" name="address">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address" name="email">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name="password">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password" name="repassword">
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary btn-user btn-block" id="buttn" name="register" value="Register" />
                               
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.php">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>