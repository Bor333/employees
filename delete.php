<?php

header("Content-type: application/json");
$data = json_decode(file_get_contents('php://input'));


$mysqli = new mysqli('127.0.0.1', 'root', '', 'employees');
//

$sql = "DELETE FROM `employees` WHERE id = {$data->id}";
$fp = fopen('log.txt', 'a');
fwrite($fp, $sql);

//$mysqli->query($sql);

//
$response = [
    'id' => $data->id,
];

echo json_encode($response);