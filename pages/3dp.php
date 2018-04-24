
<?php

require_once __DIR__ . '/../jpgraph/src/jpgraph.php';
require_once __DIR__ . '/../jpgraph/src/jpgraph_pie.php';
require_once __DIR__ . '/../jpgraph/src/jpgraph_pie3d.php';
//the building from data_analytics.php page
$greenhouse = addslashes(filter_input(INPUT_POST, "building"));
$strain_array = array();
$result = mysql_query("SELECT strain FROM harvest WHERE greenhouse =".$_POST['building'].";");
while ($row = mysql_fetch_assoc($result)) {
   $strain_array = array_merge($strain_array, array_map('trim', explode(",", $row['strain'])));
}
/*$sql = "SELECT h.weight, h.batch_id, s.common_name
        FROM harvest h, strains_library s
        WHERE h.strain = s.common_name AND
        h.date BETWEEN ".$_POST['start_date']." AND ".$_POST['end_date'].";";
$mysqli = sql_connect();
$check_res = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));
if (mysqli_num_rows($check_res) >= 1) { // if query returns results
        while ($info = mysqli_fetch_array($check_res)) { //grabs data from database and fills variables with the data
            $w1 = (float) $info['weight'];
            $w2 = (float) $info['weight'];
            $w3 = (float) $info['weight'];
            $w4 = (float) $info['weight'];           
        }
    } 
$total = $w1 + $w2 + $w3 + $w4;
$percentage1 = ($w1 / $total); */
$data = array(44,62,14,33); 

$graph = new PieGraph(300,200);
$graph->clearTheme();
$graph->SetShadow();

$graph->title->Set("A simple Pie plot");
$graph->title->SetFont(FF_FONT1,FS_BOLD);

$p1 = new PiePlot3D($data);
$p1->SetAngle(20);
$p1->SetSize(0.5);
$p1->SetCenter(0.45);
$p1->SetLegends($strain_array);

$graph->Add($p1);
$graph->Stroke();

?>
