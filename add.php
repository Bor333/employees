<?php

$data = json_decode(file_get_contents('php://input'));

$response = [
    'name' => $data->name,
    'surname' => $data->surname,
    'position' => $data->position,
    'salary' => $data->salary,
];

header("Content-type: application/json");
echo json_encode($response);


