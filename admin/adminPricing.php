<?php
session_start();
if(!isset($_SESSION['adminlogin'])){
  header("Location: http://127.0.0.1/thedebuggers/admin/login.php");
}
?>
<?php
  require '../Backend/partials/_connection.php';
if($_SERVER['REQUEST_METHOD']== 'POST'){
  $small = $_POST['small'];
  $medium = $_POST['medium'];
  $large = $_POST['large'];
  $sql = "UPDATE `pricing` SET `pricing`.`small`='$small', `pricing`.`medium`='$medium',`pricing`.`large`='$large';";
  $result = mysqli_query($conn,$sql);
  if($result){
    echo '<script type="text/javascript"> 
    alert("Price Updated");
    </script>';
  }else{
    echo '<script type="text/javascript"> 
    alert("Price Not Updated");
    </script>';
  }
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
        <form action='' method='post' class="book-container">
          <h1 class="booking-header">
            Admin Pricing
          </h1>
          
          <div class="booking-boats">
            <?php
            $sql = "SELECT * FROM `pricing`;";
            $result = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result)){
             echo '<div class="boat">
                  <h3>Small Boat</h3>
                  <p>Price</p>
                  <input type="text" name="small" id="price" value="'.$row['small'].'">
                </div>';
                echo '<div class="boat">
                <h3>Medium Boat</h3>
                <p>Price</p>
                <input type="text" name="medium" id="price" value="'.$row['medium'].'">
              </div>';
              echo ' <div class="boat">
              <h3>Large Boat</h3>
              <p>Price</p>
              <input type="text" name="large" id="price" value="'.$row['large'].'">
            </div>';
            }
            ?>

          </div>
          <button class='btn btn-lg btn-primary mt-4' type='submit'>Change boat prices.</button>
        </form>
      </section>
      
</body>
</html>