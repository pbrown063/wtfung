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

  echo "<li class='icon'>
        <select name='strain' required>
        <option value='' disabled selected hidden>Select Strain Name</option>";
  while ($row = $sql->fetch_assoc()){
    echo "<option value='" .$row["common_name"]. "'>" . $row["common_name"] . "</option>";
  }
  echo "</select>
        </li>";
  mysqli_close($mysqli);
}

/**
 * Creates and prints a form dropdown called @straincode
 * that is generated from the strain library.
 */
function display_strain_code(){
  $mysqli = sql_connect();
  $substrate = "SELECT strain_code, common_name FROM strains_library";
  $sql = mysqli_query($mysqli, $substrate) or die(mysqli_error($mysqli));

  echo" <li class='icon'>
     <select name='code' required>
      <option value='' disabled selected hidden> Select Strain Code</option>";
  while ($row = $sql->fetch_assoc()){
    echo "<option value='". $row['strain_code']. "'>" . $row['strain_code'] . "  " .$row["common_name"]. "</option>";
  }
  echo "</select>
    </li>";
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

  echo "<li class='icon'>
        <select name='substrate' required>
        <option value='' disabled selected hidden>Select Substrate Type</option>";
  while ($row = $sql->fetch_assoc()){
    echo "<option value='" .$row["substrate_type"]. "'>" . $row["substrate_type"] . "</option>";
  }
  echo "</select>
        </li>";
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

  echo " 
     <li class='icon'>
      <select name='phase' required>
        <option value='' disabled selected hidden> Select Phase</option>";
  while ($row = $sql->fetch_assoc()){
    echo "<option value='" .$row["phase_name"]. "'>" . $row["phase_name"] . "</option>";
  }
  echo "</select>
        </li>";
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

  echo "<li class='icon'>
         <select name='account' required>
        <option value='' disabled selected hidden> Select Worker</option>";
  while ($row = $sql->fetch_assoc()){
    echo "<option value='" .$row["firstname"]. "'>" .$row["firstname"]. " " .$row["lastname"]."</option>";
  }
  echo "</select>
        </li>";
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

  echo "<li class='icon'>
        <select name='account' required>
        <option value='' disabled selected hidden> Select Worker</option>";
  while ($row = $sql->fetch_assoc()){
    echo "<option value='" .$row["firstname"]. "'>" .$row["firstname"]. " " .$row["lastname"]."</option>";
  }
  echo "</select>
    </li>";
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

  echo "<li class='icon'>
        <select name='greenhouse' required>
 <option value='' disabled selected hidden>Select Greenhouse</option>";
  while ($row = $sql->fetch_assoc()) {
    echo "<option value='".$row["id"]."'>".$row["id"]."</option>";
  }
  echo "</select>
        </li>";
  mysqli_close($mysqli);
}

/**
 * Creates and prints a form dropdown called @schedule_phase
 * that is generated from the building library
 */
function display_schedule_phases($all = FALSE) {
  $output_block =
    " <select name='schedule_phase' required>
 <option value='' disabled selected hidden>Select Production Phase</option>";

  $output_block .= $all ? "<option value=all_phases>All Phases</option>" : "";
  $output_block .= "  
<option value=plate>Transfer to Plates</option>
<option value=jar>Innoculate Jars</option>
<option value=bag>Sterilize & Innoculate</option>
<option value=block>Bagging Blocks</option>
";

  $output_block .= "</select>";
  print $output_block;
}

/**
 *
 * Creates a table spit out of the plates (not plates_creation)
 */
function plate_table(){
  $mysqli = sql_connect();
  $plate = "SELECT plate_id, strains.common_name strain_name, plate_count, creation_date
            FROM plates, 
            (SELECT common_name, strain_code
             FROM strains_library) as strains
            WHERE plates.strain_code = strains.strain_code
            AND plate_count >= 1";
  $sql = mysqli_query($mysqli, $plate) or die(mysqli_error($mysqli));


  echo '
    <table id="plate_table">
      <thead>
        <tr>
            <th>plate id</th>
            <th>strain</th>
            <th>number of plates</th>           
            <th>creation date</th>
        </tr>
      </thead>
      <tbody>';
  while ($row = $sql->fetch_assoc()) {

    if ($row == NULL) {
      mysqli_close($mysqli);
      echo '<h3 class="table-title">No Results Found</h3>';
      return;
    }

    echo '
       <tr class="plate-row">
          <td>' . $row["plate_id"] . '</td>
          <td>' . $row["strain_name"] . '</td>
          <td>' . $row["plate_count"] . '</td>         
          <td>' . $row["creation_date"] . '</td>
       </tr>';
  }
  echo '</tbody>
      </table>';
  mysqli_close($mysqli);
}

