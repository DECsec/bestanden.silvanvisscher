<?php
session_start();
?>
<?php include('functions.php'); ?>
<!DOCTYPE html>
<html lang="nl">
<head>
<?php include('title.php'); ?>
<title><?php echo "$title" ?></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="font/css/fontello.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Droid+Sans:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" media="screen">
</head>
<body>
<div class="navbar">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> 
    <a class="brand"><img src="img/user/user.jpg" width="50px" height="50px"></a>
      <ul class="nav nav-collapse pull-right">
        <li><a href="index.php"><i class="icon-user"></i>Terug</a></li>
      </ul>
      <div class="nav-collapse collapse"></div>
    </div>
  </div>
</div>
<div class="container home">
  <div id="inloggen">

  <?php

  if (empty($_SESSION['gebruikersnaam'])) {

  echo "<script>
            setTimeout(function(){window.location.href='index.php'},0);    //0seconden
        </script>"; } else {

  include('dbconfig.php');

  $gebruikersnaam = $_SESSION['gebruikersnaam'];
  $sql = "SELECT admin FROM gebruiker WHERE gebruikersnaam = '$gebruikersnaam'";

  $result = $mysqli->query($sql);
  $row = $result->fetch_assoc();

  $admin = htmlentities($row ['admin']);

  if ($admin == 1) {
    echo "<h2>Gebruiker toevoegen</h2>";
    echo '<div class="modal-body">
             <form onsubmit=style="visibility:hidden;" name="regformulier" method="post" action="">
              <label class="w3-label w3-validate">Gebruikersnaam:</label>
              <input required class="w3-input" type="text" name="gebruikersnaam" placeholder="Gebruikersnaam"><br>

              <label class="w3-label w3-validate">Wachtwoord:</label>
              <input required class="w3-input" type="password" pattern=".{4,}" title="Minimaal 4 karakters" name="wachtwoord" placeholder="Wachtwoord"><br>

              <label class="w3-label w3-validate">Naam:</label>
              <input required class="w3-input" type="text" name="naam" placeholder="Naam"><br>

              <label class="w3-label w3-validate">Admin:</label>
              <input class="w3-input" type="number" name="admin" placeholder="0 = nee, 1 = ja"><br>

              <button id="reg" class="btn btn-large" type="submit">Gebruiker toevoegen</button><br>
             </form>
           </div> ';

      include("dbconfig.php");

      if(isset($_POST)) {

      if (empty($_POST['gebruikersnaam'])
          OR empty($_POST['wachtwoord'])
          OR empty($_POST['naam']))
      {
      echo "De gegevens zijn niet volledig ingevuld!<br>";
      } else {
          $gebruikersnaam = $_POST['gebruikersnaam'];
          $wachtwoord = $_POST['wachtwoord'];
          $naam = $_POST['naam'];
          $admin = $_POST['admin'];

          $hash1 = hash("sha512", $wachtwoord);
          $hash2 = hash("sha512", $hash1);
          $wachtwoordhash = hash("sha256", $hash2);

          $sql = "INSERT INTO gebruiker (gebruikersnaam, wachtwoord, naam, admin)
                  VALUES ('$gebruikersnaam','$wachtwoordhash', '$naam', '$admin')";

          if($mysqli->query($sql))
          {
            print("<h1>Account is aangemaakt.</h1");
          } else {
            print("Er is een fout opgetreden. Geen gegevens toegevoegd. $sql");
          };
      } } } else {
      echo "<script>
                setTimeout(function(){window.location.href='index.php'},0);    //0seconden
            </script>";
      }
      }

          ?>
            </div>
          </div>
        </div>

        <div class="footer" href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
          <div class="container">
            <p class="pull-left"><a>Copyright &#9400 2017</a></p>
            <p class="pull-right"><a href="#myModal" role="button" data-toggle="modal"> <i class="icon-mail"></i>CONTACT</a></p>
          </div>
        </div>
        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel"><i class="icon-mail"></i> Contact Me</h3>
          </div>
          <div class="modal-body">
            <form action="bedankt.php" method="POST">
              <input type="text" placeholder="Naam">
              <input type="text" placeholder="Email">
              <input type="text" placeholder="Onderwerp">
              <textarea rows="3" style="width:80%"></textarea>
              <br>
              <a>
              <button type="submit" class="btn btn-large"><i class="icon-paper-plane"></i> SUBMIT</button>
            </form>
          </div>
        </div>
<script src="js/jquery-1.10.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
$('#myModal').modal('hidden')
</script>
</body>
</html>
