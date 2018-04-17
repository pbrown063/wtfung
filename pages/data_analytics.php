<?php
require_once __DIR__ . '/bootstrap.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>What The Fungus</title>
  <link rel="stylesheet" type="text/css" href="CSS/form_style.css">
  <link rel="stylesheet" type="text/css" href="CSS/main_style.css">
</head>
<body>
<?php require_once 'header.php'; ?>
<form method="POST" action="make-graph.php">
<div class="data_button">
  <input type="submit" name="choose-graph" value="3dpie-graph"/>
</div>
<div class="data_button">
  <input type="submit" name="choose-graph" value="lineandshade-graph"/>
</div>
<div class="data_button">
  <input type="submit" name="choose-graph" value="balloon-graph"/>
</div>
</form>
<div class="graph-output">
  print '<img src="'.$graph-script.'"/>';
</div>
</body>
</html>
