<?php
            define('DB_SERVER', 'localhost');
            define('DB_USERNAME', 'root');
            define('DB_PASSWORD', '');
            define('DB_DATABASE', 'gas_booking_system');
            $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
            $i=$_GET['id']; 
            if($_SERVER["REQUEST_METHOD"] == "POST") {    
                if (isset($_POST["save"])) {
                  $fb=$_POST['feedback'];
                  $i=$_POST['id'];
                  $sql="INSERT INTO feedback(C_id, Details)VALUES('$i', '$fb')";
                  $run=mysqli_query($db, $sql);
                  if($run){
                    $msg="Your feedback has been succesfully recorded";
                    header('location:message.php?id=' . $i . '&msg=' . $msg);
                  }
                  else{
                    $msg="Your feedback cannot be posted. Please try again later!!";
                    header('location:message.php?id=' . $i . '&msg=' . $msg); 
                  }
                }
            }
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

    <style type="text/css">
      .main__container {
       border-radius: 5px;
        background-color:  #c2f0c2;
        padding:  150px 220px 270px 300px;
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


    </style>
    <title>FEEDBACK</title>
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
           <h1 align="center" style="font-size:35px; font-family: cursive; color:#ff3333; padding-bottom:50px;">Post Feedback</h1>
          <!-- MAIN SECTION STARTS HERE -->
          <form action="" method="POST">
            <p style="font-family: cursive; color:#b30000; font-size: 25px;">Do not hesitate to write to us(Maximum 70 words):</p>
            <input type="hidden" name="id" value="<?php echo $i; ?>"/>
            <textarea name="feedback" rows="7" cols="85" placeholder="Write your feedback here"></textarea>
            <br>
            <br>
            <div class="submit">
              <button type="submit"  class="submitbtn" name="save">POST</button>
              <p id="demo"></p>
              </div>
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
            <a href="Customer_dashboard.php?id=<?php echo $i; ?>">Dashboard</a>
          </div>
          <div class="sidebar__link">
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
          <div class="sidebar__link active_menu_link">
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
