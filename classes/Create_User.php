<?php

/**
 * Created by PhpStorm.
 * User: Orion
 * Date: 12.03.2016
 * Time: 10:59
 */
class Create_User
{
    private $json;

    function __construct(IConnect_DB $conn, $email, $password) {
        $check = new Auth_User();
        if ($check->check_user($conn, $email, $password) != false) {
            $this->json = json_encode(['answer' => 'Занят']);
        } else {
            $query = 'INSERT INTO users(email, password) VALUES (?, ?)';
            $stmt = $conn->getData($query);
            $stmt->execute(array($email, $password));
            if ($stmt) {
                $this->json = json_encode(['answer' => 'Создан']);
            }
        }
    }

    public function getJSON(){
        return $this->json;
    }
}