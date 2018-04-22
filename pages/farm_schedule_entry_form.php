<?php
require_once __DIR__ . '/bootstrap.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Schedule Entry</title>

  <link rel="stylesheet" type="text/css" href="./CSS/form_style.css">
  <link rel="stylesheet" type="text/css" href="./CSS/main_style.css">
  <link rel="stylesheet" type="text/css" href="./CSS/table_style.css">

</head>
<body>
<?php include 'header.php'; ?>

<!--Schedule entry form-->
<div class="container">
  <form method="POST" action="farm_schedule_entry.php" id='farm_schedule_entry_form'>
    <ul class="flex-outer">
      <h1>Create A Production Event</h1>
      <ul class="flex-outer">
        <li>
          <input type="date" name="entry_date" value="<?php current_date(); ?>" placeholder="1999/12/31">
        </li>
        <li>
          <?php display_strains(); ?>
        </li>
        <li>
          <?php display_substrate(); ?>
        </li>
        <li>
          <?php display_schedule_phases(); ?>
        </li>
        <li>
          <input type='number' name='volume' value="item-count" placeholder='Enter Number of Items'>
        </li>
        <li>
          <textarea name='notes' rows='5' cols='20' placeholder='Scheduling Notes'></textarea>
        </li>
        <li>
          <button onclick="return add_schedule_to_list()" value='add_harvest'>add event</button>
        </li>
      </ul>
    </ul>
  </form>
</div>

<!--Queue table for schedule events to be submitted-->
<h3 class="table-title"> </h3>
<div class="contain" id="schedule-queue-table">
  <table>
    <thead>
    <tr>
      <th>date</th>
      <th>strain</th>
      <th>phase</th>
      <th>substrate</th>
      <th>volume</th>
    </tr>
    </thead>
    <tbody id="entry-queue">
    <!--Javascript will place entries in queue here-->
    </tbody>
  </table>
</div>

<!--Final page submit button-->
<ul class="flex-outer">
  <li>
    <button form='farm_schedule_entry' onclick="submit_schedule()">add to schedule</button>
  </li>
</ul>



</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="farm_schedule_entry_script.js" type="text/javascript"></script>
</html>
