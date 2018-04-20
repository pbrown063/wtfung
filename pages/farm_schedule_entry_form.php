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

<div class="container">


  <ul class="flex-outer">
    <form method="POST" action="farm_schedule_entry.php.php" id='farm_schedule_entry_form'>


      <h1>Make Entry Into Farm Schedule</h1>
      <ul class="flex-outer">
        <li>
          <input type="date" name="entry_date" value="<?php current_date(); ?>" placeholder="1999/12/31"> </input>
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
          <input type='number' name='volume' value="item-count" placeholder='Enter Number of Items'> </input>
        </li>
        <li>
        </li>
        <li>
          <textarea name='notes' rows='5' cols='20' placeholder='Scheduling Notes'></textarea>
        </li>
        <li>

          <!--        THESE BUTTONS WILL DETERMINE IF MORE HARVESTS WILL BE MADE -->
          <button onclick="return add_harvest_to_list()" value='add_harvest'>add another harvest</button>
        </li>
      </ul>
    </form>
  </ul>


</div>
<h3 id="harvest-table-title"> </h3>
<div class="contain" id="harvest-queue-table">

  <table>
    <thead>
    <tr>
      <th>strain</th>
      <th>weight</th>
      <th>date</th>
    </tr>
    </thead>
    <tbody id="harvest-queue">

    </tbody>
  </table>
</div>

<ul class="flex-outer">
  <li>
    <button form='harvest_form' onclick="submit_harvests()">Finished Harvesting</button>
  </li>
</ul>



</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="harvest_greenhouse_script.js" type="text/javascript"></script>
</html>
