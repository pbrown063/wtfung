<?php

require_once __DIR__ . '/bootstrap.php';

session_start();
if (isset($_SESSION['name'])) {
  $name = $_SESSION['name'];
}

if($_COOKIE['authorized'] == 5409){
  echo get_header_menu($name, TRUE);
}
else if ($_COOKIE["authorized"] == 5301) {
  echo get_header_menu($name);
}
else {
  header('Location: login.php');
}

