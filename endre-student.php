<?php
    require_once('php/database/db-connection.php');
    require_once('php/database/studentModel.php');
    require_once('php/database/classModel.php');

    $students = new StudentModel($db);
    
    $classes = new ClassModel($db);


if (isset($_POST['endre'], $_POST['fornavn'], $_POST ['etternavn'], $_POST ['klassekode'], $_POST['brukernavn'])){
    $students->updateStudent ($_POST['brukernavn'], $_POST ['fornavn'], $_POST ['etternavn'], $_POST ['klassekode']);

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
            
            <h2 class="text-blue">Endre Student</h2>
            <a href="endre.php">Tilbake</a>
            
            
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
                        foreach ($students->getStudents() as $key => $student)  {
                            echo '<form method = "POST" action ="" >';
                            echo '<tr>'.PHP_EOL;
                            echo '<td> <input type= "submit" name ="endre" value ="endre"> </td>'.PHP_EOL;
                            echo '<td>' . $student['brukernavn'] . '</td>'.PHP_EOL;
                            echo '<td><input type="text" name="fornavn" value="' . $student['fornavn'] . '"></td>'.PHP_EOL;
                            echo '<td><input type="text" name="etternavn" value="' . $student['etternavn'] . '"></td>'.PHP_EOL;
                            //echo '<td><input type="text" name="klassekode" value="' . $class['klassekode'] . '"></td>'.PHP_EOL;
                           echo '<select name="klassekode">';
                           foreach ($classes as $key => $class) {
                            echo '<td><option value="' . $class['klassekode'] . '">' . $class['klassenavn'] . '></td></option>'.PHP_EOL;
                            }
                            echo '</form>';
                            echo '<td><select>';
                            echo '</select></td>';
                            echo '</tr>'.PHP_EOL;
                            echo '<input type="hidden" name="brukernavn" value="' . $student['brukernavn'] . '">'.PHP_EOL;
                
                        }
                        ?>
                    </tbody>
                </table>
                
                
</div>
    
                
          
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