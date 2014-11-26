<!DOCTYPE html>
<html>
  <head>
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
                        <a href="register-data.php">Registrer data</a>
                    </li>
                    <li>
                        <a href="show-data.php">Vis data</a>
                    </li>
                    <li>
                        <a href="delete-data.php">Slett data</a>
                    </li>
                </ul>
            </nav>
        </header>
		  <form>
<h2 class="text-blue">Gjør endringer</h2>

<br>
<input type="radio" name="valg" value="student" onclick="window.open('endre-student.php')" /> Endre student
<br>

<br>
<input type="radio" name="valg" value="klasse" onclick="window.open('endre-klasse.php')" /> Endre klasse
<br>
</form>


        </div>
 

   </body>
</html>