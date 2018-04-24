<?php
session_start();
session_unset();
session_destroy();

setcookie("authorized",  "", time() -3600);
setcookie("email", "", time() -3600);

//setcookie("PHPSESSID", "", time() -3600);

header('Location: login.php');
?>

