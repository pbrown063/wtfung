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

</head>
<body>
<?php include 'header.php'; ?>
<div class="container">
  <form method="POST" action="block.php" id="block_form">
    <ul class="flex-outer">
      <h1>Block</h1>
      <li>
        <input type="text" name="batch" placeholder="Batch Name" required>
      </li>
      <li>
        <?php display_strain_code(); ?>
      </li>
      <li>
        <?php display_substrate(); ?>
      </li>
      <li>
        <input type="number" name="block_count" min ="1" placeholder="Number of Blocks" required>
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
    </ul>
  </form>
</div>
</body>
</html>