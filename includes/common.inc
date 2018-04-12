<?php

/**
 * Header block for error reports.
 * Used whenever bootstrap.inc is called.
 **/
function initialize_error_reporting() {
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
}

/**
 * Fairly rigid, currently connects with only one set of creds.
 * Main point with this function is to include connection error block.
 **/
function sql_connect($sql_host = 'localhost', $sql_user = 'root', $sql_pass = NULL, $main_db = 'emp') {
  $SQL_DEFAULT_PASS = '3f27fc9c7267b6bce64feb42a636e748ee6ef0639b102550'; // Poor security!
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
 * Finds where the directory with the same name as the site name is and returns the path to it.
 */
function find_site_root($site_name = 'wtfung') {
  $cwd = getcwd();
  $root_path = substr($cwd, 0, strpos($cwd, $site_name) + strlen($site_name));
  if ($root_path == $site_name)
    return $root_path;
}

/**
 * @return bool
 *
 * Adds a new account to the database.
 * This contains the entire script so there are no arguments.
 */
function add_new_account() {
  if (isset($_POST['Fname']) && isset($_POST['Lname'])
    && isset($_POST[strtolower('email')]) && isset($_POST['pswrd'])) {

    $mysqli = sql_connect();

    $firstname = filter_input(INPUT_POST, 'Fname');
    $lastname = filter_input(INPUT_POST, 'Lname');
    $newemail = filter_input(INPUT_POST, 'email');
    $pswrd = filter_input(INPUT_POST, 'pswrd');
    $sql = "SELECT email FROM account WHERE email = '" . $newemail . "'";
    $result = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

    if (mysqli_num_rows($result) >= 1) {
      echo "This email is already in use!";
      return FALSE;
    }
    else {
      $sqli = "INSERT INTO account (firstname, lastname, email, password)"
        . "VALUES('$firstname', '$lastname', '$newemail', '$pswrd')";
      $result = mysqli_query($mysqli, $sqli) or die(mysqli_error($mysqli));
      mysqli_close($mysqli);
      return TRUE;
    }
  }
}

/**
 * Creates and prints a form dropdown called @strain
 * that is generated from the strains library.
 */
function display_strains(){

  $mysqli = sql_connect();
  $strain = "SELECT common_name FROM strains_library";
  $sql = mysqli_query($mysqli, $strain) or die(mysqli_error($mysqli));

  echo " <select name='strain' required>
        <option value='' disabled selected hidden> Select Strain Code</option>";
  while ($row = $sql->fetch_assoc()){
    echo "<option value='" .$row["common_name"]. "'>" . $row["common_name"] . "</option>";
  }
  echo "</select>";
  mysqli_close($mysqli);
}

/**
 *displays strain codes as drop down
 */
function display_strain_code(){
  echo"Select Strain Code";
  echo" <select name='code'>";
  $mysqli = sql_connect();

  $substrate = "SELECT strain_code FROM strains_library";

  $sql = mysqli_query($mysqli, $substrate) or die(mysqli_error($mysqli));

  while ($row = $sql->fetch_assoc()){
    echo "<option value='". $row['strain_code']. "'>" . $row['strain_code'] . "</option>";
  }
  echo "</select>";
  echo "<br><br>";
  mysqli_close($mysqli);
}

/**
 * Creates a current date function
 */
function current_date(){
  $date = date("Y-m-j");
  echo $date;
}

/**
 * Creates and prints a form dropdown called @substrate
 * that is generated from the substrate library.
 */
function display_substrate(){
  echo "Select substrate:";
  $mysqli = sql_connect();
  $substrate = "SELECT substrate_type FROM substrate_library";
  $sql = mysqli_query($mysqli, $substrate) or die(mysqli_error($mysqli));

  echo " <select name='substrate' required>
        <option value='' disabled selected hidden> Select Substrate Type</option>";
  while ($row = $sql->fetch_assoc()){
    echo "<option value='" .$row["substrate_type"]. "'>" . $row["substrate_type"] . "</option>";
  }
  echo "</select>";
  mysqli_close($mysqli);
}

/**
 * Creates and prints a form dropdown called @phase
 * that is generated from the phase library.
 */
function display_phase(){
  $mysqli = sql_connect();
  $phase = "SELECT phase_name FROM phase_library";
  $sql = mysqli_query($mysqli, $phase) or die(mysqli_error($mysqli));

  echo " <select name='phase' required>
        <option value='' disabled selected hidden> Select Phase</option>";
  while ($row = $sql->fetch_assoc()){
    echo "<option value='" .$row["phase_name"]. "'>" . $row["phase_name"] . "</option>";
  }
  echo "</select>";
  mysqli_close($mysqli);
}

/**
 * Creates and prints a form dropdown called @account
 * that is generated from the phase library.
 */
function display_account(){
  $mysqli = sql_connect();
  $account = "SELECT firstname, lastname FROM account";
  $sql = mysqli_query($mysqli, $account) or die(mysqli_error($mysqli));

  echo " <select name='account' required>
        <option value='' disabled selected hidden> Select Worker</option>";
  while ($row = $sql->fetch_assoc()){
    echo "<option value='" .$row["firstname"]. "'>" .$row["firstname"]. " " .$row["lastname"]."</option>";
  }
  echo "</select>";
  mysqli_close($mysqli);
}

/**
 * Creates a table spit out of the plates
 */
function plate_table(){
  $mysqli = sql_connect();
  $plate = "SELECT * FROM plates WHERE plate_count >= 1";
  $sql = mysqli_query($mysqli, $plate) or die(mysqli_error($mysqli));

  echo '
    <table>
      <thead>
        <tr>
            <th>id</th>
            <th>strain code</th>
            <th>plate number</th>
            <th>generation</th>
            <th>creation date</th>
        </tr>
      </thead>
      <tbody> ';
  while ($row = $sql->fetch_assoc()) {
    echo '
       <tr>
          <td>' . $row["plate_id"] . '</td>
          <td>' . $row["strain_code"] . '</td>
          <td>' . $row["plate_count"] . '</td>
          <td>' . $row["generation"] . '</td>
          <td>' . $row["creation_date"] . '</td>
       </tr>';
  }
  echo '</tbody>
    </table>
';
  mysqli_close($mysqli);
}

/**
 * looks at the cookie set in authenticate.php to
 * check if its brian or another farmer
 **/
function whos_logged_in(){
  session_start();
  $brians_value = 2;

  if(isset($_COOKIE[$useremail]) = 'bcallow@gmail.com'){
    setcookie($cookie_email, $brians_value);
  }
}
