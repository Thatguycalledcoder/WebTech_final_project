<?php

namespace models;

    require "./models/CRUD.php";

    //Inserts data into Fan table
    function addMember($fname, $lname, $email, $password) 
    {
        $crud = new CRUD;
        $request = $crud->addMember($fname, $lname, $email, $password);

        if($request) 
            return true;
        else
            return false;
    }

    // Gets user details
    function validateRegistration($fname, $lname, $email, $password) 
    {
        $crud = new CRUD;
        $request = $crud->checkMember($fname, $lname, $email, $password);

        if($request) 
        {
            $posts = array();
            while($record = $crud->fetch())
            {
                $posts[] = $record;
            }
            return $posts;
        }
        else
            return false;
    }

    //Gets user details based on login information
    function validateLogin($email, $password) 
    {
        $crud = new CRUD;   
        $request = $crud->validateMember($email, $password);

        if($request){
            $posts = array();
            while($record = $crud->fetch()){
                $posts[] = $record;
            }
            return $posts;
        }else{
            return false;
        }

    }

    // Updates user details
    function updateMember($id, $fname, $lname, $email) 
    {
        $crud = new CRUD;
        $request = $crud->updateMemberInfo($id, $fname, $lname, $email);

        if($request) 
            return true;
        else
            return false;
    }

    // Gets player data from database
    function getPlayerData() 
    {
        $crud = new CRUD;
        $request = $crud->playerData();

        if($request){
            $posts = array();
            while($record = $crud->fetch()){
                $posts[] = $record;
            }
            return $posts;
        }else{
            return false;
        }
    }

    // Gets incoming transfer data from database
    function getIncomingTransferData() 
    {
        $crud = new CRUD;
        $request = $crud->incomingTransfersData();

        if($request){
            $posts = array();
            while($record = $crud->fetch()){
                $posts[] = $record;
            }
            return $posts;
        }else{
            return false;
        }
    }

    // Gets outgoing transfer data from database 
    function getOutgoingTransferData() 
    {
        $crud = new CRUD;
        $request = $crud->outgoingTransfersData();

        if($request){
            $posts = array();
            while($record = $crud->fetch()){
                $posts[] = $record;
            }
            return $posts;
        }else{
            return false;
        }
    }

    // Deletes user data and archives it
    function removeAndArchive($id, $fname, $lname, $email)
    {
        $crud = new CRUD;
        $request = $crud->getPassword($id);

            if($request)
            {
                $posts = array();
                while($record = $crud->fetch())
                    $posts[] = $record;
                
                $password = $posts[0]["fan_password"];
                $request2 = $crud->deleteMember($id);

            if($request2)
            {
            
                $request3 = $crud->archiveData($id, $fname, $lname, $email, $password);
                if($request3)
                    return true;
                else 
                    return false;
            }
            else
                return false;
        }
        else
            return false;
    }

    // Gets user details based on id
    function getMemberInfo($id)
    {
        $crud = new CRUD;
        $request = $crud->getInfo($id);

        if($request){
            $posts = array();
            while($record = $crud->fetch()){
                $posts[] = $record;
            }
            return $posts;
        }else{
            return false;
        }
    }

    // Checks if user details are in the archive
    function checkArchive($fname, $lname, $email, $password) 
    {
        $crud = new CRUD;
        $request = $crud->getArchiveInfo($fname, $lname, $email, $password);

        if($request) 
        {
            $posts = array();
            while($record = $crud->fetch())
            {
                $posts[] = $record;
            }
            return $posts;
        }
        else
            return false;
    }

    // Deletes user data from archives
    function removeArchiveData($fname, $lname, $email, $password) 
    {
        $crud = new CRUD;
        $request = $crud->deleteArchiveData($fname, $lname, $email, $password);

        if($request) 
            return true;
        else
            return false;
    }

    // Gets data on all staff in Analysis Department
    function getAnalysisData() 
    {
        $crud = new CRUD;
        $request = $crud->analysisDetails();

        if($request) 
        {
            $posts = array();
            while($record = $crud->fetch())
            {
                $posts[] = $record;
            }
            return $posts;
        }
        else
            return false;
    }

    // Gets data on all staff in Coaching Department
    function getCoachingData() 
    {
        $crud = new CRUD;
        $request = $crud->coachingDetails();

        if($request) 
        {
            $posts = array();
            while($record = $crud->fetch())
            {
                $posts[] = $record;
            }
            return $posts;
        }
        else
            return false;
    }

    // Gets data on all staff in Registrar Department
    function getRegistrarData() 
    {
        $crud = new CRUD;
        $request = $crud->registrarDetails();

        if($request) 
        {
            $posts = array();
            while($record = $crud->fetch())
            {
                $posts[] = $record;
            }
            return $posts;
        }
        else
            return false;
    }

    // Gets data on all staff in Scouting Department
    function getScoutingData() 
    {
        $crud = new CRUD;
        $request = $crud->scoutingDetails();

        if($request) 
        {
            $posts = array();
            while($record = $crud->fetch())
            {
                $posts[] = $record;
            }
            return $posts;
        }
        else
            return false;
    }

    // Gets data on all staff in Marketing Department
    function getMarketingData() 
    {
        $crud = new CRUD;
        $request = $crud->marketingDetails();

        if($request) 
        {
            $posts = array();
            while($record = $crud->fetch())
            {
                $posts[] = $record;
            }
            return $posts;
        }
        else
            return false;
    }