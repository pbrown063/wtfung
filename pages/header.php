<?php
require_once __DIR__ . '/bootstrap.php';
session_start();
$name = $_SESSION['name'];

echo '
<nav>
    <img class="logo" src="../resources/WTF_white.png" alt="WTF">
    <div id="myMenubutton" class="menuButton">
      <div class="bar1"></div>
      <div class="bar2"></div>
      <div class="bar3"></div>
    </div>
    <div class="nameplate">
         '.$name.' 
    </div>
  </nav>
  
    <div id="mySidenav" class="sidenav">
      <a href="lab_form.php">Lab</a>
      <a href="harvest.php">Harvest</a>
      <a href="#">Green House</a>
      <a href="#">Schedule</a>
      <a href="#">Library</a>
    </div>
    <script src="nav_script.js" type="text/javascript"></script>
    ';


