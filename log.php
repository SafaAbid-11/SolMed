<?php
require 'connect_db.php';
session_start();
if(isset($_POST['login']))
 {
    
     //Process for Login
     //1. Get the Data from Login form
     $email = $_POST['doctor_email'];
     $pwd = $_POST['doctor_password'];

    // $email = mysqli_real_escape_string($conn, $_POST['admin_email_address']);
     
     //$raw_password = md5($_POST['admin_password']);
     //echo $_POST['admin_password'];
     //$password = mysqli_real_escape_string($conn, $raw_password);

     //2. SQL to check whether the user with username and password exists or not
     $sql = "SELECT * FROM doctor_table WHERE doctor_email_address='$email' AND doctor_password='$pwd'";
     
     //localStorage. setItem('gg', '9');
     //3. Execute the Query
     $res = mysqli_query($conn, $sql);
    //  $res1 =  mysqli_query($conn, $sql1);
     $row= mysqli_fetch_array($res);
     //4. COunt rows to check whether the user exists or not
     $count = mysqli_num_rows($res);
      
     if($count==1)
     {
         

         if($row)
         {
               //User AVailable and Login Success
           $_SESSION["docemail"]= $_POST["doctor_email"];
         $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
         // $_SESSION['user'] = $email; //TO check whether the user is logged in or not and logout will unset it
          $_SESSION["doctor_id"] = $row[1]; 
          
         // localStorage. setItem('gg', '10');

          //REdirect to HOme Page/Dashboard
          //header('location:'.SITE_URL.'dashboard.php');
          //header("refresh:1;url=dashboard.php");
          echo "<script type='text/javascript'>window.top.location='http://localhost/SolMed/doctor.php';</script>"; exit;
         
         }
         
     }
     else
     {
         //User not Available and Login FAil
         echo "<script>alert('Invalid email or Password!');</script>"; 
         $_SESSION['login'] = "<div >Email or Password did not match.</div>";
         //REdirect to HOme Page/Dashboard
        // header('location:'.SITE_URL.'login_admin.php');

         echo "<script type='text/javascript'>window.top.location='http://localhost/SolMed/doctor_login.php';</script>"; exit;
     }

     if($_POST["remember_me"]=='1' || $_POST["remember_me"]=='on')
     {
     $hour = time() + 3600 * 24 * 30;
     setcookie('email', $email, $hour);
          setcookie('password', $pwd, $hour);
           
        
     }
 }
 ?>