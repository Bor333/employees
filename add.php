<?php

$data = json_decode(file_get_contents('php://input'));
//
//
//
$response = [
    'name' => $data->name,
    'surname' => $data->surname,
    'position' => $data->position,
    'salary' => $data->salary,
];
//
//header("Content-type: application/json");
//echo json_encode($response);
$mysqli = new mysqli('127.0.0.1', 'root', '', 'employees');

//$fp = fopen('log.txt', 'a');
//fwrite($fp, $data);

$result = $mysqli->query("INSERT INTO `employees`(`name`, `surname`, `position`, `salary`) 
VALUES ('{$response['name']}','{$response['surname']}','{$response['position']}', {$response['salary']})");


