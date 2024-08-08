<?php
include 'mysqli.php';
header("Content-type: application/json");

$data = json_decode(file_get_contents('php://input'));

//
//
//

//

$mysqli = getMysqli();
$id = htmlspecialchars(strip_tags($mysqli->real_escape_string($data->id)));
$sql = "SELECT * FROM `employees` WHERE id = '{$id}'";
$result = $mysqli->query($sql);

$id = null;
$name = 'ошибка';
$surname = 'ошибка';
$position = 'ошибка';
$salary = 'ошибка';

foreach ($result as $row) {
    $id = $row['id'];
    $name = $row['name'];
    $surname =  $row['surname'];
    $position =  $row['position'];
    $salary =  $row['salary'];
}

$response = [
    'id' => $id,
    'name' => $name,
    'surname' => $surname,
    'position' => $position,
    'salary' => $salary,
];

//$str = $name . $surname . $position . $salary;
//$fp = fopen('log.txt', 'a');
//fwrite($fp, $data);
//die();


echo json_encode($response);