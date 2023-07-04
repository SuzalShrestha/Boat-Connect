<?php
session_start();
if(!isset($_SESSION['adminlogin'])){
  header("Location: http://127.0.0.1/thedebuggers/admin/login.php");
}
?>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $ticketid = $_POST['ticketid'];
    require '../Backend/partials/_connection.php';
    $sql = "SELECT * FROM `bookings` WHERE ticketid='$ticketid';";
    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);
        $sql = "UPDATE `bookings` SET `status` = 'expired', `ticketid`='0' WHERE `bookings`.`ticketid` = '$ticketid';";
        $result = mysqli_query($conn,$sql);
        if($result){
            echo '
            Username : '.$row['username'].'  <br>
            Email: '.$row['email'].'   <br>
            Date: '.$row['date'].'<br>
            Time: '.$row['time'].'<br>
            Boat Type: '.$row['type'].'<br>
            Seats: '.$row['seats'].'<br>
            Price: '.$row['price'].'<br>
            <script type="text/javascript"> 
            alert("Ticket Verified Successfully for '.$row['email'].'.")
            </script>';
        }
        
    }else{
        echo '<script type="text/javascript"> 
            alert("Unidentified Ticket")
            window.location.href="" 
            </script>';
    }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Ticket Verification</title>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <style>
    .video{
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        flex-direction: column;
    }
    
  </style>
  <body>
<form style="justify-content: center; align-items: center; margin-top: 20%; display: none;" id="form" action="" method="post">
    <input type="text" id="text" hidden name="ticketid">
    <button class="btn btn-lg btn-primary btn-block" type="submit">Verify Ticket</button>
</form> 
<div class="video">
   <video width="80%" id="MyCameraOpen"></video>
</div>  
   <script type="text/javascript">
    let scanner = new Instascan.Scanner({ video: document.getElementById('MyCameraOpen') });
    function startcamera(){
        Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[1])
        } else {
            console.error('No cameras found.');
        }
    }).catch(function (e) {
        console.error(e);
    });
    }
    startcamera();
    scanner.addListener('scan', function (content) {
        document.getElementById('text').value = content;
        scanner.stop()
        if(content !==''){
            document.getElementById("MyCameraOpen").style.display = 'none';
            document.getElementById("form").style.display = 'flex';
        }
    });
    startcamera();
  </script>
  </body>
</html>
