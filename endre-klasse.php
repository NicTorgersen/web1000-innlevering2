<?php
    require_once('php/database/db-connection.php');
    require_once('php/database/studentModel.php');
    require_once('php/database/classModel.php');

    $students = new StudentModel($db);
    $classes = new ClassModel($db);


if (isset($_POST['update'], $_POST['klassekode'], $_POST['klassenavn'], $_POST['hidden'])){
    $UpdateQuery = "UPDATE klasse SET klassekode='klassekode', Klassenavn='klassenavn' WHERE klassekode='hidden'";
    $db = new PDO('mysql:host=localhost;dbname=884604', $user, $pass);
    $stmt = $db->prepare($UpdateQuery);
    $stmt->execute(array($_POST['klassekode'], $_POST['klassenavn'], $_POST['hidden']));

    mysql_connect("username", "password");
    mysql_query("update klasse set klassenavn = $klassenavn where klassekode = $klassekode")
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
            
            <h2 class="text-blue">Endre klasser</h2>
            
            <form method="POST" action="endre-klasse.php">
                <div>
        <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Klassekode</th>
                            <th>Klassenavn</th>
                        </tr>
                    </thead> 
                    <tbody>
                        <?php
                        foreach ($classes->getClasses() as $key => $class) {
                            echo '<tr>'.PHP_EOL;
                            echo '<td></td>'.PHP_EOL;
                            echo '<td>' . $class['klassekode'] . '</td>'.PHP_EOL;
                            echo '<td><input type="text" name="klassenavn" value="' . $class['klassenavn'] . '"></td>'.PHP_EOL;
                            echo '<input type="hidden" name="hidden" value=" '. $class['klassekode'] . '">'.PHP_EOL;
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






