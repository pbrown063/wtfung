<?php
require_once __DIR__ . '/bootstrap.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Harvest Species</title>

  <link rel="stylesheet" type="text/css" href="./CSS/form_style.css">
  <link rel="stylesheet" type="text/css" href="./CSS/main_style.css">
  <link rel="stylesheet" type="text/css" href="./CSS/table_style.css">

</head>
<body>
<?php include 'header.php'; ?>

<div class="contain">
  <?php blocks_table(); ?>
</div>

<div class="container">
  <!--Lock field for strains once harvests are in queue-->
  <ul class="flex-outer">
    <h1>Harvest Production Blocks</h1>
    <li class="icon">
      <select name="time" required>
        <option value="" disabled selected hidden>Time Of Day</option>
        <option value="am">AM</option>
        <option value="pm">PM</option>
      </select>
    </li>
    <!--    Inner form that denotes harvest info   -->
    <form method="POST" action="harvest.php" id='harvest_time_form'>
      <ul class="flex-outer">
        <li>
          <?php display_greehouse();?>
        </li>
        <li>
          <input type='number' name='weight' placeholder='Input weight'>
        </li>
        <li>
          <input type='date' name='date' value="<?php current_date(); ?>" placeholder='yyyy-mm-d'> </input>
        </li>
        <li>
        </li>
        <li>
          <textarea name='notes' rows='5' cols='20' placeholder='Harvest Notes'></textarea>
        </li>
        <li>
          <input type="text" name="strain-code" required hidden>
        </li>
        <li>
          <input type="text" name="block_id" required hidden>
        </li>
        <li>
          <input type="text" name="batch_id" required hidden>
        </li>
        <li>
          <input type="text" name="strain-name" hidden>
        </li>


        <li>
        <button onclick="return add_time_entry_to_list()" value='add_harvest'>add harvest</button>
        </li>
      </ul>
    </form>
  </ul>


</div>
<h3 class="table-title"> </h3>
<div class="contain" id="harvest-queue-table">

  <table>
    <thead>
    <tr>
      <th>greenhouse</th>
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
<script src="harvest_script.js" type="text/javascript"></script>
</html>
