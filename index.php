<?php
    require_once('php/database/db-connection.php');
    require_once('php/database/utils.php');
    $utils = new Utils($db);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Vedlikeholdsapplikasjon</title>
    <link href="css/main.css" rel="stylesheet">
</head>
<body>
    
    <header>
        <nav>
            <ul>
                <li>
                    <a href="register-data.php">Registrer data</a>
                </li>
                <li class="dashed">
                    <a href="">Vis data</a>
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
        <p>Velkommen til vedlikeholdsapplikasjonen.</p>
        <p>Det er <?php echo $utils->countStudents(); ?> studenter og <?php echo $utils->countClasses(); ?> klasser registrert.</p>
    </div>

</body>
</html>