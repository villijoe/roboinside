<?php

/**
 * Created by PhpStorm.
 * User: Orion
 * Date: 12.03.2016
 * Time: 10:59
 */
class List_Users
{
    function __construct(IConnect_DB $conn) {
        $query = 'SELECT email FROM users';
        $stmt = $conn->getData($query);
        $stmt->execute();
        $answer = '<ul>';
        foreach($stmt as $row) {
            $answer .= '<li>'.$row['email'].'</li>';
        }
        $answer .= '</ul>';
        $arr = array('answer' => $answer, 'back' => 'back');
        echo json_encode($arr);
    }
}