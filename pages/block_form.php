<?php
require_once __DIR__ . '/bootstrap.php';
$date = date("Y-m-j");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Inoculation</title>

  <link rel="stylesheet" type="text/css" href="./CSS/form_style.css">
  <link rel="stylesheet" type="text/css" href="./CSS/main_style.css">
  <link rel="stylesheet" type="text/css" href="./CSS/table_style.css">

</head>
<body>
<?php include 'header.php'; ?>

<div class="contain">
  <?php bags_table(); ?>
</div>

<div class="container">
  <form method="POST" action="block.php" id="block_form">
    <ul class="flex-outer">
      <h1>Select Batch To Convert</h1>
      <li>
        <?php display_substrate('block'); ?>
      </li>
      <li>
        <input type="number" name="block_count" min ="1" placeholder="Number of Blocks" required>
      </li>
      <li>
        <input type="number" name="bags_used" placeholder="Number of Bags Used" required>
      </li>
      <li>
        <input type="date" name="creation_date" value="<?php echo $date ?>" placeholder="yyyy-mm-d">
      </li>
      <li>
        <textarea name='notes' rows='5' cols='20' placeholder='Notes'></textarea> <!--To be added to bags table-->
      </li>
      <li>
        <button type='submit' name='submit' value='submit' form="block_form">Make Blocks</button>
      </li>
      <!--      Hidden fields will be auto populated with javascript from query data (Poor mans AJAX)    -->
      <li>
        <input type="text" name="batch_id" placeholder="Batch Id" required hidden>
      </li>
      <li>
        <input type="text" name="strain" required hidden>
      </li>
      <li>
        <input type="text" name="bag_id" required hidden>
      </li>
      <li>
        <input type="text" name="num_bags" required hidden>
      </li>
    </ul>
  </form>
</div>
<script src="block_script.js" type="text/javascript"></script>
</body>
</html>
