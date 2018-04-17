<?php

require_once __DIR__ . '/../jpgraph/src/jpgraph.php';


switch ($_POST['click']) {
  case '3dpie-graph':

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
    break;

  case 'lineandshade-graph':
    require_once __DIR__ . '/../jpgraph/src/jpgraph_line.php';

    $datay1 = 	array(11,7,5,8,3,5,5,4,8,6,5,5,3,2,5,1,2,0);
    $datay2 = 	array( 4,5,4,5,6,5,7,4,7,4,4,3,2,4,1,2,2,1);
    $datay3 = 	array(4,5,7,10,13,15,15,22,26,26,30,34,40,43,47,55,60,62);

    // Create the graph. These two calls are always required
    $graph = new Graph(300,200);
    $graph->clearTheme();
    $graph->SetScale("textlin");
    $graph->SetShadow();
    $graph->img->SetMargin(40,30,20,40);

    // Create the linear plots for each category
    $dplot[] = new LinePLot($datay1);
    $dplot[] = new LinePLot($datay2);
    $dplot[] = new LinePLot($datay3);

    $dplot[0]->SetFillColor("red");
    $dplot[1]->SetFillColor("blue");
    $dplot[2]->SetFillColor("green");

    // Create the accumulated graph
    $accplot = new AccLinePlot($dplot);

    // Add the plot to the graph
    $graph->Add($accplot);

    $graph->xaxis->SetTextTickInterval(2);
    $graph->title->Set("Example 17");
    $graph->xaxis->title->Set("X-title");
    $graph->yaxis->title->Set("Y-title");

    $graph->title->SetFont(FF_FONT1,FS_BOLD);
    $graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
    $graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);

    // Display the graph
    $graph->Stroke();

    break;

  case 'balloon-graph' :
    // $Id: balloonex1.php,v 1.5 2002/12/15 16:08:51 aditus Exp $
    require_once __DIR__ . '/../jpgraph/src/jpgraph_scatter.php';

    // Some data
    $datax = array(1,2,3,4,5,6,7,8);
    $datay = array(12,23,95,18,65,28,86,44);
    // Callback for markers
    // Must return array(width,color,fill_color)
    // If any of the returned values are "" then the
    // default value for that parameter will be used.
    function FCallback($aVal) {
      // This callback will adjust the fill color and size of
      // the datapoint according to the data value according to
      if( $aVal < 30 ) $c = "blue";
      elseif( $aVal < 70 ) $c = "green";
      else $c="red";
      return array(floor($aVal/3),"",$c);
    }

    // Setup a basic graph
    $graph = new Graph(400,300,'auto');
    $graph->clearTheme();
    $graph->SetScale("linlin");
    $graph->img->SetMargin(40,100,40,40);
    $graph->SetShadow();
    $graph->title->Set("Example of ballon scatter plot");
    // Use a lot of grace to get large scales
    $graph->yaxis->scale->SetGrace(50,10);

    // Make sure X-axis as at the bottom of the graph
    $graph->xaxis->SetPos('min');

    // Create the scatter plot
    $sp1 = new ScatterPlot($datay,$datax);
    $sp1->mark->SetType(MARK_FILLEDCIRCLE);

    // Uncomment the following two lines to display the values
    $sp1->value->Show();
    $sp1->value->SetFont(FF_FONT1,FS_BOLD);

    // Specify the callback
    $sp1->mark->SetCallback("FCallback");

    // Setup the legend for plot
    $sp1->SetLegend('Year 2002');

    // Add the scatter plot to the graph
    $graph->Add($sp1);

    // ... and send to browser
    $graph->Stroke();

    break;

  default:

    break;

}


