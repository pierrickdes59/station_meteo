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
echo "Acquisition de l'humidité ..." . "\n";
$vari = exec('/root/meteo/humidite/acqui.sh');
}while($vari >= 1000 || $vari < -1);
$vari = $vari / 10;
echo "Humidité acquise !". "\n";

$req = $bdd->prepare('INSERT INTO humidite(moment, valeur) VALUES (NOW(), :humidite)');
$req->execute(array(
	'humidite' => $vari));
echo "Humidité ajoutée : " . $vari . "\n";
?>
