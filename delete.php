<?php
include 'mysqli.php';
header("Content-type: application/json");
$data = json_decode(file_get_contents('php://input'));


$mysqli = getMysqli();
//
$id = htmlspecialchars(strip_tags($mysqli->real_escape_string($data->id)));
$sql = "DELETE FROM `employees` WHERE id = {$data->id}";
//$fp = fopen('log.txt', 'a');
//fwrite($fp, file_get_contents('php://input'));
//die();

$mysqli->query($sql);

$response = [
    'id' => $data->id,
];

echo json_encode($response);