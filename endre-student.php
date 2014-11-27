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
                        ?>
                        <form method="POST" action="">
                            <tr>
                                <td><input type="submit" name="endre" value="Oppdater"></td>
                                <td><?php echo $student['brukernavn']; ?></td>
                                <td><input type="text" name="fornavn" value="<?php echo $student['fornavn']; ?>"></td>
                                <td><input type="text" name="etternavn" value="<?php echo $student['etternavn']; ?>"></td>
                                <td>
                                    <select name="klassekode">
                                        <?php
                                        foreach($classes->getClasses() as $key => $class) {
                                            if ($student['klassekode'] == $class['klassekode']) {
                                        ?>
                                            <option selected value="<?php echo $class['klassekode'] ?>"><?php echo $class['klassekode']; ?></option>
                                        <?php
                                            } else {
                                        ?>
                                            <option value="<?php echo $class['klassekode'] ?>"><?php echo $class['klassekode'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <input type="hidden" name="brukernavn" value="<?php echo $student['brukernavn']; ?>">
                        </form>
                        <?php
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