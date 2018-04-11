<?php
  require_once __DIR__ . '/bootstrap.php';
  ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Harvester</title>

  <link rel="stylesheet" type="text/css" href="./CSS/form_style.css">
  <link rel="stylesheet" type="text/css" href="./CSS/main_style.css">

</head>
<body>
<?php include 'header.php'; ?>
<div class="container">
  <form method="POST" action="harvest.php" id='harvest_form'>
        <ul class="flex-outer">
            <li>
                <input type='text' name='batch' placeholder='Batch Harvested'>
            </li>
            <li>
                Strain: <?php display_strains();?>
            </li>
            <li>
                Date:<input type='date' name='date' value="<?php current_date(); ?>" placeholder='yyyy-mm-d'> </input><br><br>
            </li>
            <li>
                <input type='text' name='weight' placeholder='Input weight'>
            </li>
            <li>
            AM<input type='radio' name='time' value='am' checked>             
            </li>
            <li>
            PM<input type='radio' name='time' value='pm'>
            </li>
            <li>
                <textarea name='notes' rows='5' cols='20' placeholder='Strain Notes'></textarea>
            </li>
            <li>
                <button type='submit' name='submit' value='submit' form='harvest_form'>Add Harvest Info</button>
            </li>
        </ul>
    </form>
</div>
</body>
</html>
