<?php
  $id=$_GET['id'];
  define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'gas_booking_system');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
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

.main__container {
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
    <title>Deliver Cylinder</title>
  </head>
  <body id="body">
    <div class="container">
      <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          <a class="active_link" href="#">Supplier</a>
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
          <h1 align="center" style="font-size:35px; font-family: cursive; color:rgb(255, 134, 134); padding-bottom:50px;">Deliver Cylinder</h1>
          <!-- MAIN TITLE STARTS HERE -->
<?php
          if ($_SERVER['REQUEST_METHOD']=="POST") {
            if (isset($_POST['deliver'])) {
              $B_id=$_POST['B_id'];
              $sql="UPDATE cylinder_billing SET dispatched_status='Y' WHERE B_id='$B_id'";
              $run=mysqli_query($db, $sql);
                if($run){
                  $msg= "Cylinder delivered!!";
                  header('location:message2.php?id=' . $id . '&msg=' . $msg);
                }
                else{
                  $msg= "Cannot update record!!";
                  header('location:message2.php?id=' . $id . '&msg=' . $msg);                 
                }
              }
            }
?>
          <table>
            <tr>
              <td  style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 30px 15px 30px;">Booking ID</td>
              <td  style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 30px 15px 30px;">Customer ID</td>
              <td  style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 30px 15px 30px;">Order Date</td>
              <td></td>
            </tr>
<?php
            $sql="SELECT * FROM supplier WHERE E_id='$id'";
            $run=mysqli_query($db, $sql);
            $arr=mysqli_fetch_array($run);
            $dis=$arr['District'];

            $sql1="SELECT * FROM cylinder_billing natural join customer WHERE District='$dis' and dispatched_status='N'";
            $run1=mysqli_query($db, $sql1);
            $arr1=mysqli_fetch_array($run1);
            if($run1){
              if($arr1){
                while($arr1){
?>
                <tr>
                  <form action="" method="POST">
                    <input type="hidden" value="<?php echo $arr1['B_id'];?>" name="B_id">
                    <td style="padding:15px 15px 15px 15px; color: black;"><?php echo $arr1['B_id'];?></td>
                    <td style="padding:15px 15px 15px 15px; color: black;"><?php echo $arr1['C_id'];?></td>
                    <td style="padding:15px 15px 15px 15px; color: black;"><?php echo $arr1['Order_date'];?></td>
                    <td><div class="submit">
                    <button type="submit" onclick="typeWriter()" class="submitbtn" name="deliver">Deliver</button>
                    <p id="demo"></p>
                    </div></td>
                  </form>
                </tr>
<?php
                  $arr1=mysqli_fetch_array($run1);
                }
                $count=mysqli_num_rows($run1);
?>
                <p>
                  <?php echo $count." records found!!"; ?>
                </p>
<?php
              }
              else{
                $msg= "No pending cylinders!!";
                header('location:message2.php?id=' . $id . '&msg=' . $msg);
              }
            }
            else{
              $msg= "Cannot fetch results. Please try again later!!";
              header('location:message2.php?id=' . $id . '&msg=' . $msg);
            }

?>
          </table>
          <br>
          <!-- MAIN SECTION ENDS HERE -->
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
            <a href="Supplier_dashboard.php?id=<?php echo $id; ?>">Dashboard</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-cubes"></i>
            <a href="stock_availability.php?id=<?php echo $id; ?>">Stock Availability</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-comments"></i>
            <a href="review_customer.php?id=<?php echo $id ;?>">Review Customer</a>
          </div>
          <div class="sidebar__link active_menu_link">
            <i class="fa fa-truck"></i>
            <a href="deliver_cylinder.php?id=<?php echo $id; ?>">Deliver Cylinder</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-user-circle"></i>
            <a href="supplier_account.php?id=<?php echo $id ;?>">My Account</a>
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
