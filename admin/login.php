<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $adminUserName = $_POST['admin_username'];
    $admin_pwd = $_POST['admin_pwd'];
    require '../Backend/partials/_connection.php';
    $sql = "SELECT * FROM `admin` WHERE username='$adminUserName' AND password='$admin_pwd';";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 1){
        session_start();
        $_SESSION['adminlogin'] = 'true';
        echo '<script type="text/javascript"> 
        alert("Admin Login Successfull.")
        window.location.href="http://127.0.0.1/thedebuggers/admin/adminDashboard.php" 
        </script>';
    }else{
        echo '<script type="text/javascript"> 
        alert("Admin Login UnSuccessfull.")
        window.location.href="" 
        </script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log In</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link href="../css/login.css" rel="stylesheet">
</head>
<body>
    <div class="main">
    <div class="container">
        <div class="logo">
            <img src="../images/logo.png" alt="logo">
        </div>
        <form class="form-signin" action="" method="post">
            <h2 class="form-signin-heading">Admin Log In</h2>
            <label for="adminUsername" class="sr-only">Admin Username</label>
            <input type="text" id="email" class="form-control" name="admin_username" required autofocus>
            <label for="admin_pwd" class="sr-only">Password</label>
            <input type="password" id="admin_pwd" class="form-control" name="admin_pwd" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Log In</button>
        </form>
    </div>
    </div>
</body>
</html>
