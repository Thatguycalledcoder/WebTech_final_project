<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berekuso Ballers Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styling/entry.css">
</head>

<body>
    <div class="container-fluid logoContainer">
        <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
            <div class="col-lg-6 col-sm-12 logoContainer mt-5 pt-5">
                <div class="container">
                    <img class="bball" src="assets/NBA-All-Star-Secondary-Logo.jpg" alt="bball logo">
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 loginContainer">
                <form class="login-form mt-5 pt-5 mx-5 px-5" method="POST" action="sign_in.php">
                    <div class="login-text mt-3">
                        <?php
                        if (isset($_SESSION["msg"]))
                            echo "<h5>" . $_SESSION["msg"] . "</h5>"
                        ?>
                        <h1>Welcome back!</h1>
                        <h4>Sign in</h4>
                    </div>
                    <div class="mt-5">
                        <input type="text" id="email" name="email" placeholder="Enter Email" required><br>
                        <input type="password" id="password" name="password" placeholder="Enter Password" aria-placeholder="Password" required><br>
                        <a href="#">Forgot password?</a>
                        <button class="btn-primary login-btn" name="submit" type="submit">Login</button><br>
                        <a class="linker" href="signup.php">Sign up here to join the fan club!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>