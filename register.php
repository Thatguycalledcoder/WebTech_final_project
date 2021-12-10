<?php

namespace models;
    require "./sql_controller.php";
    session_start(); 

    $errors = array();

    // Get registration details
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirm_pswd = $_POST["confirm_pswd"];

    // Check if registration form was used by checking submit button
    if(isset($_POST["submit"])) {
        // Check if fname field was empty upon submission
        if (empty($fname)) 
        {
            array_push($errors, "Firstname is required");
        }

        // Check if lname field was empty upon submission
        if (empty($lname)) 
        {
            array_push($errors, "Lastname is required");
        }

        // Check if email field was empty upon submission
        if (empty($email)) 
        {
            array_push($errors, "Email is required");
        }

        // Check if password field was empty upon submission
        if (empty($password)) 
        {
            array_push($errors, "Password is required");
        }

        // Check if confirm password field was empty upon submission
        if (empty($confirm_pswd)) 
        {
            array_push($errors, "Confirm password field empty");
        }

        // Check if password and confirm password fields values are the same
        if($password != $confirm_pswd) {
            array_push($errors, "Password mismatch");
            $_SESSION["msg"] = "Password mismatch";
        }

        // Checks if there are no errors before moving to register user
        if (count($errors) == 0) 
        {
            $password = base64_encode($password); //Encrypts password data

            // Check if user already exists
            $status = validateRegistration($fname, $lname, $email, $password);
            
            // Checks if user does not exist before moving to register
            if ($status != true) 
            {   
                // Checks if user was previously on the site
                $check = checkArchive($fname, $lname, $email, $password);
                
                // If details are not in archive
                if($check == false)
                {
                    // Register the user
                    $status2 = addMember($fname, $lname, $email, $password);
                    if($status2)
                    {
                        $_SESSION["msg"] = "Registration successful";
                        header("Location: login.php");
                    }
                    else
                    {
                        $_SESSION["msg"] = "Registration unsuccessful";
                        header("Location: signup.php");
                    }
                }
                else 
                {
                    // Register user and remove data from archive
                    $status2 = addMember($fname, $lname, $email, $password);
                    $status3 = removeArchiveData($fname, $lname, $email, $password);
                    if($status2 & $status3)
                    {
                        $_SESSION["msg"] = "Registration details found.\n Account restored successfully";
                        header("Location: login.php");
                    }
                }

                
            }
            // If account already exists
            else
            {
                $_SESSION["msg"] = "Account already exists";
                header("Location: signup.php");    
            }
        }
        else 
        {
            header("Location: signup.php");  
        }
    }
    else {
        header("Location: signup.php");  ;
    }
?>