<?php
namespace models;
    session_start();
    include "sql_controller.php";

    // Checks if the update button was clicked
    if(isset($_POST["submit"])) 
    {
        $id = $_SESSION["id"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];

        // Updates user information
        $status = updateMember($id, $fname, $lname, $email);
        if($status) 
        {
            $_SESSION["msg2"] = "Information updated successfully";
            $_SESSION["username"] = $fname . " " . $lname;
            header("location: profile.php");
        }       
        else 
        {
            $_SESSION["msg2"] = "Information update unsuccessful";
            header("location: profile.php");
        }        
    }
    else {
        header("location: profile.php");
    }
?>