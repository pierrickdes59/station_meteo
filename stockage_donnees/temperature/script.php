#!/usr/bin/php
<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=meteo;charset=utf8', 'root', 'mdp');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
do{
echo "Acquisition de la température ..." . "\n";
$vari = exec('/root/meteo/temperature/acqui.sh');
$vari = $vari / 100;
}while($vari > 60 || $vari < -35);
echo "Température acquise !". "\n";

$req = $bdd->prepare('INSERT INTO temperature(moment, valeur) VALUES (NOW(), :temperature)');
$req->execute(array(
	'temperature' => $vari));
echo "Température ajoutée : " . $vari . "°C" . "\n";
?>
