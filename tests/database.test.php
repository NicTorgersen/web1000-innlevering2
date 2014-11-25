<?php
    /*
        enkel test for databasefunksjoner
    */
    require_once('../php/database/utils.php');
    require_once('../php/database/db-connection.php');

    $utils = new Utils($db);
    $classCodes = $utils->getClassCodes();
    foreach ($classCodes as $key => $value) {
        echo "<pre>";
        var_dump($value[0]);
        echo "</pre>";
    }