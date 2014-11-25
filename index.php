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
    <div class="container">
        <?php
            require_once('php/extras/header.html');
        ?>
        <div>
            <h2 class="text-blue">Velkommen til vedlikeholdsapplikasjonen.</h2>
            <p>Det er <strong><?php echo $utils->countStudents(); ?></strong> studenter og <strong><?php echo $utils->countClasses(); ?></strong> klasser registrert.</p>
        </div>
    </div>

</body>
</html>