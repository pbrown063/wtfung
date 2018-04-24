<?php
require_once __DIR__ . '/bootstrap.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Jarring</title>
  <link rel="stylesheet" type="text/css" href="./CSS/table_style.css">
  <link rel="stylesheet" type="text/css" href="./CSS/form_style.css">
  <link rel="stylesheet" type="text/css" href="./CSS/main_style.css">

</head>
<body>
<?php include 'header.php'; ?>

<div class="contain">
  <?php plate_table(); ?>
</div>
<div class="container">
  <form method="POST" action="jars.php" id="jar_form">
    <ul class="flex-outer">
      <h1>Jars</h1>
      <li>
        <input type="number" name="plate_id" min='1' placeholder="Plate ID From Table" required>
      </li>
      <li>
        <input type="number" name="number_of_plates" min='1' placeholder="Number of plates used" required>
      </li>
      <li>
        <input type="number" name="count" min="1" placeholder="Number of Jars Made" required>
      </li>
      <li>
        <?php display_substrate(); ?>
      </li>
      <li>
        <input type="date" name="creation_date" value="<?php current_date(); ?>" placeholder="yyyy-mm-d"></input>
      </li>
      <li>
        <textarea name="notes" rows="5" cols="20" placeholder="Notes"></textarea>
      </li>
      <li>
        <button type='submit'value='submit' name='submit' form='jar_form' >Make Jars</button>
      </li>
    </ul>
  </form>
</div>
<script src="jars_script.js" type="text/javascript"></script>
</body>
</html>