<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=meteo;charset=utf8', 'root', 'mot_de_passe_base_de_donnes');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

?>
