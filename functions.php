<?php

  function login(){

  if (empty($_SESSION['gebruikersnaam'])) { echo '';}  else { echo 'Bestanden';

    include('dbconfig.php');

    $gebruikersnaam = $_SESSION['gebruikersnaam'];
    $sql = "SELECT admin FROM gebruiker WHERE gebruikersnaam = '$gebruikersnaam'";

    $result = $mysqli->query($sql);
    $row = $result->fetch_assoc();

    $admin = htmlentities($row ['admin']);
    }
  }

  function admin(){

  if (empty($_SESSION['gebruikersnaam'])) { echo '';}

  else {

  include('dbconfig.php');

  $gebruikersnaam = $_SESSION['gebruikersnaam'];
  $sql = "SELECT admin, naam FROM gebruiker WHERE gebruikersnaam = '$gebruikersnaam'";

  $result = $mysqli->query($sql);
  $row = $result->fetch_assoc();

  $admin = htmlentities($row ['admin']);
  $naam = htmlentities($row ['naam']);

  if ($admin == 1) {echo ' | Je bent ingelogd als admin';}  else {echo' | Je bent ingelogd als '.$naam.''; }

  }
}

function userOptions(){

  include('dbconfig.php');

  $gebruikersnaam = $_SESSION['gebruikersnaam'];
  $sql = "SELECT admin, naam FROM gebruiker WHERE gebruikersnaam = '$gebruikersnaam'";

  $result = $mysqli->query($sql);
  $row = $result->fetch_assoc();

  $admin = htmlentities($row ['admin']);
  $naam = htmlentities($row ['naam']);

  if ($admin == 1) {

   echo '<a href="registreren.php" class="btn btn-large">Gebruiker toevoegen</a>';

   $sql = "SELECT id, gebruikersnaam, admin, naam FROM gebruiker";
   $result = $mysqli->query($sql);

   echo "
        <table border='0'>
        <tr>
          <th>gebruikersnaam</th>
          <th>naam</th>
          <th>admin</th>
          <th></th>
        </tr>";

    while($row = $result->fetch_assoc()){

    $admin = htmlentities($row ['admin']);
    $naam = htmlentities($row ['naam']);
    $gebruikersnaam = htmlentities($row ['gebruikersnaam']);
    $id = htmlentities($row ['id']);

    $url = 'verwijderen.php?id='.$id;

    echo "
              <tr>
                <td>" .$gebruikersnaam. "<br></td>
                <td>" .$naam. "<br></td>
                <td>" .$admin. "<br></td>
                <td><a href='". $url."'>Verwijder gebruiker</a><br></td>
              </tr>";

    }
    echo "</table>";

  } else { echo''; }

  }

?>
