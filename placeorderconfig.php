<?php
	define('DB_SERVER', 'localhost');
   	define('DB_USERNAME', 'root');
   	define('DB_PASSWORD', '');
   	define('DB_DATABASE', 'gas_booking_system');
   	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$i= $_POST['id'];
		$amt= $_POST['amount'];
		$dis= $_POST['district'];
		$payment = mysqli_real_escape_string($db,$_POST['payment']);

    	$order_dt= @date('y-m-d');
		$expected_delivery_date=@date('y-m-d');;
		@date_add($expected_delivery_date, date_interval_create_from_date_string("3 days"));
		$exp_dt=@date_format($expected_delivery_date, 'y-m-d');

		$sql = "SELECT * FROM cylinder_billing WHERE C_id='$i' and Dispatched_status='N'";
		$c=mysqli_query($db, $sql);
		$count1=mysqli_fetch_array($c);
		//$count1 = mysqli_num_rows($res);

		//check for pending orders
		if($count1){
    		$msg="You already have a pending order";
            header('location:message.php?id=' . $i . '&msg=' . $msg);
    	}
    	else{
			$qry = "SELECT Stock FROM supplier WHERE District='$dis'";
    		$a=mysqli_query($db, $qry);
	    	$res= mysqli_fetch_assoc($a);
    		$stock=$res["Stock"];
    		//check for Stocks
    		if((int)$stock>0){
    			$sql="INSERT INTO cylinder_billing(C_id, Order_Date, Expected_delivery_date, Payment_mode, Amount) values('$i', '$order_dt', '$exp_dt', '$payment', '$amt')";
		    	$run=mysqli_query($db, $sql); 
		    	$sql1="UPDATE supplier SET Stock = Stock-1 WHERE District='$dis'"; 
		    	$run1=mysqli_query($db, $sql1);  
		    	if($payment=='Cash'){
		    		if($run and $run1){
    	 				$msg="Order placed successfully";
                        header('location:message.php?id=' . $i . '&msg=' . $msg);
    				}
	    			else{
    	 				$msg="Order booking failed";
                        header('location:message.php?id=' . $i . '&msg=' . $msg);
    				}
		    	}
		    	else{
		    		header('location:payment.php');
		    	}	
    		}
    		else{
    			$msg= "Insufficient Stock. Cannot place order. Try again in some time";
                header('location:message.php?id=' . $i . '&msg=' . $msg);
    		}
    	}
    }
?>