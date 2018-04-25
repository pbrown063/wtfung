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
  <?php jars_table(); ?>
</div>

<div class="container">
  <form method="POST" action="bags.php" id="bag_form">
    <ul class="flex-outer">
      <h1>Select Jar to Bag</h1>
      <li>
        <input type="text" name="batch_name" placeholder="Batch Name" required>
      </li>
      <li>
        <input type="number" name="jar_id" min='1' placeholder="Jar ID From Table" required>
      </li>
      <li>
        <input type="number" name="number_of_jars" min='1' placeholder="Number of jars used" required>
      </li>
      <li>
        <?php display_substrate(); ?>
      </li>
      <li>
        <input type="number" name="num_bags" min ="1" placeholder="Number of Bags Made" required>
      </li>
      <li>
        <input type="date" name="creation_date" value="<?php echo $date ?>" placeholder="yyyy-mm-d">
      </li>
      <li>
        <textarea name='notes' rows='5' cols='20' placeholder='Notes'></textarea> <!--To be added to bags table-->
      </li>
      <li>
        <button type='submit' name='submit' value='submit' form="bag_form">Make Bags</button>
      </li>
    </ul>
  </form>
</div>
<script src="bag_script.js" type="text/javascript"></script>
</body>
</html>