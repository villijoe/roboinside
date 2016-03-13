<?php

/**
 * Created by PhpStorm.
 * User: Orion
 * Date: 11.03.2016
 * Time: 18:57
 */


class Auth_User
{
    private $arr;
    private $json;

    public function check_user(IConnect_DB $conn, $email, $password) {
        $query = 'SELECT * FROM users WHERE email=?';
        $stmt = $conn->getData($query);
        $stmt->execute(array($email));
        foreach($stmt as $row){
            if ($password == $row['password']) {
                $this->arr =  array('answer' => 'Вошел', 'cookie' => $email);
                return true;
            } else { return false; }
        }
        return false;
    }

    public function getArray(){
        return $this->arr;
    }

    public function setJSON(array $arr){
        $this->json = json_encode($arr);
    }

    public function getJSON(){
        return $this->json;
    }
}