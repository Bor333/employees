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
    <title>Трудоустройство</title>
    <script src="ajax.js" defer></script>
</head>
<body>
<h1>Список сотрудников</h1>
<ul>
    <?php foreach ($result as $item): ?>
        <li style="list-style-type: none">
            <p>Имя: <?= ($item['name']) ?></p>
            <p>Фамилия: <?= ($item['surname']) ?></p>
            <p>Должность: <?= ($item['position']) ?></p>
            <p>Зарплата: <?= ($item['salary']) ?></p>
            <hr>
        </li>
    <?php endforeach; ?>
</ul>
<h3>Нанять сотрудника</h3>
<form method="post" enctype="multipart/form-data">
    <p>Имя: <input type="text" id="add-name"></p>
    <p>Фамилия: <input type="text" id="add-surname"></p>
    <p>Должность: <input type="text" id="add-position"></p>
    <p>Зарплата: <input type="text" id="add-salary"></p>
    <input type="submit" id="add">
</form>
</body>
</html>
