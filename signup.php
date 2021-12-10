<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berekuso Ballers Login</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styling/entry.css">
</head>

<body>
    <div class="container-fluid logoContainer">
        <div class="row ${1| ,row-cols-2,row-cols-3, auto,justify-content-md-center,|}">
            <div class="col-lg-6 col-sm-12 logoContainer mt-5 pt-5">
                <div class="container">
                    <img class="signupImage" src="assets/jubilation.jpg" alt="bball logo">
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 pt-5 loginContainer">
                <form class="login-form mx-5 px-5" method="POST" action="register.php">
                    <div class="login-text mt">
                        <?php
                        if (isset($_SESSION["msg"]))
                            echo "<h5>" . $_SESSION["msg"] . "</h5>"
                        ?>
                        <h1>Welcome to the club!</h1>
                        <h4>Sign up</h4>
                    </div>
                    <div class="mt">
                        <input type="text" id="fname" name="fname" placeholder="First name" minlength="3" required><br>
                        <input type="text" id="lname" name="lname" placeholder="Last name" required><br>
                        <input type="text" id="email" name="email" placeholder="Email" required><br>
                        <input type="password" id="password" name="password" minlength="8" placeholder="Password" aria-placeholder="Password" required><br>
                        <input type="password" id="confirm_pswd" name="confirm_pswd" minlength="8" placeholder="Confirm Password" aria-placeholder="Password" required><br>
                        <button class="btn-primary login-btn" id="signup" name="submit" type="submit" onsubmit="register(event)">Sign up</button>
                        <a class="linker" href="login.php">Already in the fan club? Login here!</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>