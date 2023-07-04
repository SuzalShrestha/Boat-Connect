<?php
require_once './partials/_connection.php';
if($_SERVER['REQUEST_METHOD'] == 'POST'){

$email = $_POST['login_email'];
$password = $_POST['login_pwd'];

$sql_query = "SELECT * FROM `signup` WHERE email = '$email' AND status ='active';";
$result = mysqli_query($conn,$sql_query);
if($result = mysqli_query($conn,$sql_query) AND $num_rows = mysqli_num_rows($result)==1){
    $row = mysqli_fetch_assoc($result);
    $flag = password_verify($password,$row['password']);
    if($flag){
        session_unset();
        session_start();
        $_SESSION['username'] =$row['username'];
        $_SESSION['email'] =$row['email'];
        $_SESSION['phone'] =$row['phone'];
        $_SESSION['country'] =$row['country'];
        echo '<script type="text/javascript"> 
        alert("Login Successfull.")
        window.location.href="http://127.0.0.1/thedebuggers/index.php" 
        </script>';
    }else{
        echo '<script type="text/javascript"> 
        alert("Invalid Credentials")
        window.location.href="http://127.0.0.1/thedebuggers/login.php" 
        </script>';
    }
    
}else{
    echo '<script type="text/javascript"> 
    alert("Activate your account first.")
    window.location.href="http://127.0.0.1/thedebuggers/login.php" 
    </script>';
}

}else{
    echo '<script type="text/javascript"> 
    window.location.href="http://127.0.0.1/thedebuggers/login.php" 
    </script>';
}

?>