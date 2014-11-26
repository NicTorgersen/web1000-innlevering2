<?php
require_once('php/database/classModel.php');
require_once('php/database/db-connection.php');

$classes = new ClassModel($db);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Endre klasse Data - Vedlikeholdsapplikasjon</title>
    <link href="css/main.css" rel="stylesheet">
    <meta charset="utf-8">
</head>
<body>
    <div class="container">
        <header>
            <nav>
                <ul>
                    <li>
                        <a href="./">Tilbake</a>
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
            <h2>Endre klasser</h2>
            
            <form method="POST" action="php/register-data.php">
                <fieldset class="register-class">
                    <legend>Endre klassekode</legend>
                    <div>
                        <label for="classcode">Gammel klassekode</label>
                        <input type="text" id="classcode" name="classcode" placeholder="IS1" pattern="{3,3}" minlength="3" maxlength="3" title="Kun 2 bokstaver og ett tall" required>
                    </div>
                    <div>
                        <label for="classname">Ny klassekode</label>
                        <input type="text" id="classname" name="classname" placeholder="IS2" pattern="{2,30}" minlength="2" maxlength="30" title="Mellom 2 og 30 bokstaver og tall" required>
                    </div>
                    <div>
                        <input type="submit" name="submit" value="Endre">
                    </div>
                </fieldset>
                <input type="hidden" name="type" value="0">
                
            </form>

            <form method="POST" action="php/register-data.php">
                <fieldset class="register-class">
                    <legend>Endre klassenavn</legend>
                    <div>
                        <label for="classcode">Gammelt klassenavn</label>
                        <input type="text" id="classcode" name="classcode" placeholder="Informasjonssystemer 1. år" pattern="{3,3}" minlength="3" maxlength="3" title="Kun 2 bokstaver og ett tall" required>
                    </div>
                    <div>
                        <label for="classname">Nytt klassenavn</label>
                        <input type="text" id="classname" name="classname" placeholder="Informasjonssystemer 2. år" pattern="{2,30}" minlength="2" maxlength="30" title="Mellom 2 og 30 bokstaver og tall" required>
                    </div>
                    <div>
                        <input type="submit" name="submit" value="Endre">
                    </div>
                </fieldset>
                <input type="hidden" name="type" value="0">
                
            </form>

        
                </fieldset>
                <input type="hidden" name="type" value="1">
            </form>
        </div>
    </div>

</body>
</html>