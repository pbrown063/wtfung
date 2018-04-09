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
  <form method="POST" action="">
    <ul class="flex-outer">
      <li>
        <!--<?php //display_batch(); ?>-->
      </li>
      <li>
        <?php display_strains(); ?>
      </li>
      <li>
        <input type="number" name="harv_amount" min="1" placeholder="Harvest Amount" required>
      <li>
        <input type="date" name="date" value="<?php current_date(); ?>" placeholder="yyyy-mm-d">
      </li>
      <li>
        <textarea name='notes' rows='5' cols='20' placeholder='Harvest Notes'></textarea>
      </li>
      <li>
        <button type='submit'>Harvesting brains!</button>
      </li>
    </ul>
  </form>
</div>
</body>
</html>
