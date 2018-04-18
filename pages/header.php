<?php
require_once __DIR__ . '/bootstrap.php';
session_start();
$name = $_SESSION['name'];

if(is_admin()){
	$adminmenu = 
	'<button class="dropdown-btn">Library 
      <i class="fa fa-caret-down"></i>
      </button>
     <div class="dropdown-container">
           <a href="strain_form.php">Strain</a>
           <a href="substrate_form.php">Substrate</a>
           <a href="building_form.php">Building</a>
      </div>
      <a href="account_form.php">Create Account</a>
  <button class="dropdown-btn">Farm Schedule
       <i class="fa fa-caret-down"></i>
       </button>
      <div class="dropdown-container">
          <a href="#">Enter New Schedule</a>
          <a href="#">Look At Existing Schedule</a>
      </div>
      <a href="data_analytics.php">Data Analytics</a>
';

echo '
<nav>
    <a href="home.php"><img class="logo" src="../resources/WTF_white.png" alt="WTF"></a>
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
   
      <button class="dropdown-btn">Lab 
      <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-container">
           <a href="plate_form.php">Plates</a>
           <a href="jar_form.php">Jars</a>
           <a href="bag_form.php">Bags</a>
      </div>
      
      <a href="harvest_form.php">Harvest</a>
  	'.$adminmenu.'
   
      <div class="logout">
        <a href="logout.php">Logout</a>
      </div>
      
    </div>
    <script src="nav_script.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    ';
} else if (is_farmer()) {
echo '
<nav>
    <a href="home.php"><img class="logo" src="../resources/WTF_white.png" alt="WTF"></a>
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
   
      <button class="dropdown-btn">Lab 
      <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-container">
           <a href="plate_form.php">Plates</a>
           <a href="jar_form.php">Jars</a>
           <a href="bag_form.php">Bags</a>
      </div>
      
      <a href="harvest_form.php">Harvest</a>
       
      <div class="logout">
        <a href="logout.php">Logout</a>
      </div>
</div>
	<script src="nav_script.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
';
}else {
	header('Location: login.php');
}

