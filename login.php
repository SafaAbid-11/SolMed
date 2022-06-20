<?php
//include('class/Appointment.php');
//$object = new Appointment;
//require 'connect_db.php';
require './database/connexion.php';
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

    <title>Patient- Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<body class="bg-gradient-primary">
<?php
          if(isset($_SESSION['login']))
                {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }

                if(isset($_SESSION['no-login-message']))
                {
                    echo $_SESSION['no-login-message'];
                    unset($_SESSION['no-login-message']);
                }
?>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">
        <?php
			if(isset($_SESSION["success_message"]))
			{
				echo $_SESSION["success_message"];
				unset($_SESSION["success_message"]);
			}
            ?>
            <span id="message"></span>
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Doctor Appointment Management System</h1>
                                </div>
                                <form class="user" action="" method="POST" id="login_form">
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user"
                                            id="exampleInputEmail" aria-describedby="emailHelp"
                                            placeholder="Enter Patient Email Address..." name="patient_email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Patient Password" name="patient_password">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck" name="remember_me">Remember
                                                Me</label>
                                        </div>
                                    </div>
                                    <input type="hidden" name="action" value="patient_login" />
                                    <input type="submit" class="btn btn-primary btn-user btn-block" id="buttn" name="login" value="Login" />
                                  
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.php">Forgot Password?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="register1.php">Create an Account!</a>
                                </div>
                            </div>
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
<?php
if(isset($_POST['login']))
 {
    
     $email = $_POST['patient_email'];
     $pwd = $_POST['patient_password'];
     $sql = "SELECT * FROM patient_table WHERE patient_email_address='$email' AND patient_password='$pwd'";
     $res = mysqli_query($conn, $sql);
     $row= mysqli_fetch_array($res);
     $count = mysqli_num_rows($res);

     if($count==1)
     {
         

         if($row)
         {
        $_SESSION["email"]= $_POST["patient_email"];
         $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
         // $_SESSION['user'] = $email; //TO check whether the user is logged in or not and logout will unset it
          $_SESSION["patient_id"] = $row[1]; 
          echo "<script type='text/javascript'>window.top.location='http://localhost//SolMed/patientDashboard.php';</script>"; exit;
          
         }
         
     }
     else
     {
         echo "<script>alert('Invalid email or Password!');</script>"; 
         $_SESSION['login'] = "<div >Email or Password did not match.</div>";
         echo "<script type='text/javascript'>window.top.location='http://localhost/SolMed/login.php';</script>"; exit;
     }

     if($_POST["remember_me"]=='1' || $_POST["remember_me"]=='on')
     {
     $hour = time() + 3600 * 24 * 30;
     setcookie('email', $email, $hour);
          setcookie('password', $pwd, $hour);
           
        
     }
 }
 ?>