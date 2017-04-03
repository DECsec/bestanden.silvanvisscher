<?php
 // extract the filename
 $title = basename($_SERVER['SCRIPT_FILENAME'], '.php');
 // replace dashes with whitespace
 $title = str_replace('_', ' ', $title);
 // check if the file is index, if so assign 'home' to the title instead of index
 if (strtolower($title) == 'index') {
 $title = 'bestanden - Silvan Visscher';
 }
 if (strtolower($title) == 'info') {
 $title = 'info - Silvan Visscher';
 }
 if (strtolower($title) == 'werk') {
 $title = 'werk - Silvan Visscher';
 }
 if (strtolower($title) == 'resume') {
 $title = 'resume - Silvan Visscher';
 }
 // capitalize all words
 $title = ucwords($title);
?>
