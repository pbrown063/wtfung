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

<div class="container">
  <form method="POST" action="data_analytics.php" id="graph-selector">
    <ul class="flex-outer">
      <h1>Select Graph to Display</h1>
      <li>
        <button type="submit" name="graph" value="3dpie-graph">3D PIE GRAPH</button>
      </li>
      <li>
        <button type="submit" name="graph" value="lineandshade-graph">LINE AND SHADE GRAPH</button>
      </li>
      <li>
        <button type="submit" name="graph" value="balloon-graph">BALLOON GRAPH</button>
      </li>
      <li>
        <button type="submit" name="graph" value="harvest-by-date">HARVEST BY DATE</button>
      </li>
      <li>
        <div class="graph-output">
          <?php
          if (isset($graph)) {
            display_graph($graph);
          }
          ?>
      </li>
    </ul>
  </form>
</div>


</div>
</body>
</html>
