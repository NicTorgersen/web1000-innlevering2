<?php
    require_once('php/database/db-connection.php');
    require_once('php/database/studentModel.php');
    require_once('php/database/classModel.php');

    $students = new StudentModel($db);
    $classes = new ClassModel($db);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Slett data - Vedlikeholdsapplikasjon</title>
    <link href="css/main.css" rel="stylesheet">
    <meta charset="utf-8">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
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
                    <li>
                        <a href="show-data.php">Vis data</a>
                    </li>
                    <li class="dashed">
                        <a href="">Endre data</a>
                    </li>
                </ul>
            </nav>
        </header>

        <div>
            <h2 class="text-blue">Slett klasser</h2>
            <p>Obs! Kan ikke slette klasser som har studenter, slett studentene først.</p>
            <form method="POST" action="php/delete-data.php">
                <table>
                    <thead>
                        <tr>
                            <th class="tableCheckBox"><input type="checkbox" class="tableCheckBox" id="checkAllClasses"></th>
                            <th>Klassekode</th>
                            <th>Klassenavn</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($classes->getClasses() as $key => $class) {
                                echo '<tr>';
                                echo '<td><input type="checkbox" name="deleteStudent[]" value="' . $class['klassekode'] . '"></td>';
                                echo '<td>' . $class['klassekode'] . '</td>';
                                echo '<td>' . $class['klassenavn'] . '</td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
                <input type="submit" name="submit" value="Slett klass(er)">
            </form>

            <h2 class="text-blue">Slett studenter</h2>
            <form>
                <table>
                    <thead>
                        <tr>
                            <th class="tableCheckBox"><input type="checkbox" id="checkAllStudents"></th>
                            <th>Brukernavn</th>
                            <th>Fornavn</th>
                            <th>Etternavn</th>
                            <th>Klassekode</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($students->getStudents() as $key => $student) {
                                echo '<tr>';
                                echo '<td><input type="checkbox" name="deleteStudent[] value="' . $student['brukernavn'] . '"></td>';
                                echo '<td>' . $student['brukernavn'] . '</td>';
                                echo '<td>' . $student['fornavn'] . '</td>';
                                echo '<td>' . $student['etternavn'] . '</td>';
                                echo '<td>' . $student['klassekode'] . '</td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
                <input type="submit" name="submit" value="Slett student(er)">
            </form>
        </div>

    </div>

    <script type="text/javascript">
        $("#checkAllClasses").click(function () {
            $('.deleteClass').prop('checked', this.checked);
        });
        $("#checkAllStudents").click(function () {
            $('.deleteStudent').prop('checked', this.checked);
        })
    </script>

</body>
</html>