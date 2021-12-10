<?php

namespace models;
    require "sql_controller.php";
    session_start();

    // Checks if the login button was clicked
    if(isset($_POST["submit"])) 
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $password = base64_encode($password); //Encrypts password data
        $check = validateLogin($email, $password); //Checks if user data in database
        
        // Validates by checking if login data in database and emails match
        if ($check[0]["email"] == $email) 
        {
            // Get session data and proceed to landingpage
            $_SESSION["id"] = $check[0]["fan_id"];
            $_SESSION["username"] = $check[0]["fname"] . " " . $check[0]["lname"];
            header("location: index.php");
        }
        else 
        {
            $_SESSION["msg"] = "Incorrect credentials. Try again";
            header("location: login.php");
        }
    }

?>