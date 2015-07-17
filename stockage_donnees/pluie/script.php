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
echo "Acquisition de la pluie ..." . "\n";
$vari = exec('/root/meteo/pluie/acqui.sh');
}while($vari > 2 || $vari < -1);
echo "Pluie acquise !". "\n";

$req = $bdd->prepare('INSERT INTO pluie(moment, valeur) VALUES (NOW(), :pluie)');
$req->execute(array(
	'pluie' => $vari));
echo "Pluie ajoutée : " . $vari . "\n";
?>
