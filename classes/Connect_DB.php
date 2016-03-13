<?php

/**
 * Created by PhpStorm.
 * User: Orion
 * Date: 12.03.2016
 * Time: 11:01
 */
class Connect_DB implements IConnect_DB
{
    private $pdo = null;

    function __construct() {
        $this->pdo = new PDO("mysql:host=localhost;dbname=roboinside", "root", "") or die("fuck");
    }

    function getPDO() {
        return $this->pdo;
    }

    function getData($query) {
        $stmt = $this->pdo->prepare($query);
        return $stmt;
    }

}