<?php
  DEFINE('DB_SERVER','localhost');
  DEFINE('DB_USERNAME','root');
  DEFINE('DB_PASSWORD','');
  DEFINE('DB_DATABASE','gas_booking_system');
  $db=mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
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
    <link rel="stylesheet" href="styles.css" />
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

.main__container{
  border-radius: 5px;
  background-color:  #c2f0c2;
  padding:  50px 220px 220px 30px;
}
.submitbtn{
  
  align-items: center;
  padding: 10px 15px;
  font-size: 18px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px;
 /*box-shadow: 0 9px #999;*/

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
    <title>Review Customer</title>
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
           <?php
          if($_SERVER["REQUEST_METHOD"]=="POST"){
              if(isset($_POST['delete'])==true){
                $q=$_POST['Cid'];
                $sql="DELETE  FROM customer WHERE C_id='$q'";
                $c=mysqli_query($db,$sql);
              }
          }
        ?>
        <h1 align="center" style="font-size:35px; font-family: cursive; color:#ff3333; padding-bottom:50px;">Reveiw Customer</h1>
        <table>
          <tr>
            <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 30px 15px 30px;">C_id</td>
            <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 30px 15px 30px;">Name</td>
            <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 30px 15px 30px;">Phone_No</td>
            <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 30px 15px 30px;">Address</td>
            <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 30px 15px 30px;">District</td>
            <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 30px 15px 30px;">Aadhar_No</td>
            <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 30px 15px 30px;">Email</td>
            <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 30px 15px 30px;">Password</td>
            <td></td>

          </tr>
<?php
          $sql= "SELECT * FROM customer WHERE customer.District IN (SELECT District FROM Supplier WHERE E_id='$i')";
          $c=mysqli_query($db,$sql);
          $count=mysqli_fetch_array($c);
          if($count){
?>
<?php
          while($count){
?>
      <tr>
          <form method="POST" action="">
            <td style=" padding:15px 50px 15px 50px; color: black;"><?php echo $count['C_id'] ?></td>
            <td style=" padding:15px 50px 15px 50px; color: black;"><?php echo $count['Name'] ?></td>
            <td style=" padding:15px 50px 15px 50px; color: black;"><?php echo $count['Phone_No'] ?></td>
            <td style=" padding:15px 50px 15px 50px; color: black;"><?php echo $count['Address'] ?></td>
            <td style=" padding:15px 50px 15px 50px; color: black;"><?php echo $count['District'] ?></td>
            <td style=" padding:15px 50px 15px 50px; color: black;"><?php echo $count['Aadhar_No'] ?></td>
            <td style=" padding:15px 50px 15px 50px; color: black;"><?php echo $count['Email'] ?></td>
            <td style=" padding:15px 50px 15px 50px; color: black;"><?php echo $count['Password'] ?></td>
             <input type="hidden" name="Cid" value="<?php echo $count['C_id'];?>">
            <td> <button type="submit" onclick="typeWriter()" class="submitbtn" name="delete">Delete Now</button></td>
            
           </form>
          </tr>
          <?php
          $count=mysqli_fetch_array($c);
          }
        }
        ?>
        </table>

        
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
            <a href="Supplier_dashboard.php?id=<?php echo $i;?>">Dashboard</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-cubes"></i>
            <a href="stock_availability.php?id=<?php echo $i; ?>">Stock Availability</a>
          </div>
          <div class="sidebar__link  active_menu_link">
            <i class="fa fa-comments"></i>
            <a href="review_customer.php?id=<?php echo $i ;?>">Review Customer</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-truck"></i>
            <a href="deliver_cylinder.php?id=<?php echo $i; ?>">Deliver Cylinder</a>    
          </div> 
          <div class="sidebar__link">
            <i class="fa fa-user-circle"></i>
            <a href="supplier_account.php?id=<?php echo $i ;?>">My Account</a>
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