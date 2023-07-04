<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js" integrity="sha512-w3u9q/DeneCSwUDjhiMNibTRh/1i/gScBVp2imNVAMCt6cUHIw6xzhzcPFIaL3Q1EbI2l+nu17q2aLJJLo4ZYg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>

</body>
</html>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
require 'phpqrcode/qrlib.php';
session_start();
if(!isset($_SESSION['email'])){
    header("Location: http://127.0.0.1/thedebuggers/index.php");
}else{
    require './partials/_connection.php';
    if(isset($_SERVER['REQUEST_METHOD'])=='POST' && isset($_POST['date']) && isset($_POST['time']) && isset($_POST['type'])){
        $date = $_POST['date'];
        $time = $_POST['time'];
        $type = $_POST['type'];
        $seats = $_POST['seats'];
        $price = $_POST['total'];
        $email = $_SESSION['email'];
        $username = $_SESSION['username'];
        $ticketid = bin2hex(random_bytes(4));
        $query = "INSERT INTO `bookings` (`email`,`username`, `date`, `time`, `type`, `seats`,`price`,`status`,`ticketid`) VALUES ('$email','$username', '$date', '$time', '$type','$seats','$price' ,'running','$ticketid');";
        $result = mysqli_query($conn,$query);
        if($result){
            $PNG_TEMP_DIR = 'temp/';
            if (!file_exists($PNG_TEMP_DIR)){
                mkdir($PNG_TEMP_DIR);
            }
            $codestring = $ticketid;
            $filename = $PNG_TEMP_DIR .$ticketid. '.png';
            QRcode::png($codestring, $filename);
            $mail = new PHPMailer(true);   // Enable verbose debug output   
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->IsSMTP();
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'boatconnnect@gmail.com';                 // SMTP username
                $mail->Password = 'zctdpujruucgcwod';                           // SMTP password
                $mail->SMTPSecure = 'tls';                          
                $mail->Port = 587;                                    // TCP port to connect to
                $mail->SetFrom("boatconnnetc@gmail.com", "BoatConnect");
                $mail->addAddress($email);               // Name is optional
                $mail->addAttachment($filename);
                $mail->isHTML(true);                          // Set email format to HTML
                $mail->Subject='Ticket Booked';
                $mail->Body = "<!DOCTYPE html>
                <html>
                <head>
                  <title>Invoice Slip</title>
                </head>
                <style>
                  body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 0;
                  }
                  
                  .invoice {
                    max-width: 800px;
                    margin: 0 auto;
                    padding: 20px;
                    border: 1px solid #ccc;
                    background-color: #f9f9f9;
                  }
                  
                  h1 {
                    text-align: center;
                  }
                  
                  .invoice-details {
                    display: flex;
                    justify-content: space-between;
                    margin-bottom: 20px;
                  }
                  
                  .left, .right {
                    flex-basis: 50%;
                  }
                  
                  table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-bottom: 20px;
                  }
                  
                  th, td {
                    border: 1px solid #ccc;
                    padding: 8px;
                  }
                  
                  thead th {
                    background-color: #f2f2f2;
                  }
                  
                  tfoot td {
                    text-align: right;
                  }
                  
                  .footer {
                    text-align: center;
                    margin-top: 20px;
                  }
                  
                </style>
                <body>
                  <div class='invoice'>
                    <h1>BoatConnect Ticket Slip</h1>
                    <div style='display: flex; justify-content: center;' class='qr_image'>
                  </div>
                    <div class='invoice-details'>
                      <div class='left'>
                        <h2>Ticket Id: ".$ticketid."</h2>
                        <h2>Date and Time: ".$date." / ".$time."</h2>
                      </div>
                    </div>
                    <table>
                      <thead>
                        <tr>
                          <th>Username</th>
                          <th>Seats</th>
                          <th>Type</th>
                          <th>Price</th>
                        </tr>
                      </thead>
                      <thead>
                        <tr>
                          <th>".$username."</th>
                          <th>".$seats."</th>
                          <th>".$type."</th>
                          <th>Rs. ".$price."</th>
                        </tr>
                      </thead>
                    </table>
                    <div class='footer'>
                      <p>Enjoy your ride!</p>
                    </div>
                  </div>
                </body>
                </html>
                ";
            if($mail->send()){
                echo '<script type="text/javascript"> 
                alert("Ticket Booked")
                window.location.href="http://127.0.0.1/thedebuggers/index.php" 
                </script>';
            }
        }else{
            echo '<script type="text/javascript"> 
            alert("Failed to book.")
            window.location.href="http://127.0.0.1/thedebuggers/Booking.php" 
            </script>';
        }

    }else{
        echo '<script type="text/javascript"> 
        alert("Invalid url.")
        window.location.href="http://127.0.0.1/thedebuggers/index.php" 
        </script>';
    }
}
?>