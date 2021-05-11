<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'gas_booking_system');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   $i=$_GET['id'];
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
      td{
  padding: 15px;
  text-align: left;
  border: 1px solid #004d00;
  padding: 8px;
}
table {
  border-collapse: collapse;
  padding-top :50px;
}

tr {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #e7e7e7;
  color: white;
  
}
tr:hover {background-color: #f5f5f5;}

.container3 {
  border-radius: 5px;
  background-color:  #c2f0c2;
  padding:  50px 220px 220px 250px;
}
.submitbtn{
  
  align-items: center;
  padding: 15px 25px;
  font-size: 15px;
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
      </style>
    <title>CANCEL ORDER</title>
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
      <!-- MAIN SECTION STARTS HERE -->
      <main>
        
          <div class='container3' >
            <form action="cancelorderconfig.php" method='POST'>
              <h1 align="center" style="font-size:35px; font-family: cursive; color:#ff3333; padding-bottom:50px;">Cancel Order</h1>
          <form action="cancelorderconfig.php" method="POST">
    <table align="center">
      <?php 
        $sql = "SELECT * FROM cylinder_billing WHERE C_id='$i' and Dispatched_status='N'";
        $c=mysqli_query($db, $sql);
        $count=mysqli_fetch_array($c);
        if($count){
          ?>
            <tr >
              <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 30px 15px 30px;">B_ID</td>
              <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 30px 15px 30px;">Order Date</td>
              <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 30px 15px 30px;">Amount</td>
            </tr>
          <?php
          while($count){
            ?>
              <tr>
                <td style=" padding:15px 50px 15px 50px; color: black;"><?php echo $count['B_id'] ?></td>
                <td style=" padding:15px 50px 15px 50px; color: black;"><?php echo $count['Order_date'] ?></td>
                <td style=" padding:15px 50px 15px 50px; color: black;"><?php echo $count['Amount'] ?></td>
              </tr>
            <?php
            $count=mysqli_fetch_array($c);
          }
        }
        else{
          $msg="You do not have any order";
          header('location:message.php?id=' . $i . '&msg=' . $msg);
        }
      ?>
    </table>
      <br>
      <input type="hidden" name="id" value="<?php echo $i; ?>">
      <div class="submit">
        <button type="submit" onclick="typeWriter()" class="submitbtn">Cancel Now</button>
        <p id="demo"></p>
        </div>
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
          <div class="sidebar__link">
              <i class="fa fa-cubes"></i>
              <a href="booking_order.php?id=<?php echo $i; ?>">Order Cylinder</a>
          </div>
          <div class="sidebar__link active_menu_link">
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