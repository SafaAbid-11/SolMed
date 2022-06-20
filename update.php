<?php
   include_once 'connect_db.php';
   $success  = "";
 
   if(isset($_POST['submit']))
   {  
       
   $nom_med = $_POST['nom_med'];
   $doctor_name = $_POST['doctor_name'];
   $adresse_med = $_POST['adresse_med'];
   $specialite = $_POST['specialite'];
   $email_med = $_POST['email_med'];
   $pw_med = $_POST['pw_med'];
       
       $sql =  "insert into medecin(doctor_id, nom_med, doctor_name,specialite,adresse_med, doctor_email_address, pw_med) values( '$doctor_id', '$nom_med', '$doctor_name', '$adresse_med', '$specialite', '$doctor_email_address', '$pw_med')";
       $del = "delete from medecin where doctor_id='$doctor_id'";
       $edit = "UPDATE  medecin set nom_med='$nom_med' , doctor_name='$doctor_name', adresse_med='$adresse_med', specialite='$specialite' ,   doctor_email_address='$doctor_email_address' where doctor_id='$doctor_id' ";
       if (mysqli_query($conn, $edit))
       {
           $success    =   "New record created successfully !";
       }
       else
       {
       echo "Error: " . $sql . " " . mysqli_error($conn);
       }
       mysqli_close($conn);
   }
?>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
  <div class="modal-dialog">
   <div class="modal-content">
    <form>
     <div class="modal-header">      
      <h4 class="modal-title">Edit Employee</h4>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
     </div>
     <div class="modal-body">     
      <div class="form-group">
       <label>Name</label>
       <input type="text" class="form-control" required>
      </div>
      <div class="form-group">
       <label>Email</label>
       <input type="email" class="form-control" required>
      </div>
      <div class="form-group">
       <label>Address</label>
       <textarea class="form-control" required></textarea>
      </div>
      <div class="form-group">
       <label>Phone</label>
       <input type="text" class="form-control" required>
      </div>     
     </div>
     <div class="modal-footer">
      <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
      <input type="submit" class="btn btn-info" value="Save">
     </div>
    </form>
   </div>
  </div>
 </div>