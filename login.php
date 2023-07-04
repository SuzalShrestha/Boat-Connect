<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BoatConnect | LogIn</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Custom CSS -->
    <link href="./css/login.css" rel="stylesheet">
</head>
<body>
    <div class="main">
    <div class="container">
        <div class="logo">
            <img src="./images/logo.png" alt="logo">
        </div>
        <form class="form-signin" action="./backend/client_login.php" method="post">
            <h2 class="form-signin-heading">Log In</h2>
            <label for="inputUsername" class="sr-only">Email</label>
            <input type="email" id="email" class="form-control" name="login_email" required autofocus>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputUsername" class="form-control" name="login_pwd" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Log In</button>
        </form>
        <div class="register">
            <p>New to Boat?</p>
            <a href="signup.php">Create Account</a>
        </div>
    </div>
    </div>
</body>
</html>
