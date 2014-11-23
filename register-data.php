<?php
require_once('php/database/utils.php');
require_once('php/database/db-connection.php');

$utils = new Utils($db);
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
        <a href="/web1000-innlevering2"><button>Forsiden</button></a>
        <form method="POST" action="php/register-data.php">
            <fieldset class="register-class">
                <legend>Registrer ny klasse</legend>
                <div>
                    <label for="classcode">Klassekode</label>
                    <input type="text" id="classcode" name="classcode" placeholder="Eksempelvis: IS1">
                </div>
                <div>
                    <label for="classname">Klassenavn</label>
                    <input type="text" id="classname" name="classname" placeholder="Eksempelvis: Informasjonssystemer 1. år">
                </div>
                <div>
                    <input type="submit" name="submit" value="Registrer">
                </div>
            </fieldset>
            <input type="hidden" name="type" value="0">
            
        </form>

        <form>
            <fieldset class="register-student">
                <legend>Registrer ny student</legend>
                <div>
                    <label for="username">Brukernavn</label>
                    <input type="text" id="username" name="username" placeholder="Eksempelvis: gb">
                </div>
                <div>
                    <label for="username">Fornavn</label>
                    <input type="text" id="username" name="username" placeholder="Eksempelvis: Jonas">
                </div>
                <div>
                    <label for="username">Etternavn</label>
                    <input type="text" id="username" name="username" placeholder="Eksempelvis: Jonasson">
                </div>
                <div>
                    <label for="username">Klassekode</label>
                    <select>
                        <?php
                            foreach ($utils->getClassCodes() as $key => $value) {
                                echo "<option value='" . $value[0] . "'>";
                                echo $value[0];
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

</body>
</html>