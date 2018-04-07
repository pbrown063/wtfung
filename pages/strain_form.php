<?php ?>

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
    <form method="POST" action="">
        <ul class="flex-outer">
            <li>
                <input type='text' name='code' placeholder='Strain Code'>
            </li>
            <li>
                <input type='text' name='scientific' placeholder='Scientific Name'>
            </li>
          <li>
            <input type='text' name='abbreviation' placeholder='Strain Abbreviation'>
          </li>
            <li>
                <input type='text' name='common' placeholder='Common Name'>
            </li>
            <li>
                <textarea name='notes' rows='5' cols='20' placeholder='Strain Notes'></textarea>
            </li>
            <li>
                <button type='submit'>Add Strain</button>
            </li>
        </ul>
    </form>

</div>
</body>
</html>