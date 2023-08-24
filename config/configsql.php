<?php

$servername='localhost';
$bdd='garageparrot';
?>

<?php
try
{
	// On se connecte à MySQL
	$pdo = new PDO ("mysql:host=$servername;dbname=garageparrot",'admin','admin' );
}
catch(PDOException $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

?>



