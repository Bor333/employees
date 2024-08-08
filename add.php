<?php
include 'mysqli.php';
$data = json_decode(file_get_contents('php://input'));

//
//
//
//
$mysqli = getMysqli();


//$fp = fopen('log.txt', 'a');
//fwrite($fp, $data);

$result = $mysqli->query("INSERT INTO `employees`(`name`, `surname`, `position`, `salary`)
VALUES ('{$data->name}','{$data->surname}','{$data->position}', '{$data->salary}')");

$response = [
    'id' => $mysqli->insert_id,
    'name' => $data->name,
    'surname' => $data->surname,
    'position' => $data->position,
    'salary' => $data->salary,
];

header("Content-type: application/json");
echo json_encode($response);
