<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BoatConnect | Sign Up</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <!-- Custom CSS -->
    <link href="./css/signup.css" rel="stylesheet">
</head>
<body>
    <div class="main">
    <div class="container">
        <div class="logo">
            <img src="./images/logo.png" alt="logo">
        </div>
        <form class="form-signup" action="./backend/registration.php" method="post">
            <h2 class="form-signup-heading">Sign Up</h2> 

            <label for="inputUsername" class="sr-only">Username</label>
            <input type="username" id="inputUsername" class="form-control" name="username" placeholder="Username" required autofocus>
            <label for="inputEmail" class="sr-only">Email</label>
            <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email" required>
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputUsername" class="form-control" name="password" placeholder="Password" required>
            <label for="inputPassword" class="sr-only">Confirm Password</label>
            <input type="password" id="inputUsername" class="form-control" name="cpassword" placeholder="Confirm Password" required>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Agree To Terms and Conditions.</label>
              </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign Up</button>
        </form>
        <div class="register">
            <p>Already have an account?</p>
            <a href="login.php">Log In</a>
        </div>
    </div>
    </div>
</body>
</html>