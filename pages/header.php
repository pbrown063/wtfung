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
  echo get_header_menu($name);
  echo basename($_SERVER['PHP_SELF']);
}
else {
  header('Location: login.php');
}

