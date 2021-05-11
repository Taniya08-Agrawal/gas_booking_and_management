<?php
      define('DB_SERVER', 'localhost');
      define('DB_USERNAME', 'root');
      define('DB_PASSWORD', '');
      define('DB_DATABASE', 'gas_booking_system');
      $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
      if($_SERVER["REQUEST_METHOD"] == "POST") {
         $em=$_POST['em'];
          $Name = mysqli_real_escape_string($db,$_POST['name']);
          $Phone_No = mysqli_real_escape_string($db,$_POST['mob']);
          $Address = mysqli_real_escape_string($db,$_POST['address']);
          $District = mysqli_real_escape_string($db,$_POST['district']);
          $Aadhar_No = mysqli_real_escape_string($db,$_POST['aadhar']);
          $Email = mysqli_real_escape_string($db,$_POST['email']);
          $Password = mysqli_real_escape_string($db,$_POST['psw']); 
          $Connection_type = mysqli_real_escape_string($db,$_POST['connection']);

          //$sql="insert into Customer(C_id,Name,Phone_No,Address,District,Aadhar_No,Email,Password,Connection_type)"." values('$C_id','$Name','$Phone_No','$Address','$District','$Aadhar_No','$Email','$Password','$Connection_type') ";
          $sql="INSERT INTO customer(Name,Phone_No,Address,District,Aadhar_No,Email,Password,Connection_type) values('$Name','$Phone_No','$Address','$District','$Aadhar_No','$Email','$Password','$Connection_type')";
          $run=mysqli_query($db, $sql);       
          if($run){
            $msg="Registration succesfully!";
           header('location:message1.php?email=' . $em . '&msg=' . $msg);
            //header("location: welcome.php");
          }
          else{
            $msg="Registration not succesfully!";
            header('location:message1.php?email=' . $em . '&msg=' . $msg);
                }
          
        }
    ?>