<?php
//file containing functions -- needed for every page
//require_once __DIR__ . '/bootstrap.php';

echo "HARVEST INPUT<br><br>";
//form for strain data
echo "<form action='' method='post' id='harvest_form'> 

Batch ID:<input type='text' name='batch' placeholder='Input Batch ID'> </input><br><br>

Strains:<input type='text' name='strain' placeholder='Input species'> </input><br><br>

Date:<input type='text' name='date' placeholder='YYYY-MM-DD'> </input><br><br>

Weight:<input type='text' name='weight' placeholder='Input weight'> </input><br><br>

<input type='radio' name='time' value='am' checked> AM<br>
<input type='radio' name='time' value='pm'> PM<br>

Notes:<br>
<textarea rows='4' cols='50' name='notes' form='harvest_form' placeholder='Enter notes here'> </textarea><br><br>
<input type = 'submit' value='Submit Harvest Info'>

</form><br>";

//grabbing inputs from posted form and making variables
$batch = filter_input(INPUT_POST, "batch");
$strain = filter_input(INPUT_POST, "strain");
$date = filter_input(INPUT_POST, "date");
$weight = filter_input(INPUT_POST, "weight");
$time = filter_input(INPUT_POST, "time");
$notes = filter_input(INPUT_POST, "notes");
//query for insertion to database
$insert = "INSERT INTO harvest (batchid, species, date, weight, time, notes) VALUES ('$batch', '$strain', '$date', '$weight', '$time', '$notes');";
//connect to database
$mysqli = sql_connect();
//insert into database or error message
$sql = mysqli_query($mysqli, $insert) or die(mysqli_error($mysqli));