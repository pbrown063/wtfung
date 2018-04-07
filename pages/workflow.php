<?php

require_once __DIR__ . '/bootstrap.php';

echo "WORKFLOW...and some drop down populated with database info :D<br><br>";
echo "TEST PAGES<br>";
echo "PHASES<br>";  // script for phases drop down
echo" <select name='phase'>";
$mysqli = sql_connect();
	
$phase = "SELECT phase_name FROM phase_library";

$sql = mysqli_query($mysqli, $phase) or die(mysqli_error($mysqli));

while ($row = $sql->fetch_assoc()){
echo "<option value='phase'>" . $row["phase_name"] . "</option>";
}
echo "</select>";
echo "<br><br>";


//display_strains();

echo "SUBSTRATES<br>";// script for substrates drop down
echo" <select name='substrate'>";
$mysqli = sql_connect();

$substrate = "SELECT substrate_type FROM substrate_library";

$sql = mysqli_query($mysqli, $substrate) or die(mysqli_error($mysqli));

while ($row = $sql->fetch_assoc()){
echo "<option value='substrate'>" . $row["substrate_type"] . "</option>";
}
echo "</select>";
echo "<br><br>";

echo "FULL NAME<br>";// script for users full name
echo" <select name='user'>";
$mysqli = sql_connect();

$user = "SELECT firstname, lastname FROM account";

$sql = mysqli_query($mysqli, $user) or die(mysqli_error($mysqli));

while ($row = $sql->fetch_assoc()){
echo "<option value='user'>" . $row["firstname"] ." " . $row["lastname"] .  "</option>";
}
$fname = $row["firstname"];
$lname = $row["lastname"];
echo "</select>";
echo "<br><br>";


echo "Buildings<br>"; // script for strains drop down
echo" <select name='id'>";
$mysqli = sql_connect();

$id = "SELECT id FROM building";

$sql = mysqli_query($mysqli, $id) or die(mysqli_error($mysqli));

while ($row = $sql->fetch_assoc()){
echo "<option value='strain'>" . $row["id"] . "</option>";
}
echo "</select>";
echo "<br><br>";

