<?php

require "./models/CRUD.php";

class UserTest extends \PHPUnit\Framework\TestCase
{
    // Testing login
    public function testforRegistration() 
    {
        $crud = new models\CRUD;

        $password = base64_encode("derdanson221");

        $status = $crud->addMember("Derrick", "Danson", "derson@gmail.com", $password);

        $this->assertEquals($status, true);
    }

    // Testing for Existing account
    public function testforExistingAccount() 
    {
        $crud = new models\CRUD;

        $password = base64_encode("derdanson221");

        $status = $crud->validateMember("Derrick", "Danson", "derson@gmail.com", $password);

        $this->assertEquals($status, true);
    }

    // Testing query for player data
    public function testforPlayerDataOutput() 
    {
        $crud = new models\CRUD;

        $password = base64_encode("derdanson221");

        $status = $crud->playerData();

        $this->assertEquals($status, true);
        return var_dump($crud->fetch()); 
    }
}
?>