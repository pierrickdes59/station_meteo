<?php
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_line.php');
require_once ('jpgraph/jpgraph_date.php');
include ('../connexion_mysql.php');
$valeur = array();
$moment = array();
$i = 0;

$reponse = $bdd->query('SELECT * FROM pluie');
$i = 0;
while ($donnees = $reponse->fetch())
{
	$valeur[$i] = $donnees['valeur'];
	$moment[$i] = strtotime($donnees['moment']);
	$i = $i +1;
}







$graph = new Graph(1600,750);
 
$graph->SetMargin(65,10,55,130);
 
$graph->SetScale('datlin');
$graph->title->Set("Evolution de la pluie depuis le début");
 
$graph->xaxis->SetLabelAngle(90);
$graph->xaxis->SetTitle("Moment",'middle');
$graph->xaxis->scale->SetDateFormat('d/m/y H:i');
$graph->yaxis->SetTitle("Pluie", 'middle');
$graph->yaxis->title->SetFont(FF_ARIAL, FS_BOLD, 16);
$graph->xaxis->title->SetFont(FF_ARIAL, FS_BOLD, 16);
$graph->title->SetFont(FF_ARIAL, FS_BOLD, 32);
 $graph->xaxis->SetTitlemargin(90);
$line = new LinePlot($valeur,$moment);
$line->SetFillColor('orange@0.5');
$graph->Add($line);
$graph->Stroke();
?>


