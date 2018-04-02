<?php
require_once __DIR__ . '/bootstrap.php';

if (isset($_POST['email']) && isset($_POST['password'])){
  $mysqli = sql_connect();
  $useremail = filter_input(INPUT_POST, 'email');
  $userpasswd = filter_input(INPUT_POST, 'password');

  $sql = "SELECT firstname FROM account  WHERE email = '".$useremail.
      "' AND password = '".$userpasswd."'";
  $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

  if (mysqli_num_rows($result) >= 1) {
    session_start();
    $_SESSION['email'] = $useremail;
    header('Location: home.php');

  } else {
    header('Location: login.php');
  }
  mysqli_close($mysqli);
}
