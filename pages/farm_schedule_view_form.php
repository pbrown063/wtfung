<?php
require_once __DIR__ . '/bootstrap.php';

if (isset($_POST['schedule_phase']) && isset($_POST['start_date']) && isset($_POST['end_date'])) {
  $table = get_table_choice(
    filter_input(INPUT_POST, 'schedule_phase'),
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
  <form method="POST" action="farm_schedule_view_form.php" id="table-selector">
    <ul class="flex-outer">
      <h1>Select Farm Schedule Options</h1>
      <li>
        <input type="date" name="start_date" value="<?php current_date(); ?>" placeholder="FROM: ">
      </li>
      <li>
        <input type="date" name="end_date" value="<?php current_date(); ?>" placeholder="TO: ">
      </li>
      <li>
      <?php display_schedule_phases(TRUE); ?>
      </li>
      <li>
        <button type="submit" name="table" value="">view schedule</button>
      </li>
      <li>
      </li>
    </ul>
  </form>
</div>

<?php

if (isset($table)) {
  echo $table;
}
?>






</div>
</body>
</html>
