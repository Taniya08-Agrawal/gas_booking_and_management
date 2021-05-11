<?php
    $msg=$_GET['msg'];
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
    <title>DASHBOARD</title>
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
          <p style="font-size: 20px; font-family: cursive; color:#004d00;"><?php echo $msg; ?></p>
          <div class="main__title">
            
        </div>
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
