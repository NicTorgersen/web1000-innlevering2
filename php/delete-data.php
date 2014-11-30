<?php
    if (isset($_POST['type'], $_POST['submit'])) {

        require_once('database/db-connection.php');

        switch ($_POST['type']) {
            case 0:
                require_once('database/classModel.php');
                $classes = new ClassModel($db);
                $deleteClass = $_POST['deleteClass'];
                if (count($deleteClass) != 0) {
                    $res = $classes->deleteClass($deleteClass);
                    if ($res['error'] == 23000) {
                        echo 'Klassen har studenter, kan ikke slettes.<br>';
                        echo '<a href="../delete-data.php">Tilbake</a>';
                    } else {
                        header('Location: ../delete-data.php');
                    }
                } else {
                    echo 'Vennligst velg noe som skal slettes.';
                    echo '<a href="../delete-data.php">Gå tilbake</a>';
                    //header('Location: ../delete-data.php');
                }
                break;
            case 1:
                require_once('database/studentModel.php');
                $students = new StudentModel($db);
                $deleteStudent = $_POST['deleteStudent'];
                if (count($deleteStudent) != 0) {
                    $students->deleteStudent($deleteStudent);
                    header('Location: ../delete-data.php');
                } else {
                    echo 'Vennligst velg noe som skal slettes.';
                    echo '<a href="../delete-data.php">Gå tilbake</a>';
                }
                break;
        }
    }