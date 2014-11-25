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
    <title>Vedlikeholdsapplikasjon</title>
    <link href="css/main.css" rel="stylesheet">
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
                    <li class="dashed">
                        <a href="">Endre data</a>
                    </li>
                    <li>
                        <a href="delete-data.php">Slett data</a>
                    </li>
                </ul>
            </nav>
        </header>
        <div>
            <h2 class="text-blue">Velkommen til vedlikeholdsapplikasjonen.</h2>
            <p>Det er <strong><?php echo $students->countStudents(); ?></strong> studenter og <strong><?php echo $classes->countClasses(); ?></strong> klasser registrert.</p>
        </div>
    </div>

</body>
</html>