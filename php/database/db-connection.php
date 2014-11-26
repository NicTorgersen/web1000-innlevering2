<?php
    require_once(dirname(__FILE__)."/../config.php");
    $user = $config["db"]["username"];
    $pass = $config["db"]["password"];
    $dbName = $config["db"]["dbname"];
    $host = $config["db"]["host"];
    $db = new PDO('mysql:host=' . $host . ';dbname=' . $dbName . ';charset=utf8', $user, $pass);