<?php
	define('DB_SERVER', 'localhost');
   	define('DB_USERNAME', 'root');
   	define('DB_PASSWORD', '');
   	define('DB_DATABASE', 'gas_booking_system');
   	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$i= $_POST['id'];
		$sql = "SELECT * FROM cylinder_billing WHERE C_id='$i' and Dispatched_status='N'";
          $c=mysqli_query($db, $sql);
          $count=mysqli_fetch_array($c);
          $b_id=$count['B_id'];
          $amt=$count['Amount'];
          $mode=$count['Payment_mode'];
          $dis=$count['District'];

          $sql = "DELETE FROM cylinder_billing WHERE C_id='$i' and Dispatched_status='N'";
          $run=mysqli_query($db, $sql);
          if($mode=='Cash'){
            $sql1 = "INSERT INTO cancel_cylinder(B_id, C_id, Refund, Refund_Status) VALUES ('$b_id', '$i', '$amt', 'Not Applicable')";
            $run1=mysqli_query($db, $sql1);
            $sql2 = "UPDATE supplier SET Stock=Stock+1 where District='$dis'";
            $run2=mysqli_query($db, $sql2);
            if($run and $run1){
              //header
              $msg= "Order cancelled successfully!";
              header('location:message.php?id=' . $i . '&msg=' . $msg);
            }
            else{
              //header
              $msg= "Could not cancel order. Please try later!!";
              header('location:message.php?id=' . $i . '&msg=' . $msg);
            }
          }
          else{
            $sql1 = "INSERT INTO cancel_cylinder(B_id, C_id, Refund) VALUES ('$b_id', '$i', $amt)";
            $run1=mysqli_query($db, $sql1);
            $sql2 = "UPDATE supplier SET Stock=Stock+1 where District='$dis'";
            $run2=mysqli_query($db, $sql2);
            if($run and $run1){
              //header
              $msg= "Order cancelled successfully!";
              header('location:message.php?id=' . $i . '&msg=' . $msg);
            }
            else{
              //header
              $msg= "Could not cancel order. Please try later!!";
              header('location:message.php?id=' . $i . '&msg=' . $msg);
            }
          }
        }
?>