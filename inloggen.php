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
        <li><a href="inloggen.php"><i class="icon-user"></i>Inloggen</a></li>
      </ul>
      <div class="nav-collapse collapse"></div>
    </div>
  </div>
</div>
<div class="container home">
  <div id="inloggen">

  <?php
  if (empty($_SESSION['gebruikersnaam'])) {
    echo "<h2>Je moet inloggen om deze pagina te bezoeken</h2>";

              include("dbconfig.php");

                function inLoggen(){
                return $_SESSION['gebruikersnaam'];
                }

              //checken of de POST ingevuld is
              if (isset($_POST['gebruikersnaam'])){

                $gebruikersnaam = $_POST['gebruikersnaam'];
                $wachtwoord = $_POST['wachtwoord'];

                $hash1 = hash("sha512", $wachtwoord);
                $hash2 = hash("sha512", $hash1);
                $wachtwoordhash = hash("sha256", $hash2);

                //in database zoeken naar ingevulde gegevens
                $sql = "SELECT * FROM gebruiker WHERE gebruikersnaam='$gebruikersnaam' AND wachtwoord='$wachtwoordhash' LIMIT 1";

                  $result = $mysqli->query($sql);

                  $num_rows = $result->num_rows;

                //checken of er een match is
                  if(($num_rows) == 1){

                  inLoggen();

                  $_SESSION['gebruikersnaam'] = $gebruikersnaam;

                    echo '<script type="text/javascript">';
                    echo 'alert("Je bent ingelogd!")';
                    echo '</script>';
                    echo "<script>
                              setTimeout(function(){window.location.href='index.php'},0);    //0seconden
                          </script>";
                        exit();
                      } else {
                        echo "Verkeerde gegevens ingevuld <br><br>";
                        echo "<a class='btn btn-large' href=''>Opnieuw</a>" ;
                        exit();
                  }
              } else {
                echo '';
              }

    ?>
               <tr>
               <div class="modal-body">
                 <form method="post" action="inloggen.php">
                    <label>Gebruikersnaam:</label><br>
                    <input required type="text" name="gebruikersnaam" placeholder="Gebruikersnaam"/><br><br>
                    <label>Wachtwoord:</label><br>
                    <input required type="password" name="wachtwoord" placeholder="Wachtwoord"/> <br><br>
                 <button class="btn btn-large" id="reg" type="submit" name="submit">Inloggen</button>
                 </form>
                </div>
            </div>
          </div>
          <?php
            } else {
                echo "<script>
                        setTimeout(function(){window.location.href='index.php'},0);    //5seconden
                      </script>";} ?>

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
