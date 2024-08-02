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
    <script src="add.js" defer></script>
    <script src="delete.js" defer></script>
</head>
<body>
<h1>Список сотрудников</h1>
<ul>
    <?php foreach ($result as $item): ?>
        <li style="list-style-type: none" data-id="<?= ($item['id']) ?>">
            <h3><?= ($item['name']) ?> <?= ($item['surname']) ?></h3>
            <p>Должность: <?= ($item['position']) ?></p>
            <p>Зарплата: <?= ($item['salary']) ?></p>
            <form method="post" enctype="multipart/form-data">
                <input hidden type="text" class="update-name">
                <input hidden type="text" class="update-surname">
                <input hidden type="text" class="update-position">
                <input hidden type="text" class="update-salary">
                <input type="submit" class="update" value="Внести правки">
            </form>
            <br>
            <form method="post" enctype="multipart/form-data">
                <input type="submit" class="delete" value="Уволить" data-id="<?= ($item['id']) ?>">
            </form>
        </li>
    <?php endforeach; ?>
</ul>
<h3>Нанять сотрудника</h3>
<form method="post" enctype="multipart/form-data">
    <input type="text" id="add-name" value="Борис"> имя<br><br>
    <input type="text" id="add-surname" value="Шайблер"> фамилия<br><br>
    <input type="text" id="add-position" value="PHP разработчик"> должность<br><br>
    <input type="text" id="add-salary" value="60000"> зарплата<br><br>
    <input type="submit" id="add" value="Нанять">
</form>
</body>
</html>
