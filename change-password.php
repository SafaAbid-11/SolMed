<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Change Password</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Change your password</h1>
                                    </div>
                                    <br>
                                    <form class="user" action="" method="POST">
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="New Password..." name="pwd">
<br>
                                                <input type="password" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Confirm Password..." name="pwd1">

                                        </div>
                                        <hr>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" id="buttn" name="reset" value="Resset Password" />
                                    </form>
                                    
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
    $error = null;
    $success = null;
    if(isset($_GET['patient_id'])){
        $patient_id=$_GET['patient_id'];
        include('database/connexion.php');
        if(isset($_POST['reset'])){
            $password=$_POST['pwd'];
            $password1=$_POST['pwd1'];
            if($password !== $password1){
                $error=" incorrect password!";
                echo $error;
            }
            else{
                $password=$password;
                //$password=md5($password);
                $query2="UPDATE patient_table SET patient_password='$password' WHERE patient_id='$patient_id'";
                $result2 = mysqli_query($conn, $query2); 
                if($result2){
                    $success = "Password modified successfuly!";
                }
                else{
                    $error = " Password modification Error  !";
                }
            }
        }
    }
?>