<?php
require './partials/_connection.php';
if(isset($_GET['email']) && isset($_GET['token'])){
    $email = $_GET['email'];
    $token = $_GET['token'];
    
    $query = "SELECT * FROM `signup` WHERE token='$token';";
    $result = mysqli_query($conn,$query);
    $row = mysqli_num_rows($result);
    if ($row ==1){
        $query = "UPDATE `signup` SET `signup`.`status`='active', `signup`.`token` ='0' WHERE `email`='$email';";
        $result = mysqli_query($conn,$query);
        if($result){
            header('Location: http://127.0.0.1/thedebuggers/login.php');
        }else{
            echo '<script type="text/javascript"> 
            alert("Server Error")
            window.location.href="http://127.0.0.1/thedebuggers/index.php" 
            </script>';
        }
    }else{
        echo '<script type="text/javascript"> 
        alert("No Records Found.")
        window.location.href="http://127.0.0.1/thedebuggers/index.php" 
        </script>';
    }
}else{
    echo '<script type="text/javascript"> 
    alert("Invalid URL")
    window.location.href="http://127.0.0.1/thedebuggers/index.php" 
    </script>';
}


?>