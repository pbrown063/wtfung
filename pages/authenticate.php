<?php
require_once __DIR__ . '/bootstrap.php';
initialize_error_reporting();
$mysqli = sql_connect();

if (isset($_POST['email']) && isset($_POST['password'])){

$useremail = filter_input(INPUT_POST, 'email');
$userpasswd = filter_input(INPUT_POST, 'password');

$sql = "SELECT firstname FROM account  WHERE email = '".$useremail.
	"' AND password = '".$userpasswd."'";
	
$result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
$f_name = stripslashes($info['firstname']);


  if (mysqli_num_rows($result) >= 1) { 
	while ($info = mysqli_fetch_array($result)) {
                $f_name = stripslashes($info['firstname']); 
		session_start();
		$_SESSION['name'] = $f_name;
       	         header('Location: home.php');
		}
  } else {
	header('Location: login.php');
}

mysqli_close($mysqli);
}
