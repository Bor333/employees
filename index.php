<?php

$mysqli = new mysqli('127.0.0.1', 'root', '', 'employees');

$result = $mysqli->query("SELECT * FROM `employees`");

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Список сотрудников</h1>
<?php foreach ($result as $item): ?>
<p>Имя: <?= ($item['name']) ?></p>
<p>Фамилия: <?= ($item['surname']) ?></p>
<p>Должность: <?= ($item['position']) ?></p>
<p>Зарплата: <?= ($item['salary']) ?></p>
    <hr>
<?php endforeach; ?>
</body>
</html>
