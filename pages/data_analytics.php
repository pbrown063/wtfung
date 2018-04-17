<?php
require_once __DIR__ . '/bootstrap.php';

if (isset($_POST['graph'])) {
  $graph = get_graph_choice($_POST['graph']);
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
    <button type="submit" name="graph" value="3dpie-graph"/>
  </div>
  <div class="data_button">
    <button type="submit" name="graph" value="lineandshade-graph"/>
  </div>
  <div class="data_button">
    <button type="submit" name="graph" value="balloon-graph"/>
  </div>

</form>

<div class="graph-output">
  <?php
  if (isset($graph)) {
    print '<img src="'.$graph.'" alt="Data Graph"/>';
  }
  else {
    print '<h1>Please Choose a Graph</h1>';
  }
  ?>
</div>
</body>
</html>
