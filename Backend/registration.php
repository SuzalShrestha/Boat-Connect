<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';

    require_once './partials/_connection.php';
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $if_exist_query = "SELECT * FROM `signup` WHERE email='$email';";
    $result = mysqli_query($conn, $if_exist_query);
    if(mysqli_num_rows($result) <1){
        if($cpassword == $password){
        $hashpassword = password_hash($password, PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(16));
        $insert_query = "INSERT INTO `signup` (`id`, `username`, `email`, `password`, `timestamp`, `token`, `status`) VALUES (NULL, '$username', '$email', '$hashpassword', current_timestamp(), '$token', 'inactive');";
                $mail = new PHPMailer(true);   // Enable verbose debug output   
                $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                    $mail->IsSMTP();
                    $mail->SMTPAuth = true;                               // Enable SMTP authentication
                    $mail->Username = 'boatconnnect@gmail.com';                 // SMTP username
                    $mail->Password = 'zctdpujruucgcwod';                           // SMTP password
                    $mail->SMTPSecure = 'tls';                          
                    $mail->Port = 587;                                    // TCP port to connect to
                    $mail->SetFrom("boatconnnetc@gmail.com", "Boat Connect");
                    $mail->addAddress($email);               // Name is optional
                    // $mail->addAttachment();
                    $mail->isHTML(true);                          // Set email format to HTML
                    $mail->Subject='Account Verification';
                    $mail->Body = 'http://127.0.0.1/thedebuggers/backend/accountactivate.php?email='.$email.'&token='.$token;
                    $mail->send();
                $insert_result = mysqli_query($conn, $insert_query);
                if($insert_result){
                    header('Location: http://127.0.0.1/thedebuggers');
                }else{
                    echo "error occured";
                }
        }else{
            echo '<script type="text/javascript"> 
            alert("Password Do not match.")
            window.location.href="http://127.0.0.1/thedebuggers/signup.php" 
            </script>';
        }

    }
    else{
        echo '<script type="text/javascript"> 
        alert("Account Already Created, Proceed to login.")
        window.location.href="http://127.0.0.1/thedebuggers/login.php" 
        </script>';
    }





?>
