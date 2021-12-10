<?php
namespace models;
  require "sql_controller.php";
  $posts = getPlayerData();
  
  session_start(); 

  // Checks if the user signed in
  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }

  // Checks if the user clicked the logout button
  if (isset($_GET['logout'])) {
    session_destroy();
  	unset($_SESSION['username']);
    unset($_SESSION['id']);
  	header("location: login.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>The Players</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
        <link href="styling/players.css" rel="stylesheet"> 
    </head>
    <body>
        <!-- Navigation bar and page image -->
           <div class="container-fluid mb-5" style="padding: 0px;">
            <div class="landing">
              <!-- Navigation bar -->
            <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: rgba(0, 0, 0, 0);">
               <div class="container-fluid">
               <img src="assets/NBA-All-Star-Secondary-Logo.jpg" style="height: 50px;"><a class="navbar-brand link userlink" href="profile.php"><?= $_SESSION['username'] ?></a>
                   <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                       data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                       aria-label="Toggle navigation">
                       <span class="navbar-toggler-icon"></span>
                   </button>
                   <div class="collapse navbar-collapse navi" id="navbarSupportedContent">
                       <ul class="navbar-nav me-5 mb-2 mb-lg-0">
                           <li class="nav-item">
                               <a class="nav-link link" aria-current="page" href="index.php">Home</a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link link" href="Team.php">Staff</a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link active" href="#" style="font-weight: 500;">Player</a>
                           </li>
                           <li class="nav-item">
                               <a class="nav-link link" href="Transfers.php">Transfers</a>
                           </li>
                           <li class="nav-item">
                            <a class="nav-link link" href="Fixtures.php">Fixtures</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link" target="_blank" href="contact.html">Contact</a>
                            </li>
                            <li class="nav-item">
                              <strong><a class="nav-link" href="Players.php?logout='1'" style="color: red">Logout</a></strong>
                            </li>
                       </ul>
                   </div>
               </div>
           </nav>
             </div>
        </div>
        <main>
            <!-- Header -->
            <div class="container">
                <h1 class="d-flex justify-content-center" id="thePlayers">Meet the Players</h1><br>
            </div>

            <!-- Displaying the data for each player -->
            <?php 
                foreach ($posts as $ket => $value) {
                    echo '
                    <div class="container">
                    <h3 class="d-flex justify-content-center">'. $value["fname"] . " " . $value["lname"] . '</h3>
                    <div class="row featurette">
                  <div class="col-md-7 order-md-2">
                    <ul class="lead pb-3" style="list-style-type: none;">
                        <li class="stats pb-1">
                            <strong>Dunks: </strong> '. $value["dunks"] . '
                        </li>
                        <li class="pb-1">
                            <strong>Blocks: </strong> '. $value["blocks"] . '
                        </li>
                        <li class="pb-1">
                            <strong>Steals: </strong> '. $value["steals"] . '
                        </li>
                        <li class="pb-1">
                            <strong>Threes: </strong> '. $value["threes"] . '
                        </li>
                        <li class="pb-1">
                            <strong>Points: </strong> '. ($value["baskets"] * 2) +  ($value["threes"] * 3) +  ($value["dunks"] * 2) . '
                        </li>
                        <li class="pb-1">
                            <strong>Assists: </strong> '. $value["assists"] . '
                        </li>
                        <li class="mb-4">
                            <strong>Rating⭐: </strong> '. $value["rating"] . '
                        </li>
                        <li class="pt-3">
                            <strong>Trainer: </strong> '. $value["Cfname"] . " " . $value["Clname"] . '
                        </li>
                    </ul>
                  </div>
                  <div class="col-md-5 order-md-1">
                    <img class="playerimg" src='. $value["player_image"].' alt='. $value["fname"] . " " . $value["lname"] .' title='. $value["fname"] . " " . $value["lname"] . ' style="width: 300px; height: 300px;">
                  </div>
                </div>
                </div>
    
                <hr class="featurette-divider">
                    ';
                }
            ?>

            

        </main>
        <div class="container-fluid" style="background-color: black;">
            <footer class="row row-cols-5 py-5 mt-3 mx-3">
              <!-- Author column -->
              <div class="col">
                    <img src="assets/NBA-All-Star-Secondary-Logo.jpg" style="height: 50px;">
                    <p class="text-muted mt-2">By: <br> david.quarshie@ashesi.edu.gh</p>
              </div>
          
              <div class="col">
          
              </div>
          
              <!-- Page Navigation column -->
              <div class="col">
                <h5>Navigation</h5>
                <ul class="nav flex-column">
                  <li class="nav-item mb-2 flink"><a href="index.php" class="nav-link p-0 text-muted">Home</a></li>
                  <li class="nav-item mb-2 flink"><a href="Team.php" class="nav-link p-0 text-muted">Staff</a></li>
                  <li class="nav-item mb-2 flink"><a href="Players.php" class="nav-link p-0 text-muted">Player</a></li>
                  <li class="nav-item mb-2 flink"><a href="Transfers.php" class="nav-link p-0 text-muted">Transfers</a></li>
                  <li class="nav-item mb-2 flink"><a href="Fixtures.php" class="nav-link p-0 text-muted">Fixtures</a></li>
                </ul>
              </div>
          
              <!-- Navigation to Departments column -->
              <div class="col">
                <h5>Departments</h5>
                <ul class="nav flex-column">
                  <li class="nav-item mb-2 flink"><a href="Team.php#Analysis" class="nav-link p-0 text-muted">Analysis</a></li>
                  <li class="nav-item mb-2 flink"><a href="Team.php#Coaching" class="nav-link p-0 text-muted">Coaching</a></li>
                  <li class="nav-item mb-2 flink"><a href="Team.php#Marketing" class="nav-link p-0 text-muted">Marketing</a></li>
                  <li class="nav-item mb-2 flink"><a href="Team.php#Registrar" class="nav-link p-0 text-muted">Registrar</a></li>
                  <li class="nav-item mb-2 flink"><a href="Team.php#Scouting" class="nav-link p-0 text-muted">Scouting</a></li>
                </ul>
              </div>
          
              <!-- Contact information column -->
              <div class="col">
                <h5>Contact Info</h5>
                <ul class="nav flex-column">
                  <li class="nav-item mb-2"><a href="contact.html" class="nav-link p-0" style="color: rgb(218, 216, 216);"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope">
                    <path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"/>
                  </svg> berekusoballers@gmail.com</a></li>
                  <li class="nav-item mb-2 p-0 text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-globe">
                    <path d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm7.5-6.923c-.67.204-1.335.82-1.887 1.855A7.97 7.97 0 0 0 5.145 4H7.5V1.077zM4.09 4a9.267 9.267 0 0 1 .64-1.539 6.7 6.7 0 0 1 .597-.933A7.025 7.025 0 0 0 2.255 4H4.09zm-.582 3.5c.03-.877.138-1.718.312-2.5H1.674a6.958 6.958 0 0 0-.656 2.5h2.49zM4.847 5a12.5 12.5 0 0 0-.338 2.5H7.5V5H4.847zM8.5 5v2.5h2.99a12.495 12.495 0 0 0-.337-2.5H8.5zM4.51 8.5a12.5 12.5 0 0 0 .337 2.5H7.5V8.5H4.51zm3.99 0V11h2.653c.187-.765.306-1.608.338-2.5H8.5zM5.145 12c.138.386.295.744.468 1.068.552 1.035 1.218 1.65 1.887 1.855V12H5.145zm.182 2.472a6.696 6.696 0 0 1-.597-.933A9.268 9.268 0 0 1 4.09 12H2.255a7.024 7.024 0 0 0 3.072 2.472zM3.82 11a13.652 13.652 0 0 1-.312-2.5h-2.49c.062.89.291 1.733.656 2.5H3.82zm6.853 3.472A7.024 7.024 0 0 0 13.745 12H11.91a9.27 9.27 0 0 1-.64 1.539 6.688 6.688 0 0 1-.597.933zM8.5 12v2.923c.67-.204 1.335-.82 1.887-1.855.173-.324.33-.682.468-1.068H8.5zm3.68-1h2.146c.365-.767.594-1.61.656-2.5h-2.49a13.65 13.65 0 0 1-.312 2.5zm2.802-3.5a6.959 6.959 0 0 0-.656-2.5H12.18c.174.782.282 1.623.312 2.5h2.49zM11.27 2.461c.247.464.462.98.64 1.539h1.835a7.024 7.024 0 0 0-3.072-2.472c.218.284.418.598.597.933zM10.855 4a7.966 7.966 0 0 0-.468-1.068C9.835 1.897 9.17 1.282 8.5 1.077V4h2.355z"/>
                  </svg> Kwabenya, Berekuso Estates</li>
                  <li class="nav-item mb-2 p-0 text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone">
                    <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                  </svg> +233506341632</li>
                </ul>
              </div>
            </footer>
          </div>
    </body>
</html>
