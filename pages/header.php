<?php

require_once __DIR__ . '/bootstrap.php';

session_start();
if (isset($_SESSION['name'])) {
  $name = $_SESSION['name'];
}

if(is_admin()){
  echo get_header_menu($name, TRUE);
}
else if (is_farmer()) {
  $page = basename($_SERVER['PHP_SELF']);
  $protected_pages = [
      'data_analytics.php',
      'strain_form.php',
      'substrate_form.php',
      'building_form.php',
      'account_form.php',
      'lineandshade.php',
      'balloon.php',
      '3dpie.php',
  ];

  foreach($protected_pages as $value) {
    if ($value == $page) {
      header('Location: home.php');
    }
  }
  echo get_header_menu($name);
}
else {
  header('Location: login.php');
}

