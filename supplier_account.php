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
    <title>Supplier Account</title>
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
            if($_SERVER["REQUEST_METHOD"] == "POST") {    
              if (isset($_POST["save"])) {
                $i=$_POST['id'];
                $name=$_POST['s_name'];
                $email=$_POST['email'];
                $psw=$_POST['psw'];
                $stock=$_POST['stock'];
                $dist=$_POST['district'];
                $roc=$_POST['rate_of_cylinder'];
                $sql="UPDATE supplier SET Name='$name', District='$dist', Email='$email', Password='$psw' ,Stock='$stock', Rate_of_cylinder='$roc' WHERE E_id='$i'";
                $run=mysqli_query($db, $sql);
                if ($run) {
                  $msg="Details updated succesfully!";
                  header('location:message2.php?id=' . $i . '&msg=' . $msg);
                }
                else{
                  $msg="Couldn't update details. Please try again later!";
                  header('location:message2.php?id=' . $i . '&msg=' . $msg);
                }
              }
            }
          ?> 
          <h1 align="center" style="font-size:35px; font-family: cursive; color:#ff3333;">Supplier Account</h1>
          <!-- MAIN TITLE STARTS HERE -->
        <form action="" method="POST">
<?php 
                  $sql = "SELECT * FROM supplier WHERE E_id='$id'";
                  $c=mysqli_query($db, $sql);
                  $arr=mysqli_fetch_array($c);
                  if($arr){
?>
           <label for="s_name">
              <b style="font-size: 20px;  font-family: cursive; color:#004d00;">Name</b>
                  <input type="text"  name="s_name" value="<?php echo $arr['Name'] ?>" required>
                </label>
                <label for="email">
                  <b style="font-size: 20px;  font-family: cursive; color:#004d00;">Email</b>
                  <input type="email" name="email" value="<?php echo $arr['Email'] ?>" required>
                </label>
                <label for="psw">
                  <b style="font-size: 20px;  font-family: cursive; color:#004d00;">Password</b>
                  <input type="password" name="psw" value="<?php echo $arr['Password'] ?>" pattern=".{5, 20}" required title="Password should be of length 5 to 10" required>
                </label>
                <label for="district">
                  <b style="font-size: 20px;  font-family: cursive; color:#004d00;">District</b>
                  <input type="text" name="district" value="<?php echo $arr['District'] ?>" required>
                </label>
                <label for="stock">
                  <b style="font-size: 20px;  font-family: cursive; color:#004d00;">Stock</b>
                  <input type="tel"  name="stock" value="<?php echo $arr['Stock'] ?>" required>
                </label>
                <label for="rate_of_cylinder">
                  <b style="font-size: 20px;  font-family: cursive; color:#004d00;">Rate of cylinder</b>
                  <input type="tel" name="rate_of_cylinder" value="<?php echo $arr['Rate_of_cylinder'] ?>" required>
                </label>
              <?php
          }
          else{
            $msg="Cannot fetch your details currently. Please try again later!";
                header('location:message2.php?id=' . $i . '&msg=' . $msg);
          }
        ?>
        <input type="hidden" name="id" value="<?php echo $id;?>">
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
            <a href="Supplier_dashboard.php">Dashboard</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-cubes"></i>
            <a href="stock_availability.php?id=<?php echo $id; ?>">Stock Availability</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-comments"></i>
            <a href="reveiw_customer.php?id=<?php echo $id ;?>">Review Customer</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-truck"></i>
            <a href="deliver_cylinder.php?id=<?php echo $id; ?>">Deliver Cylinder</a>
          </div> 
          <div class="sidebar__link  active_menu_link">
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
