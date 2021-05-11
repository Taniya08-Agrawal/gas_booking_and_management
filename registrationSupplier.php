<?php
      define('DB_SERVER', 'localhost');
      define('DB_USERNAME', 'root');
      define('DB_PASSWORD', '');
      define('DB_DATABASE', 'gas_booking_system');
      $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
      if($_SERVER["REQUEST_METHOD"] == "POST") {
        $em=$_POST['em'];
          $Name = mysqli_real_escape_string($db,$_POST['name']);
          $Email = mysqli_real_escape_string($db,$_POST['email']);
          $Password = mysqli_real_escape_string($db,$_POST['psw']);
          $District = mysqli_real_escape_string($db,$_POST['district']);
          $Stock = mysqli_real_escape_string($db,$_POST['stock']);
          $Rate_of_cylinder = mysqli_real_escape_string($db,$_POST['rate_of_cylinder']);
          
          $sql="INSERT INTO supplier(Name,District,Email,Password,Stock,Rate_of_cylinder) values('$Name','$District','$Email','$Password','$Stock','$Rate_of_cylinder')";
          $run=mysqli_query($db, $sql);       
          if($run){
           $msg="Registration succesfully!";
           header('location:message1.php?email=' . $em . '&msg=' . $msg);
          }
          else{
            $msg="Registration not done!";
            header('location:message1.php?email=' . $em . '&msg=' . $msg);          }
        }
    ?>