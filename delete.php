<?php
$data = json_decode(file_get_contents('php://input'));

$id = $data->id;


//header("Content-type: application/json");
//echo json_encode($response);
$mysqli = new mysqli('127.0.0.1', 'root', '', 'employees');

$fp = fopen('log.txt', 'a');
fwrite($fp, $data);

$result = $mysqli->query("DELETE FROM `employees` WHERE id = {$id}");