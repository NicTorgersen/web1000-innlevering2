<?php
require_once('php/database/classModel.php');
require_once('php/database/db-connection.php');

$classes = new ClassModel($db);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registrer Data - Vedlikeholdsapplikasjon</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <meta charset="utf-8">
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
                        <a href="show-data.php">Vis data</a>
                    </li>
                   <li class="endre.php">
                        <a href="endre.php">Endre data</a>
                    </li>
                    <li>
                        <a href="delete-data.php">Slett data</a>
                    </li>
                </ul>
            </nav>
        </header>
        <div>
            <h2 class="text-blue">Registrer data</h2>
            <p>Registrer data her</p>
            <form method="POST" action="php/register-data.php">
                <fieldset class="register-class">
                    <legend>Registrer ny klasse</legend>
                    <div>
                        <label for="classcode">Klassekode</label>
                        <input type="text" id="classcode" name="classcode" placeholder="IS1" pattern="{3,3}" minlength="3" maxlength="40" title="Minst 3 bokstaver, og ett tall på slutten." required>
                    </div>
                    <div>
                        <label for="classname">Klassenavn</label>
                        <input type="text" id="classname" name="classname" placeholder="Informasjonssystemer 1. år" pattern="{2,30}" minlength="2" maxlength="30" title="Mellom 2 og 30 bokstaver og tall" required>
                    </div>
                    <div>
                        <input type="submit" name="submit" value="Registrer">
                    </div>
                </fieldset>
                <input type="hidden" name="type" value="0">
                
            </form>

            <form method="POST" action="php/register-data.php">
                <fieldset class="register-student">
                    <legend>Registrer ny student</legend>
                    <div>
                        <label for="username">Brukernavn</label>
                        <input type="text" id="username" name="username" placeholder="gb" pattern="{2,2}" minlength="2" maxlength="2" title="Kun 2 bokstaver" required>
                    </div>
                    <div>
                        <label for="firstname">Fornavn</label>
                        <input type="text" id="firstname" name="firstname" placeholder="Jonas" pattern="{2,20}" minlength="2" maxlength="20" title="Mellom 2 og 20 bokstaver" required>
                    </div>
                    <div>
                        <label for="lastname">Etternavn</label>
                        <input type="text" id="lastname" name="lastname" placeholder="Jonasson" pattern="{2,20}" minlength="2" maxlength="20" title="Mellom 2 og 20 bokstaver" required>
                    </div>
                    <div>
                        <label for="student_classcode">Klassekode</label>
                        <select id="student_classcode" name="student_classcode">
                            <?php
                                foreach ($classes->getClassCodes() as $key => $cc) {
                                    echo "<option value='" . $cc[0] . "'>";
                                    echo $cc[0];
                                    echo "</option>";
                                }
                            ?>
                        </select>
                    </div>
                    <div>
                        <input type="submit" name="submit" value="Registrer">
                    </div>
                </fieldset>
                <input type="hidden" name="type" value="1">
            </form>
        </div>
    </div>

</body>
</html>