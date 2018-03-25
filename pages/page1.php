<?php
        
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

//check for required fields from the form
if ((!filter_input(INPUT_POST, 'email'))
   || (!filter_input(INPUT_POST, 'password'))) {
//if ((!isset($_POST["username"])) || (!isset($_POST["password"]))) {
	header("Location: index.html");
	exit;
}

$mysqli = mysqli_connect("localhost", "root", "Okanagan$1", "emp");

//create and issue the query
$sql = "SELECT firstname FROM emp WHERE email = '".filter_input(INPUT_POST,'email').
                    "' AND password = "."PASSWORD('".filter_input(INPUT_POST,'password')."');";
$result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

if (mysqli_num_rows($result) == 1) {
   
    while ($info = mysqli_fetch_array($result)) {
		$name = stripslashes($info['name']);
                                
	}  
        //create query to find username
        $name = "SELECT firstname FROM emp WHERE email = '"filter_input(INPUT_POST,'email')"';";
	
        //set authorization cookie
	setcookie("auth", "1");
        $_SESSION['username'] = $name;

	//redirect to Services Page
        header("Location: page2.php");
} else {
	//redirect back to login form if not authorized
	header("Location: index.html");
	exit;
}
