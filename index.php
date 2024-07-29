<?php
include "config.php";

$mysqli = getDb();

$result = $mysqli->query("SELECT * FROM `employees`")->fetch_all();

foreach ($result as $item) {
    var_dump($item);
    echo "<br>";
}

