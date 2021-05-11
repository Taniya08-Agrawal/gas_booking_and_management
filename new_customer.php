<?php
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
    <link rel="stylesheet" href="style1.css" />
    <style type="text/css">
      .container3 {
  border-radius: 5px;
  background-color:  #c2f0c2;
  padding:  20px 220px 220px 220px;
}
  </style>
    <title>Add new customer</title>
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
        
          <!-- MAIN TITLE STARTS HERE -->
        <
          <div class='container3' >
            <form action="registrationCustomer.php" method='POST'>
              <input type="hidden" name="em" value="<?php echo $email;?>">
              <h1 align="center" style="font-size:35px; font-family: cursive; color:rgb(255, 134, 134);">Customer Details</h1>
                <p>Please fill in this form to create a customer account.</p>
                <hr>
                <label for="name">
                  <b style="font-size: 20px; font-family: cursive; color:#004d00;">Name</b>
                  <input type="text" placeholder="Enter your name" name="name" required title="Name should only contain alphabets" required>
                </label>
                <label for="mob">
                  <b style="font-size: 20px; font-family: cursive; color:#004d00;">Mobile Number</b>
                  <input type="tel" placeholder="Enter mobile number" name="mob" pattern="[0-9]{10}" required title="Mobile no. should be of 10 digits" required>
                </label>
                <label for="aadhar">
                  <b style="font-size: 20px; font-family: cursive; color:#004d00;">Aadhar Number</b>
                  <input type="tel" placeholder="Enter aadhar number" name="aadhar" pattern="[0-9]{12}" required title="Aadhar no. should be of 12 digits" required>
                </label>
                <label for="email">
                  <b style="font-size: 20px; font-family: cursive; color:#004d00;">Email</b>
                  <input type="email" placeholder="Enter Email" name="email" required>
                </label>
                 <label for="psw">
                   <b style="font-size: 20px; font-family: cursive; color:#004d00;">Password</b>
                   <input type="password" placeholder="Enter Password" name="psw" pattern=".{5, 20}" required title="Password should be of length 5 to 10" required>
                 </label>
                 <label for="address">
                   <b style="font-size: 20px; font-family: cursive; color:#004d00;">Address</b>
                   <input type="text" placeholder="Enter Address" name="address" required>
                 </label>
                 <label for="district">
                   <b style=" font-size: 20px; font-family: cursive; color:#004d00;">District</b>
                   <input type="text" placeholder="Enter district" name="district" required>
                 </label>
                
                 <div class="submit">
                 <button type="submit" onclick="typeWriter()" class="submitbtn">Sign Up</button>
                 <p id="demo"></p>
                 </div>
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
            <a href="Admin_dashboard.php?email=<?php echo $email ;?>">Dashboard</a>
          </div>
          <div class="sidebar__link active_menu_link">
            <i class="fa fa-truck"></i>
            <a href="new_customer.php?email=<?php echo $email ;?>">Add New customer</a>
          </div>
          <div class="sidebar__link">
            <i class="fa fa-truck"></i>
            <a href="new_supplier.php?email=<?php echo $email ;?>">Add New Supplier</a>
          </div>
          <div class="sidebar__link">
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
