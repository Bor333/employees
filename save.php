<?php
include 'mysqli.php';
$data = json_decode(file_get_contents('php://input'));

$mysqli = getMysqli();

$response = [
    'id' => htmlspecialchars(strip_tags($mysqli->real_escape_string($data->id))),
    'name' => htmlspecialchars(strip_tags($mysqli->real_escape_string($data->name))),
    'surname' => htmlspecialchars(strip_tags($mysqli->real_escape_string($data->surname))),
    'position' => htmlspecialchars(strip_tags($mysqli->real_escape_string($data->position))),
    'salary' => htmlspecialchars(strip_tags($mysqli->real_escape_string( $data->salary)))
];
//

$sql = "UPDATE `employees` SET `name`='{$data->name}',`surname`='{$data->surname}',`position`='{$data->position}',`salary`='{$data->salary}' WHERE id = '{$data->id}'";

//$fp = fopen('log.txt', 'a');
//fwrite($fp, $sql);

$result = $mysqli->query($sql);

header("Content-type: application/json");
echo json_encode($response);