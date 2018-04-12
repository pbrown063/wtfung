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
                <?php display_strains();?>
            </li>
            <li>
              <input type='text' name='weight' placeholder='Input weight'>
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
                <button type='submit' name='submit' value='submit' form='harvest_form'>Add Harvest Info</button>
            </li>
        </ul>
    </form>
</div>
</body>
</html>
