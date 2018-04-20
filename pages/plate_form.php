<?php
  require_once __DIR__ . '/bootstrap.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Plates</title>

  <link rel="stylesheet" type="text/css" href="./CSS/form_style.css">
  <link rel="stylesheet" type="text/css" href="./CSS/main_style.css">

</head>
<body>
<?php include 'header.php'; ?>
<div class="container">
  <form method="POST" action="plates.php" id='plate_form'>
    <ul class="flex-outer">
      <li>
        <?php display_strain_code(); ?>
      </li>
      <li>
        <input type='text' name='generation' placeholder='Enter Plate Generation' required>
      </li>
      <li>
         <input type="number" name="count" min="1" placeholder="Enter Number of Plates" required>
      </li>
      <li>
        <input type="date" name="creation_date" value="<?php current_date(); ?>" placeholder="1999/12/31"></input>
      </li>
      <li>
        <button type='submit' name='submit' value='submit' form='plate_form'>Create Plates</button>
      </li>
    </ul>
  </form>
</div>
</body>
</html>