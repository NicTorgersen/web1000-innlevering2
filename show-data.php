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
    <title>Vis data - Vedlikeholdsapplikasjon</title>
    <link href="css/main.css" rel="stylesheet">
    <meta charset="utf-8">
</head>
<body>
    <div class="container">
        <header>
            <nav>
                <ul>
                    <li>
                        <a href="./">Forsiden</a>
                    </li>
                    <li>
                        <a href="register-data.php">Registrer data</a>
                    </li>
                    <li class="endre.php">
                        <a href="endre.php">Endre data</a>
                    </li>
                    <li>
                        <a href="delete-data.php">Slett data</a>
                    </li>
                </ul>
            </nav>
        </header>
        <div>
            <h2 class="text-blue">Vis data</h2>
            <h2 class="text-blue">Studenter</h2>
            <table>
                <thead>
                    <tr>
                        <th>Brukernavn</th>
                        <th>Fornavn</th>
                        <th>Etternavn</th>
                        <th>Klassekode</th>
                    </tr>
                </thead>
            <?php
                foreach ($students->getStudents() as $key => $value) {
                    echo "<tr>";
                    echo "<td>" . $value['brukernavn'] . "</td>";
                    echo "<td>" . $value['fornavn'] . "</td>";
                    echo "<td>" . $value['etternavn'] . "</td>";
                    echo "<td>" . $value['klassekode'] . "</td>";
                    echo "</tr>";
                }
            ?>
            </table>
            <h2 class="text-blue">Klasser</h2>
            <table>
                <thead>
                    <tr>
                        <th>Klassekode</th>
                        <th>Klassenavn</th>
                    </tr>
                </thead>
                <tbody>
            <?php
                foreach ($classes->getClasses() as $key => $value) {
                    echo "<tr>";
                    echo "<td>" . $value['klassekode'] . "</td>";
                    echo "<td>" . $value['klassenavn'] . "</td>";
                    echo "</tr>";
                }

            ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>