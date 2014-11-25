<?php

require_once('php/database/db-connection.php');
require_once('php/database/studentModel.php');
require_once('php/database/classModel.php');

$students = new StudentModel($db);
$classes = new ClassModel ($db);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Vedlikeholdsapplikasjon</title>
    <link href="css/main.css" rel="stylesheet">
    <meta charset="utf-8">
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
            <p class="text-blue">Studenter</p>
          
            <?php
                foreach ($students->getStudents() as $key => $value) {
                    echo $value["fornavn"] . " " . $value["etternavn"] . "<br>";
                }
            ?>
               <p class="text-blue">Klasser</p>
            <?php
                foreach ($classes->getClasses() as $key => $value) {
                   echo $value["klassekode"] . " " . $value["klassenavn"] . "<br>";
                }

            ?>
        </div>
    </div>
</body>
</html>