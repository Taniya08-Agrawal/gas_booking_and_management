<?php
  define('DB_SERVER','localhost');
  define('DB_USERNAME','root');
  define('DB_PASSWORD','');
  DEFINE('DB_DATABASE','gas_booking_system');
  $db=mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
         $email=$_GET['email'];
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
  padding:  50px 220px 220px 250px;
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
    <title>Review Feedback</title>
  </head>
  <body id="body">
    <div class="container">
      <nav class="navbar">
        <div class="nav_icon" onclick="toggleSidebar()">
          <i class="fa fa-bars" aria-hidden="true"></i>
        </div>
        <div class="navbar__left">
          <a class="active_link" href="#">Admin</a>
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
                $q=$_POST['Fid'];
                $sql="DELETE from feedback where F_id='$q'";
                $c=mysqli_query($db,$sql);
              }
          }
        ?>
          <h1 align="center" style="font-size:35px; font-family: cursive; color:#ff3333; padding-bottom:50px;">Review Feedback</h1>
        <table>
          <tr>
          <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 30px 15px 30px;">F_id</td>
          <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 30px 15px 30px;">C_id</td>
          <td style="font-size: 20px; font-family: cursive; color:#004d00; padding:15px 30px 15px 30px;">Details</td>
          <td></td>
        </tr>
 <?php
          $sql= "SELECT * from feedback";
          $c=mysqli_query($db,$sql);
          $count=mysqli_fetch_array($c);
          if($count){
?>
<?php
        while($count){
?>
        <tr>
          <form method="POST" action="">
            <td style=" padding:15px 50px 15px 50px; color: black;"><?php echo $count['F_id'] ?></td>
            <td style=" padding:15px 50px 15px 50px; color: black;"><?php echo $count['C_id'] ?></td>
            <td style=" padding:15px 50px 15px 50px; color: black;"><?php echo $count['Details'] ?></td>
             <input type="hidden" name="Fid" value="<?php echo $count['F_id'];?>">
            <td> <button type="submit" onclick="typeWriter()" class="submitbtn" name="delete">Delete Now</button></td>
            

          </form>
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
            <a href="admin_dashboard.php?email=<?php echo $email;?>">Dashboard</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-truck"></i>
            <a href="new_supplier.php?email=<?php echo $email ;?>">Add New Supplier</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-truck"></i>
            <a href="new_customer.php?email=<?php echo $email ;?>">Add New customer</a>
          </div>
          <div class="sidebar__link active_menu_link">
            <i class="fa fa-comments"></i>
           <a href="review_feedback.php?email=<?php echo $email ;?>">Review Feedback</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-user-circle"></i>
            <a href="Admin_account.php?email=<?php echo $email ;?>">My Account</a>
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