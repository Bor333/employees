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
    <title>Сотрудники</title>
    <script src="save.js" defer></script>
    <script src="update.js" defer></script>
    <script src="add.js" defer></script>
    <script src="delete.js" defer></script>
    <link rel="icon" href="favicon.png" type="image/x-icon"/>
</head>
<body>
<h1>Список сотрудников</h1>
<ul>
    <?php foreach ($result as $item): ?>
        <li style="list-style-type: none" data-id="<?= ($item['id']) ?>">
            <h3><span class="item-name"><?= ($item['name']) ?></span><span class="item-surname"> <?= ($item['surname']) ?></span></h3>
            <p class="item-position">Должность: <?= ($item['position']) ?></p>
            <p class="item-salary">Зарплата: <?= ($item['salary']) ?></p>
            <form method="post" enctype="multipart/form-data">
                <input hidden type="text" class="update-name">
                <input hidden type="text" class="update-surname">
                <input hidden type="text" class="update-position">
                <input hidden type="text" class="update-salary">
                <input type="submit" class="update" value="Внести правки" data-id="<?= ($item['id']) ?>">
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
    <input hidden type="text" id="add-id">
    <input type="text" id="add-name"> <label id="name-label">имя</label><br><br>
    <input type="text" id="add-surname"> <label id="surname-label">фамилия</label><br><br>
    <input type="text" id="add-position"> <label id="position-label">должность</label><br><br>
    <input type="text" id="add-salary"> <label id="salary-label">зарплата</label><br><br>
    <input type="submit" id="add" value="Нанять">
</form>
</body>
</html>
