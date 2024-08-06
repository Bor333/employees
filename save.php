<?php

$data = json_decode(file_get_contents('php://input'));

//
//
//
$response = [
    'id' => $data->id,
    'name' => $data->name,
    'surname' => $data->surname,
    'position' => $data->position,
    'salary' => $data->salary,
];
//

$mysqli = new mysqli('127.0.0.1', 'root', '', 'employees');
$sql = "UPDATE `employees` SET `name`='{$data->name}',`surname`='{$data->surname}',`position`='{$data->position}',`salary`='{$data->salary}' WHERE id = '{$data->id}'";

$fp = fopen('log.txt', 'a');
fwrite($fp, $sql);

$result = $mysqli->query($sql);

header("Content-type: application/json");
echo json_encode($response);