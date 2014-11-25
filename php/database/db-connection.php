<?php
    require_once(dirname(__FILE__)."/../config.php");
    $user = $config["db"]["username"];
    $pass = $config["db"]["password"];
    $db = new PDO('mysql:host=localhost;dbname=884608;charset=utf8', $user, $pass);