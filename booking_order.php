<?php
    $i=$_GET['id']; 
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'gas_booking_system');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   $qry = "SELECT * FROM customer WHERE C_id='$i'";
      $run=mysqli_query($db, $qry);
      $res= mysqli_fetch_assoc($run);
      $name=$res["Name"];
      $phn=$res["Phone_No"];
      $addr=$res["Address"];
      $c_district=$res["District"];

      $qry = "SELECT * FROM supplier WHERE District='$c_district'";
      $a=mysqli_query($db, $qry);
      $res= mysqli_fetch_assoc($a);
      $stock=$res["Stock"];
      $amount=$res["Rate_of_cylinder"];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="nstyles.css" />
    <style>
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
    <title>BOOK ORDER</title>
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
            <!-- <i class="fa fa-user-circle-o" aria-hidden="true"></i> -->
          </a>
        </div>
      </nav>

      <main>
        <div class="main__container">
          <!-- MAIN SECTION STARTS HERE -->
          <div class="container3">
            
           
          <form action="placeorderconfig.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $i; ?>"/>
    <input type="hidden" name="amount" value="<?php echo $amount; ?>"/>
    <input type="hidden" name="district" value="<?php echo $c_district; ?>"/>
    <table>
      <tr>
        <td><h1 align="center" style="font-size:35px; font-family: cursive; color:rgb(255, 134, 134);">Billing Details</h1></td>
      </tr>
      <tr>
        <td style="font-size: 20px;  font-family: cursive; color:#004d00;">Name:</td>
        <td><?php echo $name; ?></td>
      </tr>
      <tr>
        <td style="font-size: 20px;  font-family: cursive; color:#004d00;">Phone No.:</td>
        <td><?php echo $phn; ?></td>
      </tr>
      <tr>
        <td style="font-size: 20px;  font-family: cursive; color:#004d00;">Address:</td>
        <td><?php echo $addr . ", " . $c_district; ?></td>
      </tr>
      <tr>
        <td style="font-size: 20px;  font-family: cursive; color:#004d00;">Amount to be paid:</td>
        <td><?php echo $amount; ?></td>
      </tr>
    </table>
    <label for="connection">
          <b>Choose your Payment Mode</b>
          <select name="payment">
              <option value="Cash">Cash</option>
              <option value="Creditcard">Credit Card</option>
              <option value="Debitcard">Debit Card</option>
              <option value="Netbanking">Netbanking</option>
          </select>
      </label>
      <br>
      <br>
      <div class="submit">
        <button type="submit" onclick="typeWriter()" class="submitbtn">Book Now</button>
        <p id="demo"></p>
        </div>
      </form>
      </main>
      <!-- Main section ends -->
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
            <a href="Customer_dashboard.php?id=<?php echo $i; ?>">Dashboard</a>
          </div>
          <div class="sidebar__link active_menu_link">
              <i class="fa fa-cubes"></i>
              <a href="booking_order.php?id=<?php echo $i; ?>">Order Cylinder</a>
          </div>
          <div class="sidebar__link">
              <i class="fa fa-times-circle"></i>
              <a href="cancel_order.php?id=<?php echo $i; ?>">Cancel Cylinder</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-history"></i>
            <a href="review_order.php?id=<?php echo $i; ?>">Order History</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-comments"></i>
            <a href="Feedback.php?id=<?php echo $i; ?>">Post Feedback</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-user-circle"></i>
            <a href="Customer_account.php?id=<?php echo $i; ?>">My Account</a>
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
