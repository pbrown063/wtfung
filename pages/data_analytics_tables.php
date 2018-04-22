<?php
require_once __DIR__ . '/bootstrap.php';

if (isset($_POST['sort_data_by']) && isset($_POST['start_date']) && isset($_POST['end_date'])) {
  $table = get_table_choice(
    filter_input(INPUT_POST, 'sort_data_by'),
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
      <h1>Harvest Data</h1>
      <li>
        <select name="phase" required>
          <option value="" disabled selected hidden>Select Production Phase</option>
          <option value="plate">Plating</option>
          <option value="jar">Jarring</option>
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
      <li id="">
        <!--       <?php //display_analytics_sort_types(); ?>  -->


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

