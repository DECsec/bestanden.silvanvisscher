<?php
session_start();
?>
<?php
if (empty($_SESSION['gebruikersnaam'])) {
    echo "<script>
          setTimeout(function(){window.location.href='inloggen.php'},0);    //5seconden
          </script>";} else {
?>
<?php include('dbconfig.php'); ?>
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
    <a class="brand" href="index.php"><img src="img/user/user.jpg" width="50px" height="50px"></a>
      <ul class="nav nav-collapse pull-right">
        <li><a href="uitloggen.php"><i class="icon-user"></i>Uitloggen</a></li>
      </ul>
      <div class="nav-collapse collapse"></div>
    </div>
  </div>
</div>
<div class="container home">
  <div class="span3"> <img src="img/dl.png" alt="" style="border-radius:50px;" width="100%"></div>
  <div class="span5">
    <h1>Bestanden</h1>
    <p>Op deze pagina kun je bepaalde bestanden downloaden!</p>
    <h2>Games</h2>
    <table border="0" style="width:100%">
      <tr>
        <td>GTA San Andreas</td>
        <td></td>
        <td><a href="files/GTASA.zip" download="GTASA.zip"><i class="icon-download"></i>Download</a></td>
      </tr>
      <tr>
        <td>Age of Mythology The Titans</td>
        <td></td>
        <td><a href="files/AOMT.zip" download="AOMT.zip"><i class="icon-download"></i>Download</a></td>
      </tr>
      <tr>
        <td>Age of Empires II</td>
        <td></td>
        <td><a href="files/AOE2.zip" download="AOE2.zip"><i class="icon-download"></i>Download</a></td>
      </tr>
    </table>
    <h2>Films</h2>
    <table border="0" style="width:100%">
      <tr>
        <td>Film AFilm AFilma filmaFilml</td>
        <td></td>
        <td><a href="files/GTASA.zip" download="GTASA.zip"><i class="icon-download"></i>Download</a></td>
      </tr>
      <tr>
        <td>Film B</td>
        <td></td>
        <td><a href="files/AOMT.zip" download="AOMT.zip"><i class="icon-download"></i>Download</a></td>
      </tr>
      <tr>
        <td>Film C</td>
        <td></td>
        <td><a href="files/AOE2.zip" download="AOE2.zip"><i class="icon-download"></i>Download</a></td>
      </tr>
    </table>
    <br>
      <?php userOptions(); ?>
  </div>
</div>
<div class="row social">
  <ul class="social-icons">
    <li><a href="#"><img src="img/fb.png" alt=""></a></li>
    <li><a href="#"><img src="img/tw.png" alt=""></a></li>
    <li><a target="_blank" href="https://www.youtube.com/watch?v=dQw4w9WgXcQ"><img src="img/dr.png" alt=""></a></li>
  </ul>
</div>
<div class="footer" href="css/bootstrap-responsive.css" rel="stylesheet" type="text/css">
  <div class="container">
    <p class="pull-left"><a>Copyright &#9400 2017 </a></p>
    <p class="pull-left"><a><?php admin() ?></a></p>
    <p class="pull-right"><a href="#myModal" role="button" data-toggle="modal"> <i class="icon-mail"></i>CONTACT</a></p>
  </div>
</div>
<script src="js/jquery-1.10.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>
$('#myModal').modal('hidden')
</script>
</body>
</html>

<?php } ?>
