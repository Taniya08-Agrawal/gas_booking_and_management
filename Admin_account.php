<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'gas_booking_system');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
    
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
    <style type="text/css">
        .main__container {
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
    <title>Admin account</title>
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
          if($_SERVER['REQUEST_METHOD']=="POST"){
            if(isset($_POST['save'])){
                $email=$_POST['email'];
                $psw=$_POST['psw'];
                $sql="UPDATE admin SET  Password='$psw' WHERE Email='$email'";
                $run=mysqli_query($db, $sql);
                if ($run) {
                  $msg="Details updated succesfully!";
                  @header('location:message1.php?email=' . $email . '&msg=' . $msg);
                }
                else{
                  $msg="Couldn't update details. Please try again later!";
                  header('location:message1.php?email=' . $email . '&msg=' . $msg);
                }
            }
          }
        ?>
          <h1 align="center" style="font-size:35px; font-family: cursive; color:#ff3333;">My Account</h1>
          <!-- MAIN TITLE STARTS HERE -->
          <form method="POST" action="">
            <?php
              $sql="SELECT * FROM admin WHERE Email='$email'";
              $c=mysqli_query($db,$sql);
              $arr=mysqli_fetch_array($c);
              if($arr){
            ?>
          <label for="email">
          <b style="font-size: 20px;  font-family: cursive; color:#004d00;">Email</b>
          <input type="email" value="<?php echo $arr['Email'] ?>" name="email" required>
          </label>
          <!--<?php //echo $arr['Email'];?>-->
        </label>
        <label for="password">
          <b style="font-size: 20px;  font-family: cursive; color:#004d00;">Password</b>
          <input type="text" name="psw" value="<?php echo $arr['Password'] ?>" pattern=".{5, 10}" required title="Password should be of length 5 to 10" required>
        </label>
        <?php
          }
          else{
            echo "Try again";
          }
        ?>
        <input type="hidden" name="email" value="<?php echo $email ;?>"/>
        <button type="submit" name="save"  onclick="typeWriter()" class="submitbtn">Save Changes</button>
        <p id="demo"></p>
        </form>
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
            <a href="admin_dashboard.php?email=<?php echo $email ;?>">Dashboard</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-truck"></i>
            <a href="new_customer.php?email=<?php echo $email ;?>">Add New Customer</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-truck"></i>
            <a href="new_supplier.php?email=<?php echo $email ;?>">Add New Supplier</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-comments"></i>
           <a href="review_feedback.php?email=<?php echo $email ;?>">Review Feedback</a>
          </div>
          <div class="sidebar__link active_menu_link">
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
