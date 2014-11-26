<?php
    require_once('php/database/db-connection.php');
    require_once('php/database/studentModel.php');
    require_once('php/database/classModel.php');

    $students = new StudentModel($db);
    $classes = new ClassModel($db);


if (isset($_POST['update'], $_POST['fornavn'], $_POST['etternavn'], $_POST['hidden'], $_POST['klassekode'])){
$UpdateQuery = "UPDATE student SET fornavn='fornavn', etternavn='etternavn', klassekode='klassekode' WHERE brukernavn='hidden'";
$db = new PDO('mysql:host=localhost;dbname=884604', $user, $pass);
$stmt = $db->prepare($UpdateQuery); 
var_dump($stmt->fetch(PDO::FETCH_ASSOC));
$stmt->execute(array($_POST['fornavn'], $_POST['etternavn'], $_POST['klassekode'], $_POST['hidden']));
};
?>
<!DOCTYPE html>
<html>
<head>
    <title>Endre data - Vedlikeholdsapplikasjon</title>
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
                        <a href="./">Forsiden</a>
                    </li>
                    <li>
                        <a href="register-data.php">Registrer data</a>
                    </li>
                    <li>
                        <a href="show-data.php">Vis data</a>
                    </li>
                    <li>
                        <a href="endre.php">Endre data</a>
                    </li>
                </ul>
            </nav>
        </header>

        <div>
            
            <h2 class="text-blue">Endre tudenter</h2>
            
            <form method="POST" action="endre-student.php">
                <div>
        <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Brukernavn</th>
                            <th>Fornavn</th>
                            <th>Etternavn</th>
                            <th>Klassekode</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($students->getStudents() as $key => $student) {
                            echo '<tr>'.PHP_EOL;
                            echo '<td></td>'.PHP_EOL;
                            echo '<td>' . $student['brukernavn'] . '</td>'.PHP_EOL;
                            echo '<td><input type="text" name="fornavn" value="' . $student['fornavn'] . '"></td>'.PHP_EOL;
                            echo '<td><input type="text" name="etternavn" value="' . $student['etternavn'] . '"></td>'.PHP_EOL;
                            echo '<td><input type="text" name="klassekode" value="' . $student['klassekode'] . '"></td>'.PHP_EOL;
                            echo '<input type="hidden" name="hidden" value=" '. $student['brukernavn'] . '">'.PHP_EOL;
                            echo '</tr>'.PHP_EOL;
                        }
                        ?>
                    </tbody>
                </table>
                <input type="submit" name="update" value="update"
                
</div>
    
                
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






