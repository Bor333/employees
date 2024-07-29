<?php


function getDb()
{
    $mysqli = new mysqli('127.0.0.1', 'root', '', 'employees');
    return $mysqli;
}