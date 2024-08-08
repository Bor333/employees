<?php
include 'mysqli.php';
$mysqli = getMysqli();
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
    <script src="delete.js" defer></script>
    <script src="save.js" defer></script>
    <script src="update.js" defer></script>
    <script src="add.js" defer></script>
    <link rel="icon" href="favicon.png" type="image/x-icon"/>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="main">
    <div class="employees-list">
        <h2>Список сотрудников</h2>
        <ul>
            <?php foreach ($result as $item): ?>
                <li style="list-style-type: none" data-id="<?= ($item['id']) ?>">
                    <h3><span class="item-name"><?= ($item['name']) ?></span><span class="item-surname"><?= ($item['surname']) ?></span></h3>
                    <p>Должность: <span class="item-position"><?= ($item['position']) ?></span></p>
                    <p>Зарплата: <span class="item-salary"><?=  ($item['salary']) ?></span></p>
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
    </div>
    <div class="add-employee">
        <h2>Нанять сотрудника</h2>
        <form method="post" enctype="multipart/form-data">
            <input hidden type="text" id="add-id">
            <p><input value="Борис" type="text" id="add-name">
                <label class="input-label" id="name-label">имя</label></p>
            <p><input value="Шайблер" type="text" id="add-surname">
                <label class="input-label" id="surname-label">фамилия</label></p>
            <p><input value="PHP-разработчик" type="text" id="add-position">
                <label class="input-label" id="position-label">должность</label></p>
            <p><input value="60000" type="text" id="add-salary">
                <label class="input-label" id="salary-label">зарплата</label></p>
            <input type="submit" id="add" value="Нанять">
        </form>
    </div>
</div>
</body>
</html>
