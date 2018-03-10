<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/wtfung/includes/bootstrap.inc';

echo "WORKFLOW...and some drop down populated with database info :D<br><br>";

echo "PHASES<br>";  // script for phases drop down
echo" <select name='phase'>";
$mysqli = sql_connect();
	
$phase = "SELECT phaseName FROM phaseLibrary";

$sql = mysqli_query($mysqli, $phase) or die(mysqli_error($mysqli));

while ($row = $sql->fetch_assoc()){
echo "<option value='phase'>" . $row["phaseName"] . "</option>";
}
echo "</select>";
echo "<br><br>";

echo "STRAINS<br>"; // script for strains drop down
echo" <select name='strain'>";
$mysqli = sql_connect();

$strain = "SELECT CommonName FROM strainsLibrary";

$sql = mysqli_query($mysqli, $strain) or die(mysqli_error($mysqli));

while ($row = $sql->fetch_assoc()){
echo "<option value='strain'>" . $row["CommonName"] . "</option>";
}
echo "</select>";
echo "<br><br>";

echo "SUBSTRATES<br>";// script for substrates drop down
echo" <select name='substrate'>";
$mysqli = sql_connect();

$substrate = "SELECT SubstrateType FROM substrateLibrary";

$sql = mysqli_query($mysqli, $substrate) or die(mysqli_error($mysqli));

while ($row = $sql->fetch_assoc()){
echo "<option value='substrate'>" . $row["SubstrateType"] . "</option>";
}
echo "</select>";
echo "<br><br>";

echo "EMPLOYEE FULL NAME<br>";// script for users full name
echo" <select name='user'>";
$mysqli = sql_connect();

$user = "SELECT firstname, lastname FROM emp";

$sql = mysqli_query($mysqli, $user) or die(mysqli_error($mysqli));

while ($row = $sql->fetch_assoc()){
echo "<option value='user'>" . $row["firstname"] ." " . $row["lastname"] .  "</option>";
}
$fname = $row["firstname"];
$lname = $row["lastname"];
echo "</select>";
echo "<br><br>";

