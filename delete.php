<?php

//header("Content-type: application/json");
$data = json_decode(file_get_contents('php://input'));

//$fp = fopen('log.txt', 'a');
//fwrite($fp, $data);
//
//$mysqli = new mysqli('127.0.0.1', 'root', '', 'employees');
//
//$fp = fopen('log.txt', 'a');
//fwrite($fp, $data);
//
//$mysqli->query("DELETE FROM `employees` WHERE id = {$data->id}");
//
//$response = [
//    'id' => $data->id,
//];
//
//echo json_encode($response);