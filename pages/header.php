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
  redirect_if_protected(basename($_SERVER['PHP_SELF']));
  echo get_header_menu($name);
}
else {
  header('Location: login.php');
  echo "HELLO!";
}
