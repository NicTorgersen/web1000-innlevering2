<?php

require_once('php/database/db-connection.php');
require_once('php/database/studentModel.php');
require_once('php/database/classModel.php');

$students = new StudentModel($db);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Vedlikeholdsapplikasjon</title>
    <link href="css/main.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <header>
            <nav>
                <ul>
                    <li>
                        <a href="./">Tilbake</a>
                    </li>
                    <li>
                        <a href="register-data.php">Registrer data</a>
                    </li>
                    <li class="dashed">
                        <a href="">Endre data</a>
                    </li>
                    <li class="dashed">
                        <a href="">Slett data</a>
                    </li>
                </ul>
            </nav>
        </header>
        <div>
            <h2 class="text-blue">Vis data</h2>
            <p>Her vises dataene.</p>
            <?php
                foreach ($students->getStudents() as $key => $value) {
                    echo $value["fornavn"] . " " . $value["etternavn"] . "<br>";
                }
            ?>
        </div>
    </div>
</body>
</html>