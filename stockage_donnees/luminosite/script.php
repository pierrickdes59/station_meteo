#!/usr/bin/php
<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=meteo;charset=utf8', 'root', 'JudoFoot31031999');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
do{
echo "Acquisition de la luminosité ..." . "\n";
$vari = exec('/root/meteo/luminosite/acqui.sh');
$vari = $vari / 1000;
}while($vari > 6 || $vari < -1);
echo "Luminosité acquise !". "\n";

$req = $bdd->prepare('INSERT INTO luminosite(moment, valeur) VALUES (NOW(), :luminosite)');
$req->execute(array(
	'luminosite' => $vari));
echo "Luminosité ajoutée : " . $vari . "\n";
?>
