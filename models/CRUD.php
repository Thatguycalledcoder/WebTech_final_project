<?php

namespace models;

    require "database_connection.php";

    class CRUD extends Database{ 
        
        //Inserts data into Fan table
        function addMember($fname, $lname, $email, $password) {
            $sql = "INSERT INTO Fans(fname, lname, email, fan_password)
            VALUES ('$fname', '$lname', '$email', '$password')";
            return $this->run_query($sql);
        }

        // Gets user details
        function checkMember($fname, $lname, $email, $password) {
            $sql = "SELECT * FROM Fans 
                    WHERE fname = '$fname' AND lname = '$lname' 
                    AND email = '$email' AND password = '$password'";
            return $this->run_query($sql);
        }

        //Gets user details based on login information
        function validateMember($email, $password) {
            $sql = "SELECT * FROM Fans
                    WHERE email = '$email' AND fan_password = '$password'";   
            return $this->run_query($sql);   
        }

        // Updates user details
        function updateMemberInfo($id, $fname, $lname, $email) {
            $sql = "UPDATE Fans SET 
                    fname = '$fname', lname = '$lname', email = '$email' 
                    WHERE fan_id = '$id'";   
            return $this->run_query($sql);   
        }

        // Gets player data from database
        function playerData() {
            $sql = "SELECT p.player_id ,p.fname, p.lname, p.player_image, s.dunks, s.blocks, s.steals, s.threes, s.baskets, s.assists, s.rating, f.fname AS 'Cfname', f.lname AS 'Clname'
                    FROM Players p, Statistics s, Staff f
                    INNER JOIN Trains t
                    WHERE p.player_id = s.player_id AND p.player_id = t.player_id AND t.coach_id = f.staff_id;";
            return $this->run_query($sql);
        }

        // Gets incoming transfer data from database
        function incomingTransfersData() {
            $sql = "SELECT *
                    FROM Transfers
                    WHERE movement LIKE 'Incoming'";
            return $this->run_query($sql);
        }

        // Gets outgoing transfer data from database
        function outgoingTransfersData() {
            $sql = "SELECT *
                    FROM Transfers
                    WHERE movement LIKE 'Outgoing'";
            return $this->run_query($sql);
        }

        // Deletes user data
        function deleteMember($id) {
            $sql = "DELETE FROM Fans
                    WHERE fan_id = '$id'";
            return $this->run_query($sql);
        }

        // Archives user data
        function archiveData($id, $fname, $lname, $email, $password) {
            $sql = "INSERT INTO Fan_archive
                    VALUES('$id','$fname','$lname','$email','$password')";
            return $this->run_query($sql);
        }

        // Gets user password
        function getPassword($id) {
            $sql = "SELECT fan_password FROM Fans
                    WHERE fan_id = '$id'";
            return $this->run_query($sql);
        }

        // Get user details based on ID
        function getInfo($id) 
        {
            $sql = "SELECT * FROM Fans
            WHERE fan_id = '$id'";
            return $this->run_query($sql);
        }

        // Get information in Fan_archive table
        function getArchiveInfo($fname, $lname, $email, $password) 
        {
            $sql = "SELECT * FROM Fans
                    WHERE fname = '$fname' AND lname = '$lname' 
                    AND email = '$email' AND password = '$password'";
            return $this->run_query($sql);
        }

        // Delete information in Fan_archive data
        function deleteArchiveData($fname, $lname, $email, $password) 
        {
            $sql = "DELETE FROM Fan_archive
                    WHERE fname = '$fname' AND lname = '$lname' 
                    AND email = '$email' AND password = '$password'";
            return $this->run_query($sql);
        }

        // Gets data on all staff in Analysis Department
        function analysisDetails() 
        {
            $sql = "SELECT * FROM Staff
                    WHERE department = 'Analysis'";
            return $this->run_query($sql);
        }

        // Gets data on all staff in Coaching Department
        function coachingDetails() 
        {
            $sql = "SELECT * FROM Staff
                    WHERE department = 'Coaching'";
            return $this->run_query($sql);
        }

        // Gets data on all staff in Registrar Department
        function registrarDetails() 
        {
            $sql = "SELECT * FROM Staff
                    WHERE department = 'Registrar'";
            return $this->run_query($sql);
        }

        // Gets data on all staff in Scouting Department
        function scoutingDetails() 
        {
            $sql = "SELECT * FROM Staff
                    WHERE department = 'Scouting'";
            return $this->run_query($sql);
        }

        // Gets data on all staff in Marketing Department
        function marketingDetails() 
        {
            $sql = "SELECT * FROM Staff
                    WHERE department = 'Marketing'";
            return $this->run_query($sql);
        }
    }
?>