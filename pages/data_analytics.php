<?php
require_once __DIR__ . '/bootstrap.php';
require_once 'make-graph.php';
require_once __DIR__ . '/../jpgraph/src/jpgraph.php';

switch ($_POST_['click']) {

  case '3dpie-graph':
    $graph = '3dpie.php';
    break;

  case 'lineandshade-graph':
    $graph = 'lineandshade.php';
    break;

  case 'balloon-graph':
    $graph = 'balloon.php';
    break;

  default:
    $graph = '3dpie.php';
    break;
}
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
<form method="POST" action="data_analytics.php">
  <div class="data_button">
    <input type="submit" name="click" value="3dpie-graph"/>
  </div>
  <div class="data_button">
    <input type="submit" name="click" value="lineandshade-graph"/>
  </div>
  <div class="data_button">
    <input type="submit" name="click" value="balloon-graph"/>
  </div>
</form>
<div class="graph-output">
  <?php print '<img src="'.$graph.'"/>';?>
</div>
</body>
</html>
