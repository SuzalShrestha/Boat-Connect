<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Tickets</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link rel="stylesheet" href="./css/style.css" />
</head>
<body>
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
              echo '<li><a href="#">View Tickets</a></li>';
              echo '<li><a href="./backend/logout.php">Logout</a></li>';
            }else{
              echo '<li><a href="./login.php">Login</a></li>';
            }
            ?>
            <li><a style="background-color: blue; padding: 10px 5px; border-radius: 5px;" href="./admin/login.php">Admin Panel</a></li>
          </ul>
        </div>
      </div>
<div class="container m-4">
    <h1 class="h1">Your Booked Tickets</h1>
    
        <?php
        $email = $_SESSION['email'];
        require './Backend/partials/_connection.php';
        $sql ="SELECT * FROM `bookings` WHERE email='$email';";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
            echo '<div class="card my-4">
                <div class="card-body text-primary h4 p-4">
                    Date: '.$row['date'].' <br>
                    Time: '.$row['time'].' <br>
                    Type of Boat: '.$row['type'].'<br>
                    Seats Booked: '.$row['seats'].'<br>
                   </div>
                   <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-success">
                   '.$row['status'].'
                   </span>
                 </div>';
        }
        ?>

</div>
</body>
</html>