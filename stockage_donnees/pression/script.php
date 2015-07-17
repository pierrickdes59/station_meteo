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
echo "Acquisition de la pression ..." . "\n";
$vari = exec('/root/meteo/pression/acqui.sh');
}while($vari > 1600 || $vari < 500);
echo "Pression acquise !". "\n";

$req = $bdd->prepare('INSERT INTO pression(moment, valeur) VALUES (NOW(), :pression)');
$req->execute(array(
	'pression' => $vari));
echo "Pression ajoutée : " . $vari . "\n";
?>
