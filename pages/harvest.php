<?php
//file containing functions -- needed for every page
require_once __DIR__ . '/bootstrap.php';

echo "HARVEST INPUT<br><br>";
//form for harvest data
$display = "<form action='' method='post' id='harvest_form'> 

Batch:<input type='text' name='batch' placeholder='Input Batch'> </input><br><br>

Strain: <br><br>

Date:<input type='date' name='date'> </input><br><br>

Weight:<input type='text' name='weight' placeholder='Input weight'> </input><br><br>

<input type='radio' name='time' value='am' checked> AM<br>
<input type='radio' name='time' value='pm'> PM<br>

Notes:<br>
<textarea rows='4' cols='50' name='notes' form='harvest_form' placeholder='Enter notes here'></textarea><br><br>
<input type ='submit' name='submit' value='Submit Harvest Info'>

</form><br>";

//check for if they hit submit button or first time landing on the page
if (!filter_input(INPUT_POST, "submit")) {

echo "Please fill out the form<br><br>";
echo "$display";

} else {
//grabbing inputs from posted form and making variables
$batch = filter_input(INPUT_POST, "batch");
$strain = filter_input(INPUT_POST, "strain");
$date = filter_input(INPUT_POST, "date");
$weight = filter_input(INPUT_POST, "weight");
$time = filter_input(INPUT_POST, "time");
$notes = filter_input(INPUT_POST, "notes");
//query for insertion to database
$insert = "INSERT INTO harvest (species, date, weight, time, notes, batch) VALUES ('$strain', '$date', '$weight', '$time', '$notes','$batch');";
//connect to database
$mysqli = sql_connect();
//insert into database or error message
$sql = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));

echo "Thank you, your data has been submitted<br><br>";
echo "$display";

}