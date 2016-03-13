<?php

/**
 * Created by PhpStorm.
 * User: Orion
 * Date: 12.03.2016
 * Time: 11:47
 */
interface IConnect_DB
{
    function __construct();
    function getPDO();
    function getData($query);
}