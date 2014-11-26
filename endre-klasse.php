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
                        <a href="register-data.php">Registrer data</a>
                    </li>
                    <li>
                        <a href="show-data.php">Vis data</a>
                    </li>
                  
                    <li>
                        <a href="./">Forsiden</a>
                    </li>
                </ul>
            </nav>
        </header>

        <div>
            
            <h2 class="text-blue">Endre klasser</h2>
            
            <form method="POST" action="php/delete-data.php">
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
                            echo '<td><input class="deleteClass" type="radio" name="deleteClass[]" value="' . $class['klassekode'] . '"></td>'.PHP_EOL;
                            echo '<td>' . "<input type=text name=klassekode value=" . $class['klassekode'] . '</td>'.PHP_EOL;
                            echo '<td>' . "<input type=text name=klassenavn value=" . $class['klassenavn'] . '</td>'.PHP_EOL;
                            echo '</tr>'.PHP_EOL;
                        }
                        ?>

                    </tbody>
                </table>
                 <input type="submit" name="submit" value="Endre">
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






