<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'gas_booking_system');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   $id=$_GET['id']; 
?>
<!DOCTYPE html>
<html lang="en">
  	<head>
    	<meta charset="UTF-8" />
    	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
    	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"/>
      <link rel="stylesheet" href="nstyles.css" />
      <style type="text/css">
        .container3 {
    border-radius: 5px;
    background-color:  #c2f0c2;
    padding:  20px 220px 220px 220px;
  }
  .submitbtn{
  
  align-items: center;
  padding: 15px 25px;
  font-size: 24px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;

}
.submitbtn:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
.submitbtn:hover {
  opacity:1;
  background-color: #3e8e41
}
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background-color:  #f2f2f2;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #f2f2f2;
  outline: none;
}
input[type=tel], input[type=tel] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background-color:  #f2f2f2;
}

input[type=tel]:focus, input[type=tel]:focus {
  background-color: #f2f2f2;
  outline: none;
}
input[type=email], input[type=email] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background-color:  #f2f2f2;
}

input[type=email]:focus, input[type=email]:focus {
  background-color: #f2f2f2;
  outline: none;
}
.search_categories{
  font-size: 13px;
  padding: 10px 8px 10px 14px;
  background: #fff;
  border: 1px solid #f2f2f2;
  border-radius: 6px;
  position: relative;
}

input[type=text]{
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background-color: #f2f2f2;
}

input[type=text]:focus {
  background-color: #f2f2f2;
  outline: none;
}

    </style>
    	<title>MY ACCOUNT</title>
  	</head>
  	<body id="body">
    	<div class="container">
      		<nav class="navbar">
        		<div class="nav_icon" onclick="toggleSidebar()">
        			<i class="fa fa-bars" aria-hidden="true"></i>
        		</div>
        		<div class="navbar__left">
          			<a class="active_link" href="#">Customer</a>
        		</div>
        		<div class="navbar__right">
          			<a href="#">
            			<i class="fa fa-search" aria-hidden="true"></i>
          			</a>
          			<a href="#">
            			<i class="fa fa-clock-o" aria-hidden="true"></i>
          			</a>
          			<a href="#">
            			<img width="30" src="assets/avatar.svg" alt="" />
          			</a>
        		</div>
      		</nav>
		<main>
        	<div class="container3">
            <?php 
            if($_SERVER["REQUEST_METHOD"] == "POST") {    
              if (isset($_POST["save"])) {
                $i=$_POST['id'];
                $name=$_POST['c_name'];
                $mob=$_POST['mob'];
                $email=$_POST['email'];
                $aadhar=$_POST['aadhar'];
                $psw=$_POST['psw'];
                $addr=$_POST['address'];
                $dist=$_POST['district'];
                $sql="UPDATE customer SET Name='$name', Phone_No='$mob', Address='$addr', District='$dist', Aadhar_No='$aadhar', Email='$email', Password='$psw' WHERE C_id='$i'";
                $run=mysqli_query($db, $sql);
                if ($run) {
                  $msg="Details updated succesfully!";
                  header('location:message.php?id=' . $i . '&msg=' . $msg);
                }
                else{
                  $msg="Couldn't update details. Please try again later!";
                  header('location:message.php?id=' . $i . '&msg=' . $msg);
                }
              }
            }
          ?>
              <form action="" method='POST'>
                <h1 align="center" style="font-size:35px; font-family: cursive; color:rgb(255, 134, 134);">My Account</h1>
          		<!-- MAIN SECTION STARTS HERE -->
          		<form action="" method="POST">
            		<?php 
			            $sql = "SELECT * FROM customer WHERE C_id='$id'";
            			$c=mysqli_query($db, $sql);
            			$arr=mysqli_fetch_array($c);
            			if($arr){
            		?>
            <label for="name">
          <b style="font-size: 20px;  font-family: cursive; color:#004d00;">Name</b>
          <input type="text" name="c_name" value="<?php echo $arr['Name'] ?>" required>
        </label>
        <label for="mob">
          <b style="font-size: 20px; font-family: cursive; color:#004d00;">Mobile Number</b>
          <input type="tel" name="mob" value="<?php echo $arr['Phone_No'] ?>" pattern="[0-9]{10}" required title="Mobile no. should be of 10 digits" required>
        </label>
        <label for="aadhar">
          <b style="font-size: 20px; font-family: cursive; color:#004d00;">Aadhar Number</b>
          <input type="tel"pattern="[0-9]{12}" value="<?php echo $arr['Aadhar_No'] ?>" name="aadhar" required title="Aadhar no. should be of 12 digits" required>
        </label>
        <label for="email">
          <b style="font-size: 20px; font-family: cursive; color:#004d00;">Email</b>
          <input type="email" value="<?php echo $arr['Email'] ?>" name="email" required>
        </label>
        <label for="psw">
          <b style="font-size: 20px; font-family: cursive; color:#004d00;">Password</b>
          <input type="password" name="psw" value="<?php echo $arr['Password'] ?>" pattern=".{5, 10}" required title="Password should be of length 5 to 10" required>
        </label>
        <label for="address">
          <b style="font-size: 20px; font-family: cursive; color:#004d00;">Address</b>
          <input type="text" value="<?php echo $arr['Address'] ?>" name="address" required>
        </label>
        <label for="district">
          <b style="font-size: 20px; font-family: cursive; color:#004d00;">District</b>
          <input type="text" value="<?php echo $arr['District'] ?>" name="district" required>
        </label>
        <?php
        	}
        	else{
        		$msg="Cannot fetch your details currently. Please try again later!";
                header('location:message.php?id=' . $i . '&msg=' . $msg);
        	}
        ?>
        <input type="hidden" name="id" value="<?php echo $id;?>">
        <button type="submit" name="save" class="submitbtn">Save Changes</button>
        <p id="demo"></p>
          </form>
          <!-- Main section ends -->
        </div>
      </main>
      <div id="sidebar">
        <div class="sidebar__title">
          <div class="sidebar__img">
            <img src="assets/logo.png" alt="logo" />
            <h1>RAPID LPG</h1>
          </div>
          <i
            onclick="closeSidebar()"
            class="fa fa-times"
            id="sidebarIcon"
            aria-hidden="true"
          ></i>
        </div>

        <div class="sidebar__menu">
          <div class="sidebar__link">
            <i class="fa fa-chart-line"></i>
            <a href="Customer_dashboard.php?id=<?php echo $id; ?>">Dashboard</a>
          </div>
          <div class="sidebar__link">
              <i class="fa fa-cubes"></i>
              <a href="booking_order.php?id=<?php echo $id; ?>">Order Cylinder</a>
          </div>
          <div class="sidebar__link">
              <i class="fa fa-times-circle"></i>
              <a href="cancel_order.php?id=<?php echo $id; ?>">Cancel Cylinder</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-history"></i>
            <a href="review_order.php?id=<?php echo $id; ?>">Order History</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-comments"></i>
            <a href="Feedback.php?id=<?php echo $id; ?>">Post Feedback</a>
          </div>
          <div class="sidebar__link active_menu_link">
            <i class="fa fa-user-circle"></i>
            <a href="Customer_account.php?id=<?php echo $id; ?>">My Account</a>
        </div>       
          <div class="sidebar__logout">
            <i class="fa fa-power-off"></i>
            <a href="index.php">Log out</a>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="script.js"></script>
  </body>
</html>