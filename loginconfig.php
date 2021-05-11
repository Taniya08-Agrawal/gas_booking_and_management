<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'gas_booking_system');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $username = mysqli_real_escape_string($db,$_POST['uname']);
      $password = mysqli_real_escape_string($db,$_POST['psw']);
      $table= mysqli_real_escape_string($db,$_POST['table']); 
      
      $sql = "SELECT * FROM $table WHERE Email = '$username' and password = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $count = mysqli_num_rows($result);
      
      // If result matched $username and $password, table row must be 1 row
      if($count == 1) {  
         if($table=='admin'){
            $qry="SELECT Email FROM admin WHERE Email='$username' and Password='$password'";
            $Email1=mysqli_query($db,$qry);
            $res=mysqli_fetch_assoc($Email1);
            $email=$res["Email"];
            header('location: Admin_dashboard.php?email='.$email);   
         } 
         elseif ($table=='supplier') {
            $qry = "SELECT E_id FROM supplier WHERE Email = '$username' and password = '$password'";
            $e_id=mysqli_query($db, $qry);
            $res= mysqli_fetch_assoc($e_id);
            $id=$res["E_id"]; 
            header('location: Supplier_dashboard.php?id='.$id);   
         }
         else{
            $qry = "SELECT C_id FROM $table WHERE Email = '$username' and password = '$password'";
            $c_id=mysqli_query($db, $qry);
            $res= mysqli_fetch_assoc($c_id);
            $id=$res["C_id"]; 
            header('location: Customer_dashboard.php?id='.$id);
  
         }
      }else {
         if($table=='admin'){
            header('location: Adminlogin.php?error=Invalid username or password');   
         } 
         elseif ($table=='supplier') {
            header('location: supplierlogin.php?error=Invalid username or password');   
         }
         else{
            header('location: userlogin.php?error=Invalid username or password');   
         }
      }
   }
?>