<?php
require_once ('jpgraph/jpgraph.php');
require_once ('jpgraph/jpgraph_line.php');
require_once ('jpgraph/jpgraph_date.php');

$valeur = array();
$moment = array();
$i = 0;
include ('../connexion_mysql.php');
$reponse = $bdd->query('SELECT * FROM humidite WHERE id=(SELECT max(id) FROM humidite)');
while ($donnees = $reponse->fetch())
{
        $i = $donnees['id'];
}
$recu = htmlspecialchars($_POST['jours']);
$idmin = $i - (72*$recu);
$reponse = $bdd->prepare('SELECT * FROM humidite WHERE id > ?');
$reponse->execute(array($idmin));
$i = 0;
while ($donnees = $reponse->fetch())
{
	$valeur[$i] = $donnees['valeur'];
	$moment[$i] = strtotime($donnees['moment']);
	$i = $i +1;
}
$stand = "Evolution de l'humidité depuis";
$titre = "$stand $recu jours";







$graph = new Graph(1600,750);
 
$graph->SetMargin(65,10,55,130);
 
$graph->SetScale('datlin');
$graph->title->Set($titre);
 
$graph->xaxis->SetLabelAngle(90);
$graph->xaxis->SetTitle("Moment",'middle');
$graph->xaxis->scale->SetDateFormat('d/m/y H:i');
$graph->yaxis->SetTitle("Humidité (en %)", 'middle');
$graph->yaxis->title->SetFont(FF_ARIAL, FS_BOLD, 16);
$graph->xaxis->title->SetFont(FF_ARIAL, FS_BOLD, 16);
$graph->title->SetFont(FF_ARIAL, FS_BOLD, 32);
$graph->xaxis->SetTitlemargin(90);
$graph->yaxis->SetTitlemargin(35);
$line = new LinePlot($valeur,$moment);
$line->SetFillColor('orange@0.5');
$graph->Add($line);
$graph->Stroke();
?>


