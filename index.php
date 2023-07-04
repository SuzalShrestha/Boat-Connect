<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BoatConnect | Home Page</title>
    <link rel="stylesheet" href="./css/style.css" />
    <script src="https://kit.fontawesome.com/391c242a29.js" crossorigin="anonymous"></script>
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
            <li><a href=".about">About</a></li>
            <?php
            session_start();
            if(isset($_SESSION['email'])){
              echo '<li><a href="tickets.php">View Tickets</a></li>';
              echo '<li><a href="./backend/logout.php">Logout</a></li>';
            }else{
              echo '<li><a href="./login.php">Login</a></li>';
            }
            ?>
            <li><a style="background-color: blue; padding: 10px 5px; border-radius: 5px;" href="./admin/login.php">Admin Panel</a></li>
          </ul>
        </div>
      </div>
      <div class="heading-text-container">
        <div class="heading-text">
          <h1>BOAT</h1>
          <p>SIMPLIFYING BOAT RESERVATIONS</p>
        </div>
        <div class="button-container">
          <button class="contact-btn btn"><a href="Booking.php">BOOK NOW</a></button>
        </div>
      </div>
    </section>

   <!-- -----second_section---- -->
   <div class="features">
    <div class="row row1">
        <div class="text-col">
            <h2>Why Boat Connect?</h2>
            <p>

Boat connect provides an opportunity to experience the beauty of Nepal's waterways, while also saving time, ensuring comfort, and promoting sustainable transportation. Boat Connect's vision is to continue expanding its services, connecting more destinations and empowering people to explore the wonders of Nepal through this innovative mode of travel.
</p>
        </div>
        <div class="img-col">
            <img src="./images/photo1.jpg" >
        </div>
    </div>
    <div class="row row2">
        <div class="img-col">
            <img src="./images/photo2.jpg" >
        </div>
        <div class="text-col">
            <h2>Easy reservations and booking</h2>
            <p>Users can effortlessly browse through available time slots, select their preferred date and time, and reserve a boat with just a few clicks. BoatConnect employs a secure payment gateway, ensuring a seamless and trustworthy booking process</p>
        </div>
        
    </div>
    <div class="row row3">
        <div class="text-col">
            <h2>Explore the fewa lake</h2>
            <p>With Boat Connect, explore Fewa Lake's enchanting beauty. Book online, board a comfortable boat, and glide across the tranquil waters. Admire the majestic Annapurna range reflected in the crystal-clear lake. Spot vibrant birds and enjoy a serene atmosphere. Safe and convenient, Boat Connect ensures an unforgettable experience amidst nature's wonders.</p>
        </div>
        <div class="img-col">
            <img src="./images/photo4.jpg" >
        </div>
        
        
    </div>
        
        
    </div>
</div>
    
<!-- -----third-section---- -->
<div class="register-box">
  <div class="text-col-left">
    <h1>Want to reserve a boat ?</h1>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eligendi consectetur ad veritatis voluptatem vel, sapiente sint inventore repellendus eum dolorum.</p>
  </div>
  <div class="text-col-right">
     <a href='./Booking.php' id="register">RESERVE NOW</a>
  </div>
</div>
     <div class="footer">
      
        <div class="footer-top">
          
            <i class="fa-brands fa-facebook"></i>
       
          
            <i class="fa-brands fa-instagram"></i>
          
            <i class="fa-brands fa-twitter"></i>
        </div>
        <div class="footer-bottom">
          <p>© 2023 Boat Connect. All rights reserved.</p>
        </div>
      
    </div>
    
  </body>
</html>
