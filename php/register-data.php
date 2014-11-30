<!DOCTYPE html>
<html>
<head>
    <title>POST...</title>
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <meta charset="utf-8">
</head>
<body>

    <?php
        require_once('database/db-connection.php');
        require_once('database/studentModel.php');
        require_once('database/classModel.php');

        if (isset($_POST['type'], $_POST['submit'])) {

            // variabel $db kommer fra db-connection.php
            $students = new StudentModel($db);
            $classes = new ClassModel($db);
            $type = $_POST['type'];

            switch ($type) {
                case 0:

                    if (isset($_POST['classcode'], $_POST['classname'])) {
                        $utils_ret = $classes->postClass($_POST['classcode'], $_POST['classname']);
                        foreach($utils_ret as $key => $value) {
                            if ($key == 'success') {
                                echo '<span class="success">' . $value . '</span>' . PHP_EOL;
                             } else if ($key == 'error') {
                                echo '<span class="error">' . $value . '</span>' . '<br>' . PHP_EOL;
                            }
                        }
                       echo '<a href="../register-data.php">Tilbake</a>';
                    }

                    break;
                case 1:

                    if (isset($_POST['username'], $_POST['firstname'], $_POST['lastname'], $_POST['student_classcode'])) {
                        $utils_ret = $students->postStudent($_POST['username'], $_POST['firstname'], $_POST['lastname'], $_POST['student_classcode']);
                        foreach ($utils_ret as $key => $value) {
                            if ($key == 'u') {
                                echo 'Brukernavn: ' . $value . PHP_EOL;
                            } else if ($key == 'fn') {
                                echo 'Fornavn: ' . $value . PHP_EOL;
                            } else if ($key == 'ln') {
                                echo 'Etternavn: ' . $value . PHP_EOL;
                            } else if ($key == 's_cc') {
                                echo 'Klassekode: ' . $value . PHP_EOL;
                            } else if ($key == 'success') {
                                echo '<span class="success">' . $value . '</span>';
                            } else if ($key == 'error') {
                                echo '<span class="error">' . $value . '</span>';
                            }
                        } 
                        echo '<a href="../register-data.php">Tilbake</a>';
                    }

                    break;
            }
        }
    ?>

</body>
</html>