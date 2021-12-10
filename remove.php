<?php

namespace models;
    session_start();
    include "sql_controller.php";

    // Checks if delete account button was clicked
    if(isset($_POST["submit"])) 
    {
        $id = $_SESSION["id"];

        // Gets member data from database
        $record = getMemberInfo($_SESSION['id']);

        $fname = $record[0]["fname"];
        $lname = $record[0]["lname"];
        $email = $record[0]["email"];

        // Deletes and archives user account
        $status = removeAndArchive($id, $fname, $lname, $email);
        // If delete query was successful
        if($status) 
        {
            session_destroy();
            unset($_SESSION['username']);
            unset($_SESSION['id']);
            $_SESSION["msg"] = "Account deleted successfully";
            
            header("location: login.php");
        }       
        else 
        {
            $_SESSION["msg"] = "Delete unsuccessful unsuccessfully";
            header("location: profile.php");
        }        
    }
    else 
        header("location: profile.php");
?>