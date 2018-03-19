<?php

/**
  * Test function, fill in with tests
**/
function test_fun() {
  echo $TEST_VAR;
  echo 'more fun';
}

/**
  * Function call to run the login script.
**/
function run_login_page($FUNG_ROOT) {
  require_once $FUNG_ROOT . '/pages/login.php';
}

/**
  * Header block for error reports.
**/
function initialize_error_reporting() {
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  session_start();
}

/**
  * 
  *
  *
  *
**/
function employeePrint() {

    $mysqli = sql_connect(); 
	
	if($mysqli){
 
        $emp = "SELECT firstname, lastname FROM emp";
 
        $result = mysqli_query($mysqli, $emp) or die(mysqli_error($mysqli));
 
        $empArray = mysqli_fetch_all($result, MYSQLI_ASSOC); //gets all employees in a big array
        if (mysqli_num_rows($result) > 0) {
            foreach ($empArray as $row) {
                $display_block = $display_block . "<option value='" . $row["emp"] . "'>" . $row["emp"] . "</option>";
            }
        } else {
            $display_block = "<option value='error'>No Employees</option>";
        }
        mysqli_free_result($result);
        mysqli_close($mysqli);
        return $display_block;
    }
}

/**
  *
  *
  *
  *
**/
function phasePrint() {

    $mysqli = sql_connect(); 
	
	if($mysqli){
 
        $phase = "SELECT phaseName FROM phaseLibrary";
 
        $result = mysqli_query($mysqli, $phase) or die(mysqli_error($mysqli));
 
        $phaseArray = mysqli_fetch_all($result, MYSQLI_ASSOC); //gets all phases in a big array
        if (mysqli_num_rows($result) > 0) {
            foreach ($phaseArray as $row) {
                $display_block = $display_block . "<option value='" . $row["phase"] . "'>" . $row["phase"] . "</option>";
            }
        } else {
            $display_block = "<option value='error'>No Phases</option>";
        }
        mysqli_free_result($result);
        mysqli_close($mysqli);
        return $display_block;
    }
}

/**
  *
  *
  *
  *
**/

function substratePrint() {

    $mysqli = sql_connect(); 
	
	if($mysqli){
 
        $substrate = "SELECT SubstrateType FROM substrateLibrary";
 
        $result = mysqli_query($mysqli, $substrate) or die(mysqli_error($mysqli));
 
        $substrateArray = mysqli_fetch_all($result, MYSQLI_ASSOC); //gets all phases in a big array
        if (mysqli_num_rows($result) > 0) {
            foreach ($substrateArray as $row) {
                $display_block = $display_block . "<option value='" . $row["substrate"] . "'>" . $row["substrate"] . "</option>";
            }
        } else {
            $display_block = "<option value='error'>No Substrates</option>";
        }
        mysqli_free_result($result);
        mysqli_close($mysqli);
        return $display_block;
    }
}

/**
  * Fairly rigid, currently connects with only one set of creds.
  * Main point with this function is to include connection error block.
**/
function sql_connect($sql_host = 'localhost', $sql_user = 'root', $sql_pass = NULL, $main_db = 'emp') {
	$SQL_DEFAULT_PASS = '3f27fc9c7267b6bce64feb42a636e748ee6ef0639b102550';
	if ($sql_pass == NULL) {
		$sql_pass = $SQL_DEFAULT_PASS;
	}
	
	$mysqli = mysqli_connect($sql_host, $sql_user, $sql_pass, $main_db);

    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit();
    }
return $mysqli;
}

/**
  * Finds where the wtfung directory is and returns the path to it
**/
function find_site_root($site_name) {
  $cwd = getcwd();
  $root_path = substr($cwd, 0, strpos($cwd, $site_name) + strlen($site_name));
  return $root_path;
}

/**
 * Adds a new employee (user) to the database
 */
function add_new_employee() {
    $mysqli = sql_connect();
    if (isset($_POST['Fname']) && isset($_POST['Lname'])
        && isset($_POST[strtolower('email')]) && isset($_POST['pswrd'])){

        $firstname = filter_input(INPUT_POST,'Fname');
        $lastname = filter_input(INPUT_POST,'Lname');
        $newemail = filter_input(INPUT_POST,'email');
        $pswrd = filter_input(INPUT_POST,'pswrd');
        if (!empty($firstname) && !empty($lastname) && !empty($newemail) && !empty($pswrd)) {
            $sql = "INSERT INTO emp (firstname, lastname, email, reg_date, password)"
                . "VALUES('$firstname', '$lastname', '$newemail', NOW(), '$pswrd')";
            $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
        }
        return TRUE;
    }

    else {
        echo "SOMETHING WENT TERRIBLEY WRONG!";
        return FALSE;
    }
}
/**
*
* See the users firstname when thier loging in 
**/
function see_login_employee() {
$mysqli = sql_connect();
initialize_error_reporting();

$email = filter_input(INPUT_POST,'email');
$password = filter_input(INPUT_POST, 'password');

if (isset($_POST['email']) && isset($_POST['password'])){

$sql = "SELECT firstname FROM account WHERE email = ".filter_input(INPUT_POST,'email$"' AND password = "."PASSWORD('".filter_input(INPUT_POST,'password$"')

$result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
}
return TRUE;
echo 'firstname';
echo "HAIL HYDRA!!!!!";
 header("Location: page2.php");
}
else{
echo "Lob den roten Arm";
return FALSE;
}
}

