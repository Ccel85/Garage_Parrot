<?php

$servername='localhost';
$bdd='garageparrot';
?>

<?php
try
{
	// On se connecte à MySQL
	$mysql = new PDO ("mysql:host=$servername;dbname=garageparrot",'admin','admin' );
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

?>



