<?php
require_once __DIR__ . '/bootstrap.php';
require_once 'make-graph.php';
require_once __DIR__ . '/../jpgraph/src/jpgraph.php';

switch ($_POST_['click']) {

  case '3dpie-graph':
    if ($_POST['click']) {
      setcookie('graph', '3dpie.php');
    }
    break;

  case 'lineandshade-graph':
    if ($_POST['click']) {
      setcookie('graph', 'lineandshade.php');
    }
    break;

  case 'balloon-graph':
    if ($_POST['click']) {
      setcookie('graph', 'balloon.php');
    }
    break;

  default:
    setcookie('graph', '3dpie.php');
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
<form method="post" action="data_analytics.php">
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
<div>
  <input type="button" name="balloon-graph" onclick="<?php setcookie('graph', 'balloon.php')?>">
</div>
<div class="graph-output">
  <?php print '<img src="'.$_COOKIE['graph'].'"/>';?>
</div>
</body>
</html>
