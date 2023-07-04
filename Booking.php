<?php
session_start();
if(!isset($_SESSION['email'])){
  echo '<script type="text/javascript"> 
  alert("You need to login first.")
  window.location.href="http://127.0.0.1/thedebuggers/login.php" 
  </script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ticket Pre-Booking</title>
    
    <!--bootstrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/bookingStyle.css">
  </head>
<body>
   
    <section class="header">
    <div class="navbar">
        <div class="logo">
          <img src="./images/logo.png" alt="logo" height="80px" width="80px"/>
        </div>
        <div class="nav-items">
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="">About</a></li>
            <?php
            if(isset($_SESSION['email'])){
              echo '<li><a href="tickets.php">View Tickets</a></li>';
              echo '<li><a href="./backend/logout.php">Logout</a></li>';
            }else{
              echo '<li><a href="./login.php">Login</a></li>';
              echo '<li><a href="./signup.php">SignUp</a></li>';
            }
            ?>
          </ul>
        </div>
      </div>
        <div class="book-container">
          <h1 class="booking-header">
            Book Your Boat
          </h1>
          <form action="./backend/ticketbooking.php" method="post">
          <div class="time-date">
          <div class="booking-date">
            <label for="date">Date:</label>
            <input type="date" id="date" name="date">
          </div>
          <!--time-->
          <div class="booking-time">
            <label for="time">Time:</label>
            <input type="time" id="time" name="time" required>
          </div>
          <div class="type-field">
            <label for="type">Type:</label>
            <select name="type" id="type" required onchange='price(document.getElementById("seats").value, this.value)'>
              <option value="small">Small</option>
              <option value="medium">Medium</option>
              <option value="large">Large</option>
          </select>
          </div>
          <div class="type-field">
            <label for="seats">Seats:</label>
            <select name="seats" id="seats" required onchange='price(this.value, document.getElementById("type").value)'>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
          </select>
          </div>
        </div>
        <input type="hidden" name="total" id="total">
        <div style="display: flex; justify-content: center; margin: 20px 0 0 0;">
        <button style="width: 20vw;" type="submit" class="btn btn-primary btn-lg">Book</button>
      </div>
          </form>
          <div class="booking-boats">
            <?php
            require 'Backend/partials/_connection.php';
            $sql = "SELECT * FROM `pricing`;";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            echo '<div class="boat">
            <img src="./images/boat3.jpg" alt="boat1"/>
            <h3>Small Boat</h3>
            <p>Price: Rs.'.$row['small'].'</p>
          </div>
          <div class="boat">
            <img src="./images/boat1.jpg" alt="boat1"/>
            <h3>Medium Boat</h3>
            <p>Price: Rs.'.$row['medium'].'</p>
          </div>
          <div class="boat">
            <img src="./images/boat2.jpg" alt="boat1"/>
            <h3>Large Boat</h3>
            <p>Price: Rs.'.$row['large'].'</p>
          </div>';
            ?>
            
          </div>
        </div>
      </section>
      <script>
        function price(seats, type) {
          total = 0;
          if(type == 'small'){
            total = 100 * Number(seats);
          }
          if(type == 'medium'){
            total = 280 * Number(seats);
          }
          if(type == 'large'){
            total = 380 * Number(seats);
          }
          document.getElementById('total').value = total;
        console.log(document.getElementById('total').value)
        }
      </script>
</body>
</html>