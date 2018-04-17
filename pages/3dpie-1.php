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
<div class="data_button">
  <a href="3dpie-1.php">3d PIE CHART</a>
</div>
<div class="data_button">
  <a href="balloon-1.php">BALLON CHART</a>
</div>
<div class="data_button">
  <a href="lineandshade-1.php">LINE SHADED GRAPH</a>
</div>

<div class="data-graph">
<?php // content="text/plain; charset=utf-8"
require_once __DIR__ . '/../jpgraph/src/jpgraph.php';
require_once __DIR__ . '/../jpgraph/src/jpgraph_pie.php';
require_once __DIR__ . '/../jpgraph/src/jpgraph_pie3d.php';

$data = array(40,60,21,33);

$graph = new PieGraph(300,200);
$graph->clearTheme();
$graph->SetShadow();

$graph->title->Set("A simple Pie plot");
$graph->title->SetFont(FF_FONT1,FS_BOLD);

$p1 = new PiePlot3D($data);
$p1->SetAngle(20);
$p1->SetSize(0.5);
$p1->SetCenter(0.45);
$p1->SetLegends($gDateLocale->GetShortMonth());

$graph->Add($p1);
$graph->Stroke();

?>
</div>

</body>
</html>





