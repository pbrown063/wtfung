<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Add Strain</title>

  <link rel="stylesheet" type="text/css" href="./CSS/form_style.css">
  <link rel="stylesheet" type="text/css" href="./CSS/main_style.css">

</head>
<body>
<?php include 'header.php'; ?>
<div class="container">
    <form method="POST" action="strains.php" id="strains_form">
        <ul class="flex-outer">
          <h1>Add Strain</h1>
            <li>
                <input type='text' name='code' placeholder='Enter Strain Code' required>
            </li>
            <li>
                <input type='text' name='scientific' placeholder='Enter Scientific Name' required>
            </li>
          <li>
            <input type='text' name='abbreviation' placeholder='Enter Strain Abbreviation (AA)' required>
          </li>
            <li>
                <input type='text' name='common' placeholder='Enter Common Name' required>
            </li>
            <li>
                <textarea name='notes' rows='5' cols='20' placeholder='Strain Notes'></textarea>
            </li>
            <li>
                <button type='submit' name="submit" form="strains_form" value="submit">Add Strain</button>
            </li>
        </ul>
    </form>
</div>
</body>
</html>
