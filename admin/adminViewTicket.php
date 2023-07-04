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
            Admin View Ticket
          </h1>
          
          <div class="booking-boats">
             <?php
             require '../Backend/partials/_connection.php';
             $sql = "SELECT * FROM `bookings`;";
             $result = mysqli_query($conn,$sql);
             while($row = mysqli_fetch_assoc($result)){
               echo"<div class='boat'>
               <h6>Name: ".$row['username']."</h6>
               <h6>Email: ".$row['email']."</h6>
               <h6>Price: ".$row['price']."</h6>
               <h6>Date: ".$row['date']."</h6>
               <h6>Time: ".$row['time']."</h6>
               <h6>Type: ".$row['type']."</h6>
               <h6>Seats Booked: ".$row['seats']."</h6>
               <h6>Status: ".$row['status']."</h6></div>";
             }
             ?>
          </div>
        </div>
      </section>
      
</body>
</html>