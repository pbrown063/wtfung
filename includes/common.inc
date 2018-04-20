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
 * Creates a current date function
 */
function current_date(){
  $date = date("Y-m-j");
  echo $date;
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
        <option value='' disabled selected hidden> Select Strain Name</option>";
  while ($row = $sql->fetch_assoc()){
    echo "<option value='" .$row["common_name"]. "'>" . $row["common_name"] . "</option>";
  }
  echo "</select>";
  mysqli_close($mysqli);
}

/**
 * Creates and prints a form dropdown called @straincode
 * that is generated from the strain library.
 */
function display_strain_code(){
  $mysqli = sql_connect();
  $substrate = "SELECT strain_code FROM strains_library";
  $sql = mysqli_query($mysqli, $substrate) or die(mysqli_error($mysqli));

  echo" <select name='code' required>
      <option value='' disabled selected hidden> Select Strain Code</option>";
  while ($row = $sql->fetch_assoc()){
    echo "<option value='". $row['strain_code']. "'>" . $row['strain_code'] . "</option>";
  }
  echo "</select>";
  mysqli_close($mysqli);
}

/**
 * Creates and prints a form dropdown called @substrate
 * that is generated from the substrate library.
 */
function display_substrate(){
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
 * Creates and prints a form dropdown called @batch
 * that is generated from the batch table
 */

function display_batches() {
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
 * Creates and prints a form dropdown called @greenhouse
 * that is generated from the building library
 */
function display_greehouse() {
  $mysqli = sql_connect();
  $account = "SELECT id FROM building";
  $sql = mysqli_query($mysqli, $account) or die(mysqli_error($mysqli));

  echo " <select name='greenhouse' required>
 <option value='' disabled selected hidden>Select Greenhouse</option>";
  while ($row = $sql->fetch_assoc()) {
    echo "<option value='".$row["id"]."'>".$row["id"]."</option>";
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
            <th>number of plates</th>
            <th>generation</th>
            <th>creation date</th>
        </tr>
      </thead>
      <tbody>';
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
      </table>';
  mysqli_close($mysqli);
}

/**
 * looks at the email fromauthenticate.php and
 * sets the authorized cookie to either 5409(ADMIN)
 * or 5301(FARMER)
 **/
function get_authorization_level($useremail) {
  session_start();

  if ($useremail == 'bcallow@gmail.com') {
    return 5409;
  }
  else {
    return 5301;
  }
}

/**
 * Graph selector handler returns string with the script that
 * displays the graph selected.
 */

function get_graph_choice($graph) {
  switch ($graph) {

    case '3dpie-graph':
      return '3dpie.php';
      break;

    case 'lineandshade-graph':
      return 'lineandshade.php';
      break;

    case 'balloon-graph':
      return 'balloon.php';
      break;

    default:

      break;
  }
}

/**
 * Displays the graph selected
 */

function display_graph($graph) {
  if (isset($graph)) {
    print '<img class="graph" src="'.$graph.'" alt="Data Graph"/>';
  }
  else {
    print '<h1>Please Choose a Graph</h1>';
  }
}



/**
 * Returns the html string to display the admin menu for the header.
 */
function get_admin_header_menu() {
  $admin_menu =
    '
      <button class="dropdown-btn">Library 
        <i class="fa fa-caret-down"></i>
      </button>
     <div class="dropdown-container">
           <a href="strain_form.php">Strain</a>
           <a href="substrate_form.php">Substrate</a>
           <a href="building_form.php">Building</a>
      </div>
      <a href="account_form.php">Create Account</a>
  
        <button class="dropdown-btn">Farm Schedule
       <i class="fa fa-caret-down"></i>
       </button>
        <div class="dropdown-container">
          <a href="#">Enter New Schedule</a>
          <a href="#">Look At Existing Schedule</a>
        </div>

      <button class="dropdown-btn">Data Analytics
      <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-container">
        <a href="data_analytics.php">Graphs</a>
        <a href="data_analytics_tables.php">Tables</a>
      </div>

';

  return $admin_menu;
}

/**
 * @param $is_admin
 * Returns the html string to display header menu.
 * Result is based on whether the user is an admin.
 */
function get_header_menu($user_name, $is_admin = FALSE) {

  $admin_menu = '';

  if ($is_admin) {
    $admin_menu = get_admin_header_menu();
  }

  $user_menu =
    '
<nav>
    <a href="home.php"><img class="logo" src="../resources/WTF_white.png" alt="WTF"></a>
    <div id="myMenubutton" class="menuButton">
      <div class="bar1"></div>
      <div class="bar2"></div>
      <div class="bar3"></div>
    </div>
    <div class="nameplate">
         '.$user_name.' 
    </div>
  </nav>
  
    <div id="mySidenav" class="sidenav">
   
      <button class="dropdown-btn">Lab 
      <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-container">
           <a href="plate_form.php">Plates</a>
           <a href="jar_form.php">Jars</a>
           <a href="bag_form.php">Bags</a>
      </div>
      
      <a href="harvest_greenhouse_form.php">Harvest</a>
  	'.$admin_menu.'
   
      <div class="logout">
        <a href="logout.php">Logout</a>
      </div>
      
    </div>
    <script src="nav_script.js" type="text/javascript"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    ';

  return $user_menu;

}

/**
 * Returns true if the user is an admin
 **/

function is_admin()
{
  if ($_COOKIE["authorized"] == 5409) {
    return TRUE;
  }
  return FALSE;
}


/**
 * Returns true if the user is valid
 **/

function is_farmer()
{
  if ($_COOKIE["authorized"] == 5301) {
    return TRUE;
  }
  return FALSE;
}

function get_table_choice($table, $start_date, $end_date) {
  switch($table) {

    case 'total-harvest':
      // Query function harvest by date passed in
      return get_total_harvest_by_date($start_date, $end_date);;
      break;

    case 'total-by-greenhouse':
      // Query function by date passed in .. greenhouse sort
      return get_total_harvest_by_greenhouse($start_date, $end_date);
      break;

    case 'total-by-species':
      // Query function by date passed in species ...
      return get_total_harvest_by_species($start_date, $end_date);
      break;

    case 'all-harvests-in-range':
      return get_all_harvest_data_in_range($start_date, $end_date);
    default:
      return 'Please make a valid submission';
      break;

  }
}

/**
 *  returns a html block to be printed
 * containing the total harvest between (inclusive) two dates
 */
function get_all_harvest_data_in_range($start_date, $end_date) {
  $table_string = '';
  $mysqli = sql_connect();
  $harvests = "SELECT * FROM harvest 
                WHERE date>='$start_date' 
                AND date<='$end_date' 
                ORDER BY date;";
  $sql = mysqli_query($mysqli, $harvests) or die(mysqli_error($mysqli));
  $table_string .=
    '
<h3 id="harvest-table-title">All Harvest Data From: ' .$start_date. ' To: ' .$end_date . ' </h3>
<div class="contain">
  <table> 
      <thead>
        <tr>
            <th>strain</th>
            <th>greenhouse</th>
            <th>weight</th>
            <th>date</th>
            <th>time</th>
            <th>notes</th>
        </tr>
      </thead>
      <tbody>
  ';
  while ($row = $sql->fetch_assoc()) {
    $table_string .= '
       <tr>
          <td>' . $row["strain"] . '</td>
          <td>' . $row["greenhouse"] . '</td>
          <td>' . $row["weight"] . '</td>
          <td>' . $row["date"] . '</td>
          <td>' . $row["time"] . '</td>
          <td>' . $row["notes"] . '</td>
       </tr>';
  }
  $table_string .= '
      </tbody>
      </table>
      </div>
      ';
  mysqli_close($mysqli);
return $table_string;
}

/**
 *  returns a html block to be printed
 * containing the total harvest between (inclusive) two dates
 */
function get_total_harvest_by_date($start_date, $end_date) {
  $table_string = '';
  $mysqli = sql_connect();

  $harvests = "SELECT date, sum(weight) as total_weight FROM harvest 
                WHERE date>='$start_date' 
                AND date<='$end_date'
                GROUP BY date
                ORDER BY date;";

  $sql = mysqli_query($mysqli, $harvests) or die(mysqli_error($mysqli));
  $table_string .=
    '
<h3 id="harvest-table-title">Harvest Totals By Day From: ' .$start_date. ' To: ' .$end_date . ' </h3>
<div class="contain">
  <table>
      <thead>
        <tr>
            <th>date</th>
            <th>total harvest</th>           
        </tr>
      </thead>
      <tbody>
  ';
  while ($row = $sql->fetch_assoc()) {
    $table_string .= '
       <tr>
          <td>' . $row["date"] . '</td>         
          <td>' . $row["total_weight"] . '</td>
       </tr>';
  }
  $table_string .= '
      </tbody>
      </table>
      </div>
      ';
  mysqli_close($mysqli);
  return $table_string;
}

/**
 *  returns a html block to be printed
 * containing the total harvest between (inclusive) two dates grouped by GH
 */
function get_total_harvest_by_greenhouse($start_date, $end_date) {
  $table_string = '';
  $mysqli = sql_connect();

  $harvests = "SELECT greenhouse, sum(weight) as total_weight FROM harvest 
                WHERE date>='$start_date' 
                AND date<='$end_date'
                GROUP BY greenhouse
                ORDER BY total_weight;";

  $sql = mysqli_query($mysqli, $harvests) or die(mysqli_error($mysqli));
  $table_string .=
    '
<h3 id="harvest-table-title">Total Harvest By Greenhouse From: ' .$start_date. ' To: ' .$end_date . ' </h3>
<div class="contain">
  <table>
      <thead>
        <tr>
            <th>greenhouse</th>
            <th>total harvest</th>           
        </tr>
      </thead>
      <tbody>
  ';
  while ($row = $sql->fetch_assoc()) {
    $table_string .= '
       <tr>
          <td>' . $row["greenhouse"] . '</td>         
          <td>' . $row["total_weight"] . '</td>
       </tr>';
  }
  $table_string .= '
      </tbody>
      </table>
      </div>
      ';
  mysqli_close($mysqli);
  return $table_string;
}



/**
 *  returns a html block to be printed
 * containing the total harvest between (inclusive) two dates grouped by species
 */

function get_total_harvest_by_species($start_date, $end_date) {
  $table_string = '';
  $mysqli = sql_connect();

  $harvests = "SELECT strain, sum(weight) as total_weight FROM harvest 
                WHERE date>='$start_date' 
                AND date<='$end_date'
                GROUP BY strain
                ORDER BY total_weight;";

  $sql = mysqli_query($mysqli, $harvests) or die(mysqli_error($mysqli));
  $table_string .=
    '
<h3 id="harvest-table-title">Total Harvest By Species From: ' .$start_date. ' To: ' .$end_date . ' </h3>
<div class="contain">
  <table>
      <thead>
        <tr>
            <th>strain</th>
            <th>total harvest</th>           
        </tr>
      </thead>
      <tbody>
  ';
  while ($row = $sql->fetch_assoc()) {
    $table_string .= '
       <tr>
          <td>' . $row["strain"] . '</td>         
          <td>' . $row["total_weight"] . '</td>
       </tr>';
  }
  $table_string .= '
      </tbody>
      </table>
      </div>
      ';
  mysqli_close($mysqli);
  return $table_string;
}


