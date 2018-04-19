<?php
require_once __DIR__ . '/bootstrap.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Harvest by greenhous</title>

  <link rel="stylesheet" type="text/css" href="./CSS/form_style.css">
  <link rel="stylesheet" type="text/css" href="./CSS/main_style.css">
  <link rel="stylesheet" type="text/css" href="./CSS/table_style.css">

</head>
<body>
<?php include 'header.php'; ?>
<div class="container">


  <ul class="flex-outer">
    <li>
      <?php display_greehouse();?>
    </li>

    <!--
    HERE IS THE START OF THE "ADD TO GREENHOUSE HARVEST SECTION
    AIM IS TO BUILD AN ARRAY THAT WILL BE STEPPED THROUGH FOR INSERTS
        -->
    <form method="POST" action="harvest_greenhouse.php" id='harvest_greenhouse_form'>
      <ul class="flex-outer">
        <li>
          <input type='text' name='batch' placeholder='Batch Harvested'>
        </li>
        <li>
          <?php display_strains();?>
        </li>
        <li>
          <input type='number' name='weight' placeholder='Input weight'>
        </li>
        <li>
          <input type='date' name='date' value="<?php current_date(); ?>" placeholder='yyyy-mm-d'> </input>
        </li>
        <li>
          <ul class="flex-inner">
            <li>
              <label for="am">AM</label>
              <input type='radio' name='time' value='am' id="am" checked>
            </li>
            <li>
              <label for="pm">PM</label>
              <input type='radio' name='time' value='pm' id="pm">
            </li>
          </ul>
        </li>
        <li>
          <textarea name='notes' rows='5' cols='20' placeholder='Harvest Notes'></textarea>
        </li>
        <li>

          <!--        THESE BUTTONS WILL DETERMINE IF MORE HARVESTS WILL BE MADE -->
          <button onclick="return add_batch_to_harvest_list()" value='add_batch'>Harvest Another Batch</button>
        </li>
      </ul>
    </form>
  </ul>


</div>
<div class="contain" id="harvest-queue-table">
  <table>
    <thead>
    <tr>
      <th>batch code</th>
      <th>strain</th>
      <th>weight</th>
    </tr>
    </thead>
    <tbody id="harvest-queue">

    </tbody>
  </table>
</div>

<ul class="flex-outer">
  <li>
    <button type='submit' name='submit' value='submit' form='harvest_form' onclick="submit_batches()">Finished Harvesting</button>
  </li>
</ul>



</body>
<script src="harvest_greenhouse_script.js" type="text/javascript"></script>
</html>
