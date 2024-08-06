<?php

$data = json_decode(file_get_contents('php://input'));

//
//
//
$getAddedId = [
    'id' => $data->id,
];
//

//$mysqli = new mysqli('127.0.0.1', 'root', '', 'employees');

$fp = fopen('log.txt', 'a');
fwrite($fp, $data);


header("Content-type: application/json");
die();
//echo json_encode($getAddedId);
