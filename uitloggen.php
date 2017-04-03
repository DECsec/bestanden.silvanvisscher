<?php
session_start();
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
      <ul class="nav nav-collapse pull-right">
        <li><a href="uitloggen.php"><i class="icon-user"></i>Uitloggen</a></li>
      </ul>
      <div class="nav-collapse collapse"></div>
    </div>
  </div>
</div>


<?php

 function uitLoggen() {

  $_SESSION['gebruikersnaam'] = FALSE;

  session_destroy();
  }

  if(empty($_SESSION['gebruikersnaam'])){
  echo ("Je bent al uitgelogd!");
  }

  else {
  uitLoggen();

  echo '<script type="text/javascript">';
  echo 'alert("U wordt uitgelogd!")';
  echo '</script>';
  echo "<script>
          setTimeout(function(){window.location.href='index.php'},0000);    //5seconden
      </script>";
};



?>
    </div>
  </body>
</html>
