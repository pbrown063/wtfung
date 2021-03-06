<?php
require_once __DIR__ . '/bootstrap.php';

if (isset($_POST['sort-type']) && isset($_POST['start_date']) && isset($_POST['end_date'])) {
  $table = get_table_choice(
    filter_input(INPUT_POST, 'sort-type'),
    filter_input(INPUT_POST, 'start_date'),
    filter_input(INPUT_POST, 'end_date'));
}
else {
  unset($table);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>What The Fungus</title>
  <link rel="stylesheet" type="text/css" href="CSS/form_style.css">
  <link rel="stylesheet" type="text/css" href="CSS/main_style.css">
  <link rel="stylesheet" type="text/css" href="./CSS/table_style.css">
</head>
<body>
<?php require_once 'header.php'; ?>

<div class="container">
  <form method="POST" action="data_analytics_tables.php" id="table-selector">
    <ul class="flex-outer">
      <h1>Data Analytics And Records</h1>
      <li class="icon">
        <select name="phase" required onchange="phaseEntry()">
          <option value="" disabled selected hidden>Select Production Phase</option>
          <option value="plate">Plating Records</option>
          <option value="jar">Jarring Records</option>
          <option value="bag">Innoculating Bags</option>
          <option value="block">Blocking</option>
          <option value="harvest">Harvest</option>
        </select>
      </li>
      <li>
        <input type="date" name="start_date" value="<?php current_date(); ?>" placeholder="FROM: ">
      </li>
      <li>
        <input type="date" name="end_date" value="<?php current_date(); ?>" placeholder="TO:">
      </li>
      <li class="icon">
        <select name="sort-type" required>
          <option value="" disabled selected hidden>Select Phase First</option>
          <!-- Javascript will populate and dynamically change options based on phase -->
        </select>
      </li>
      <li>
        <button type="submit" name="table" value="">display harvest data</button>
      </li>
    </ul>
  </form>
</div>

<?php

if (isset($table)) {
  echo $table;
}
?>
<script src="data_analytics_script.js" type="text/javascript"></script>
</body>
</html>