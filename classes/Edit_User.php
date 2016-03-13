<?php

/**
 * Created by PhpStorm.
 * User: Orion
 * Date: 12.03.2016
 * Time: 11:01
 */
class Edit_User
{
    private $json;

    public function __construct($conn, $email, $password){
        $auth = new Auth_User();
        $auth->check_user($conn, $email, $password);

    }

    public function getJSON(){
        return $this->json;
    }
}