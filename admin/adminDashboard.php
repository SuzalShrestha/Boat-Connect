<?php
session_start();
if(!isset($_SESSION['adminlogin'])){
  header("Location: http://127.0.0.1/thedebuggers/admin/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking</title>
    
    <!--bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./admin.css">
  </head>
<body>
   
    <section class="header">
        <div class="navbar">
          <div class="logo">
            <img src="../images/logo.png" alt="logo" height="80px" width="80px"/>
          </div>
          <div class="nav-items">
            <ul>
              <li><a href="./adminDashboard.php">Home</a></li>
              <li><a href="./adminViewTicket.php">View Ticket</a></li>
              <li><a href="./adminPricing.php">Pricing</a></li>
              <li><a href="./scanner.php">Verify</a></li>
              <li><a href="../Backend/logout.php">Logout</a></li>
            </ul>
          </div>
        </div>
        <div class="book-container">
          <h1 class="booking-header">
            Admin DashBoard
          </h1>
          
          <div class="booking-boats">
            <div class="boat">
                <h3>Hi Admin Welcome Back To Admin Dashboard</h3>
              </div>
              
          </div>
        </div>
      </section>
      
</body>
</html>