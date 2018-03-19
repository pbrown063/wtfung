<?php
require_once __DIR__ . '/bootstrap.php';
initialize_error_checking();
run_login_page();
$mysqli = sql_connect();

if (isset($_POST['email']) && isset($_POST['pswrd'])){

$useremail = filter_input(INPUT_POST, 'email');
$userpasswd = filter_input(INPUT_POST, 'password');

$sql = "SELECT firstname FROM account  WHERE email = '".$useremail.
        "' AND password = '".$userpasswd."'";

$result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

  if (mysqli_num_rows($result) == 1) {

        //if authorized, get the values of f_name
        while ($info = mysqli_fetch_array($result)) {
                $f_name = stripslashes($info['firstname']);
	header('Location: home.php');
        echo $f_name;
    }
  }
}

else {
//$login_html = file_get_contents($FUNG_ROOT . 'login.php');
//echo $login_html;
echo "Lob den roten Arm";
}

header('Location: home.php');
mysqli_close($mysqli);