/**
 *
 * Creates a table spit out of the plates (not plates_creation)
 */
function jars_table(){
  $mysqli = sql_connect();
  $plate = "SELECT jar_id, strains.common_name strain_name, jar_count, creation_date
            FROM jars, 
            (SELECT common_name, strain_code
             FROM strains_library) as strains       
            WHERE jars.strain_code = strains.strain_code
            AND jar_count >= 1";
  $sql = mysqli_query($mysqli, $plate) or die(mysqli_error($mysqli));


  echo '
    <table id="jar_table">
      <thead>
        <tr>
            <th>jar id</th>
            <th>strain</th>
            <th>number of jars</th>           
            <th>creation date</th>
        </tr>
      </thead>
      <tbody>';
  while ($row = $sql->fetch_assoc()) {

    if ($row == NULL) {
      mysqli_close($mysqli);
      echo '<h3 class="table-title">No Results Found</h3>';
      return;
    }

    echo '
       <tr class="jar-row">
          <td>' . $row["jar_id"] . '</td>
          <td>' . $row["strain_name"] . '</td>
          <td>' . $row["jar_count"] . '</td>         
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
 * Returns the html string to display the admin menu for the header.
 */
function display_admin_menu() {
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
  
        <button class="dropdown-btn">Farm Schedule
       <i class="fa fa-caret-down"></i>
       </button>
        <div class="dropdown-container">
          <a href="farm_schedule_entry_form.php">Make Entry</a>
          <a href="farm_schedule_view_form.php">View Schedule</a>
        </div>

        <a href="data_analytics_tables.php">Data Analytics</a>
        <a href="account_form.php">Create Account</a>     
        <a href="developer_manual.php">Dev Docs</a>
';

  return $admin_menu;
}

/**
 * @param $is_admin
 * Returns the html string to display header menu.
 * Result is based on whether the user is an admin.
 */
function get_header_menu($user_name, $message, $is_admin = FALSE) {

  $admin_menu = $is_admin ? get_admin_header_menu() : '';

  $user_menu =
    '
<nav>
    <div id="snackbar">'.$message.'</div>
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
      <div id="logout">
        <a href="logout.php">Logout</a>
      </div>
      <button class="dropdown-btn">Lab 
      <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-container">
           <a href="plate_form.php">Plates</a>
           <a href="jar_form.php">Jars</a>
           <a href="bag_form.php">Spawn Bags</a>
           <a href="block_form.php">Production Blocks</a>
      </div>
 
           <a href="harvest_ampm_form.php">Harvest</a>

                
  	'.$admin_menu.'
   
      <a href="user_manual.php">Manual</a>
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

/**
 * @param $table
 * @param $start_date
 * @param $end_date
 *
 * @return string
 *
 */
function get_table_choice($table, $start_date, $end_date) {
  switch($table) {

    // Data Analytics cases
    case 'plate_strain':
      return get_plates_data($start_date, $end_date, 'strain');
      break;
    case 'plate_date':
      return get_plates_data($start_date, $end_date, 'date');
      break;
    case 'jar_strain':
      return get_jars_data($start_date, $end_date, 'strain');
      break;
    case 'jar_substrate':
      return get_jars_data($start_date, $end_date, 'substrate');
      break;
    case 'jar_date':
      return get_jars_data($start_date, $end_date, 'date');
      break;
    case 'bag_strain':
      return get_bags_data($start_date, $end_date, 'strain');
      break;
    case 'bag_substrate':
      return get_bags_data($start_date, $end_date, 'substrate');
      break;
    case 'bag_date':
      return get_bags_data($start_date, $end_date, 'date');
      break;
    case 'block_strain':
      return get_blocks_data($start_date, $end_date, 'strain');
      break;
    case 'block_substrate':
      return get_blocks_data($start_date, $end_date, 'substrate');
      break;
    case 'block_date':
      return get_blocks_data($start_date, $end_date, 'date');
      break;
    case 'harvest_day':
      return get_total_harvest_by_date($start_date, $end_date);;
      break;
    case 'harvest_greenhouse':
      return get_total_harvest_by_greenhouse($start_date, $end_date);
      break;
    case 'harvest_species':
      return get_total_harvest_by_species($start_date, $end_date);
      break;
    case 'harvest_all_data':
      return get_all_harvest_data_in_range($start_date, $end_date);
      break;

    //Scedule cases
    case 'all_phases':
      return get_all_schedule_data_in_range($start_date, $end_date);
    case 'plate':
      return get_schedule_data_for_plates($start_date, $end_date);
    case 'jar':
      return get_schedule_data_for_jars($start_date, $end_date);
    case 'bag':
      return get_schedule_data_for_bags($start_date, $end_date);
    case 'block':
      return get_schedule_data_for_blocks($start_date, $end_date);

    default:
      return '<h1 class="table-title">Please make a valid submission</h1>';
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
                ORDER BY date DESC;";
  $sql = mysqli_query($mysqli, $harvests) or die(mysqli_error($mysqli));

  $table_string .=
    '
<h3 class="table-title">All Harvest Data From: ' .$start_date. ' To: ' .$end_date . ' </h3>
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

    // If no results, return
    if ($sql->fetch_assoc() == NULL) {
      mysqli_close($mysqli);
      return '<h3 class="table-title">No Results Found</h3>';
    }

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

  $harvests = "SELECT harvest.date, am_weight.am_column, pm_weight.pm_column, sum(weight) as total_weight                     
                FROM harvest,
                (  SELECT date, sum(weight) as am_column
                       FROM harvest
                       WHERE date>='$start_date'
                       AND date<='$end_date'
                       AND time='am'
                       GROUP BY date ) as am_weight,
                (  SELECT date, sum(weight) as pm_column
                       FROM harvest
                       WHERE date>='$start_date'
                       AND date<='$end_date'
                       AND time='pm'
                       GROUP BY date ) as pm_weight
                WHERE harvest.date>='$start_date' 
                AND harvest.date<='$end_date'
                AND am_weight.date = harvest.date 
                AND pm_weight.date = harvest.date
                GROUP BY harvest.date
                ORDER BY harvest.date DESC;";

  $sql = mysqli_query($mysqli, $harvests) or die(mysqli_error($mysqli));

  $table_string .=
    '
<h3 class="table-title">Harvest Totals By Day From: ' .$start_date. ' To: ' .$end_date . ' </h3>
<div class="contain">
  <table>
      <thead>
        <tr>
            <th>date</th>
            <th>AM</th>
            <th>PM</th>
            <th>total harvest</th>                       
        </tr>
      </thead>
      <tbody>
  ';
  while ($row = $sql->fetch_assoc()) {

    // If no results, return
    if ($sql->fetch_assoc() == NULL) {
      mysqli_close($mysqli);
      return '<h3 class="table-title">No Results Found</h3>';
    }

    $table_string .= '
       <tr>
          <td>' . $row["date"] . '</td>      
          <td>' . $row["am_column"] . '</td>
          <td>' . $row["pm_column"] . '</td>   
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
                ORDER BY total_weight DESC;";

  $sql = mysqli_query($mysqli, $harvests) or die(mysqli_error($mysqli));

  $table_string .=
    '
<h3 class="table-title">Total Harvest By Greenhouse From: ' .$start_date. ' To: ' .$end_date . ' </h3>
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

    // If no results, return
    if ($sql->fetch_assoc() == NULL) {
      mysqli_close($mysqli);
      return '<h3 class="table-title">No Results Found</h3>';
    }

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
                ORDER BY total_weight DESC;";

  $sql = mysqli_query($mysqli, $harvests) or die(mysqli_error($mysqli));

  $table_string .=
    '
<h3 class="table-title">Total Harvest By Species From: ' .$start_date. ' To: ' .$end_date . ' </h3>
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

    // If no results, return
    if ($sql->fetch_assoc() == NULL) {
      mysqli_close($mysqli);
      return '<h3 class="table-title">No Results Found</h3>';
    }

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


/**
 *  returns a html block to be printed
 * containing the entire between (inclusive) two dates
 */
function get_all_schedule_data_in_range($start_date, $end_date) {
  $table_string = '';
  $mysqli = sql_connect();
  $schedule = "SELECT * FROM schedule 
                WHERE date>='$start_date' 
                AND date<='$end_date' 
                ORDER BY date DESC;";
  $sql = mysqli_query($mysqli, $schedule) or die(mysqli_error($mysqli));

  $table_string .=
    '
<h3 class="table-title">Farm Schedule From: ' .$start_date. ' To: ' .$end_date . ' </h3>
<div class="contain">
  <table> 
      <thead>
        <tr>
            <th>date</th>
            <th>strain</th>
            <th>phase</th>
            <th>substrate</th>
            <th>volume</th>
            <th>notes</th>
        </tr>
      </thead>
      <tbody>
  ';
  while ($row = $sql->fetch_assoc()) {

    // If no results, return
    if ($sql->fetch_assoc() == NULL) {
      mysqli_close($mysqli);
      return '<h3 class="table-title">No Results Found</h3>';
    }

    $table_string .= '
       <tr>
          <td>' . $row["date"] . '</td>
          <td>' . $row["strain"] . '</td>
          <td>' . $row["substrate"] . '</td>
          <td>' . $row["phase"] . '</td>
          <td>' . $row["volume"] . '</td>
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

function get_schedule_data_for_plates($start_date, $end_date) {
  $table_string = '';
  $mysqli = sql_connect();
  $schedule = "SELECT * FROM schedule 
                WHERE date>='$start_date' 
                AND date<='$end_date'
                AND phase = 'plate'
                ORDER BY date DESC;";
  $sql = mysqli_query($mysqli, $schedule) or die(mysqli_error($mysqli));

  $table_string .=
    '
<h3 class="table-title">Plating Schedule From: ' .$start_date. ' To: ' .$end_date . ' </h3>
<div class="contain">
  <table> 
      <thead>
        <tr>
            <th>date</th>
            <th>strain</th>                     
            <th>number of plates</th>
            <th>notes</th>
        </tr>
      </thead>
      <tbody>
  ';
  while ($row = $sql->fetch_assoc()) {

    // If no results, return
    if ($sql->fetch_assoc() == NULL) {
      mysqli_close($mysqli);
      return '<h3 class="table-title">No Results Found</h3>';
    }

    $table_string .= '
       <tr>
          <td>' . $row["date"] . '</td>
          <td>' . $row["strain"] . '</td>                    
          <td>' . $row["volume"] . '</td>
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

function get_schedule_data_for_jars($start_date, $end_date) {
  $table_string = '';
  $mysqli = sql_connect();
  $schedule = "SELECT * FROM schedule 
                WHERE date>='$start_date' 
                AND date<='$end_date'
                AND phase = 'jar'
                ORDER BY date DESC;";
  $sql = mysqli_query($mysqli, $schedule) or die(mysqli_error($mysqli));

  $table_string .=
    '
<h3 class="table-title">Innoculation Schedule From: ' .$start_date. ' To: ' .$end_date . ' </h3>
<div class="contain">
  <table> 
      <thead>
        <tr>
            <th>date</th>
            <th>strain</th>        
            <th>substrate</th>             
            <th>number of jars</th>          
            <th>notes</th>
        </tr>
      </thead>
      <tbody>
  ';
  while ($row = $sql->fetch_assoc()) {

    // If no results, return
    if ($sql->fetch_assoc() == NULL) {
      mysqli_close($mysqli);
      return '<h3 class="table-title">No Results Found</h3>';
    }

    $table_string .= '
       <tr>
          <td>' . $row["date"] . '</td>
          <td>' . $row["strain"] . '</td>
          <td>' . $row["substrate"] . '</td>                    
          <td>' . $row["volume"] . '</td>
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

function get_schedule_data_for_bags($start_date, $end_date) {
  $table_string = '';
  $mysqli = sql_connect();
  $schedule = "SELECT * FROM schedule 
                WHERE date>='$start_date' 
                AND date<='$end_date'
                AND phase = 'bag'
                ORDER BY date DESC;";
  $sql = mysqli_query($mysqli, $schedule) or die(mysqli_error($mysqli));

  $table_string .=
    '
<h3 class="table-title">Sterilize and Innoculate Schedule From: ' .$start_date. ' To: ' .$end_date . ' </h3>
<div class="contain">
  <table> 
      <thead>
        <tr>
            <th>date</th>
            <th>strain</th>          
            <th>substrate</th>           
            <th>number of bags</th>
            <th>notes</th>
        </tr>
      </thead>
      <tbody>
  ';
  while ($row = $sql->fetch_assoc()) {

    // If no results, return
    if ($sql->fetch_assoc() == NULL) {
      mysqli_close($mysqli);
      return '<h3 class="table-title">No Results Found</h3>';
    }

    $table_string .= '
       <tr>
          <td>' . $row["date"] . '</td>
          <td>' . $row["strain"] . '</td>
          <td>' . $row["substrate"] . '</td>                   
          <td>' . $row["volume"] . '</td>
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

function get_schedule_data_for_blocks($start_date, $end_date) {
  $table_string = '';
  $mysqli = sql_connect();
  $schedule = "SELECT * FROM schedule 
                WHERE date>='$start_date' 
                AND date<='$end_date'
                AND phase = 'block'
                ORDER BY date DESC;";
  $sql = mysqli_query($mysqli, $schedule) or die(mysqli_error($mysqli));

  $table_string .=
    '
<h3 class="table-title">Block Bagging Schedule From: ' .$start_date. ' To: ' .$end_date . ' </h3>
<div class="contain">
  <table> 
      <thead>
        <tr>
            <th>date</th>
            <th>strain</th>                     
            <th>number of blocks</th>
            <th>notes</th>
        </tr>
      </thead>
      <tbody>
  ';
  while ($row = $sql->fetch_assoc()) {

    // If no results, return
    if ($sql->fetch_assoc() == NULL) {
      mysqli_close($mysqli);
      return '<h3 class="table-title">No Results Found</h3>';
    }

    $table_string .= '
       <tr>
          <td>' . $row["date"] . '</td>
          <td>' . $row["strain"] . '</td>                    
          <td>' . $row["volume"] . '</td>
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

function get_plates_data($start_date, $end_date, $sort_by) {
  $table_string = '';
  $mysqli = sql_connect();

  $plates = "SELECT creation_date, plate_count, strains.common_name as strain, notes
                FROM plates_creation,
                   (SELECT common_name, strain_code
                    FROM strains_library) as strains
                WHERE creation_date>='$start_date' 
                AND creation_date<='$end_date'
                AND plates_creation.strain_code = strains.strain_code";

  if ($sort_by == 'strain') {
    $plates .= " ORDER BY plates_creation.strain_code;";
  }
  else {
    $plates .= " ORDER BY creation_date DESC;";
  }
  $sql = mysqli_query($mysqli, $plates) or die(mysqli_error($mysqli));

  $table_string .=
    '
<h3 class="table-title">Plates Records By ' . ucwords($sort_by) . ' From: ' .$start_date. ' To: ' .$end_date . ' </h3>
<div class="contain">
  <table> 
      <thead>
        <tr>
            <th>creation date</th>
            <th>strain</th>
            <th>plates created</th>                                 
            <th>notes</th>       
        </tr>
      </thead>
      <tbody>
  ';
  while ($row = $sql->fetch_assoc()) {

    // If no results, return
    if ($row == NULL) {
      mysqli_close($mysqli);
      return '<h3 class="table-title">No Results Found</h3>';
    }

    $table_string .= '
       <tr>
          <td>' . $row["creation_date"] . '</td>
          <td>' . $row["strain"] . '</td>                    
          <td>' . $row["plate_count"] . '</td>        
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

function get_jars_data($start_date, $end_date, $sort_by) {
  $table_string = '';
  $mysqli = sql_connect();

  $jars = "SELECT creation_date, jar_count, substrate, strains.common_name as strain, notes
                FROM jars_creation,
                   (SELECT common_name, strain_code
                    FROM strains_library) as strains
                WHERE creation_date>='$start_date'
                AND creation_date<='$end_date'
                AND jars_creation.strain_code = strains.strain_code
                ";

  if ($sort_by == 'strain') {
    $jars .= "ORDER BY strain;";
  }
  else if($sort_by == 'substrate') {
    $jars .= "ORDER BY substrate;";
  }
  else {
    $jars .= "ORDER BY creation_date DESC;";
  }
  $sql = mysqli_query($mysqli, $jars) or die(mysqli_error($mysqli));

  $table_string .=
    '
<h3 class="table-title">Plates Records By ' . ucwords($sort_by) . ' From: ' .$start_date. ' To: ' .$end_date . ' </h3>
<div class="contain">
  <table> 
      <thead>
        <tr>
            <th>creation date</th>
            <th>strain</th>
            <th>jars created</th>                     
            <th>substrate</th>     
            <th>notes</th>       
        </tr>
      </thead>
      <tbody>
  ';
  while ($row = $sql->fetch_assoc()) {

    // If no results, return
    if ($sql->fetch_assoc() == NULL) {
      mysqli_close($mysqli);
      return '<h3 class="table-title">No Results Found</h3>';
    }

    $table_string .= '
       <tr>
          <td>' . $row["creation_date"] . '</td>
          <td>' . $row["strain"] . '</td>                    
          <td>' . $row["jar_count"] . '</td>
          <td>' . $row["substrate"] . '</td>
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

function get_bags_data($start_date, $end_date, $sort_by) {
  $table_string = '';
  $mysqli = sql_connect();

  $bags = "SELECT creation_date, num_bags, substrate, strains.common_name as strain, notes, batch.name as batch_name, batch_id
                FROM bags_creation,
                 (SELECT common_name, strain_code
                    FROM strains_library) as strains,
                 (SELECT name, id
                    FROM batches) as batch
                WHERE creation_date>='$start_date'
                AND creation_date<='$end_date'
                AND bags_creation.strain_code = strains.strain_code
                AND batch_id = batch.id
                ";

  if ($sort_by == 'strain') {
    $bags .= "ORDER BY strain;";
  }
  else if($sort_by == 'substrate') {
    $bags .= "ORDER BY substrate;";
  }
  else {
    $bags .= "ORDER BY creation_date DESC;";
  }

  $sql = mysqli_query($mysqli, $bags) or die(mysqli_error($mysqli));

  $table_string .=
    '
<h3 class="table-title">Plates Records By ' . ucwords($sort_by) . ' From: ' .$start_date. ' To: ' .$end_date . ' </h3>
<div class="contain">
  <table> 
      <thead>
        <tr>
            <th>batch name</th>
            <th>creation date</th>
            <th>strain</th>
            <th>bags made</th>                     
            <th>substrate</th>     
            <th>notes</th>       
        </tr>
      </thead>
      <tbody>
  ';
  while ($row = $sql->fetch_assoc()) {

    // If no results, return
    if ($sql->fetch_assoc() == NULL) {
      mysqli_close($mysqli);
      return '<h3 class="table-title">No Results Found</h3>';
    }

    $table_string .= '
       <tr>
          <td>' . $row["batch_name"] . '</td>
          <td>' . $row["creation_date"] . '</td>
          <td>' . $row["strain"] . '</td>                    
          <td>' . $row["num_bags"] . '</td>
          <td>' . $row["substrate"] . '</td>
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

function get_blocks_data($start_date, $end_date, $sort_by) {
  $table_string = '';
  $mysqli = sql_connect();

  $blocks = "SELECT creation_date, block_count, substrate, strains.common_name as strain, notes, batch_id
                FROM blocks,
                 (SELECT common_name, strain_code
                    FROM strains_library) as strains
                WHERE creation_date>='$start_date'
                AND creation_date<='$end_date'
                AND blocks.strain_code = strains.strain_code
                ";

  if ($sort_by == 'strain') {

    $blocks .= " ORDER BY strain;";
  }
  else if($sort_by == 'substrate') {
    $blocks .= "ORDER BY substrate;";
  }
  else {
    $blocks .= "SORDER BY creation_date DESC;";
  }
  $sql = mysqli_query($mysqli, $blocks) or die(mysqli_error($mysqli));

  $table_string .=
    '
<h3 class="table-title">Plates Records By ' . ucwords($sort_by) . ' From: ' .$start_date. ' To: ' .$end_date . ' </h3>
<div class="contain">
  <table> 
      <thead>
        <tr>
            <th>batch name</th>
            <th>creation date</th>
            <th>strain</th>
            <th>blocks made</th>                     
            <th>substrate</th>     
            <th>notes</th>       
        </tr>
      </thead>
      <tbody>
  ';
  while ($row = $sql->fetch_assoc()) {

    // If no results, return
    if ($sql->fetch_assoc() == NULL) {
      mysqli_close($mysqli);
      return '<h3 class="table-title">No Results Found</h3>';
    }

    $table_string .= '
       <tr>
          <td>' . $row["batch_id"] . '</td>
          <td>' . $row["creation_date"] . '</td>
          <td>' . $row["strain"] . '</td>                    
          <td>' . $row["block_count"] . '</td>
          <td>' . $row["substrate"] . '</td>
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

