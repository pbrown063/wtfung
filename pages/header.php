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
  $protected_page = 'data_analytics.php'
//  $protected_pages = [
//      'data_analytics.php',
//      'strain_form.php',
//      'substrate_form.php',
//      'building_form.php',
//      'account_form.php',
//      'lineandshade.php',
//      'balloon.php',
//      '3dpie.php',
//  ];

  if ($page == $protected_page) {
    header('Location: home.php');
  }
  foreach($protected_pages as $value) {
    if ($page == $protected_pages) {
      header('Location: home.php');
    }
  }
  echo get_header_menu($name);
}
else {
  header('Location: login.php');
}

