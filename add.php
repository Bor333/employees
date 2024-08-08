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
    'name' =>  htmlspecialchars(strip_tags($mysqli->real_escape_string($data->name))),
    'surname' => htmlspecialchars(strip_tags($mysqli->real_escape_string($data->surname))),
    'position' => htmlspecialchars(strip_tags($mysqli->real_escape_string($data->position))),
    'salary' => htmlspecialchars(strip_tags($mysqli->real_escape_string($data->salary))),
];

header("Content-type: application/json");
echo json_encode($response);
