<?php
  require "sql_controller.php";
  session_start();
  
  // Checks if the user signed in
  if (!isset($_SESSION['username'])) 
  {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }

  // Checks if the user clicked on the logout button
  if (isset($_GET['logout'])) 
  {
    session_destroy();
  	unset($_SESSION['username']);
    unset($_SESSION['id']);
    $_SESSION['msg'] = "Logged out";
  	header("location: login.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Berekuso Ballers Fixtures</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
        <link href="styling/profile.css" rel="stylesheet">
    </head>
    <body>
      <!-- Navigation bar -->
           <div class="container-fluid mb-5" style="padding: 0px;">
            <div id="landing">
                <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(0, 0, 0, 0);">
                    <div class="container-fluid">
                      <img src="assets/NBA-All-Star-Secondary-Logo.jpg" style="height: 50px;">
                      <!-- Button to delete account and trigger modal -->
                      <button type="button" data-bs-toggle="modal" style="background-color: transparent; border:none; margin:none; padding:none;" data-bs-target="#exampleModal">
                      <strong style="color: red;"> Delete Account</strong>
                      </button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse navi" id="navbarSupportedContent">
                            <ul class="navbar-nav me-5 mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link" aria-current="page" href="index.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="Team.php">Staff</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="Players.php">Player</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="Transfers.php">Transfers</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="Fixtures.php">Fixtures</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" target="_blank" href="contact.html">Contact</a>
                                    </li>
                                    <li class="nav-item">
                                    <strong><a class="nav-link" href="profile.php?logout='1'" style="color: red">Logout</a></strong>
                                    </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Update information form -->
        <div class="col-lg-12 col-sm-12 loginContainer d-flex justify-content-center">
                <form class="login-form mx-5 px-5" method="POST" action="update.php">
                    <div class="login-text">
                    <?php 
                            if(isset($_SESSION["msg2"]))
                                echo"<h5>" .$_SESSION["msg2"] ."</h5>"
                        ?>
                        <h1>Update your information</h1>
                    </div>
                    <div class="ml-5 pl-5">
                        <input type="text" id="fname" name="fname" placeholder="First name" minlength="3" required><br>
                        <small id="fnamelabel" class="smalls"></small><br>
                        <input type="text" id="lname" name="lname" placeholder="Last name" required><br>
                        <small id="lnamelabel" class="smalls"></small><br>
                        <input type="text" id="email" name="email" placeholder="Email" required><br>
                        <small id="emaillabel" class="smalls"></small><br>
                        <button class="btn-primary login-btn" id="signup" type="submit" name="submit">Update</button><br>
                    </div>
                </form>
            </div>
            <!-- Modal triggered by delete account button click -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Account Delete Alert!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">❌</button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Are you sure you want to delete your account?😢</label>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <form method="POST" action="remove.php">
          <button type="submit" name="submit" class="btn btn-primary">Yes</button>
        </form>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>
          
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous">
</script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    </body>
</html>