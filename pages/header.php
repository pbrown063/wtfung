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
      <div class="dropdown">
        <div class="dropdown">
          <button onclick="myFunction()" class="dropbtn">Library</button>
          <div id="myDropdown" class="dropdown-content">
            <a href="strain_form.php">Strain</a>
            <a href="substrate_form.php">Substrate</a>
            <a href="building_form.php">Building</a>
          </div>
        </div>
      </div>
    </div>
    
    <script src="nav_script.js" type="text/javascript"></script>
    ';
