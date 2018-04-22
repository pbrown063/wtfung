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
<div class="container">

  <!--Lock field for strains once harvests are in queue-->
  <ul class="flex-outer">
    <li>
      <?php display_strains();?>
    </li>
    <!--    Inner form that denotes harvest info   -->
    <form method="POST" action="harvest.php" id='harvest_species_form'>
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
          <button onclick="return add_species_entry_to_list()" value='add_harvest'>add harvest</button>
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