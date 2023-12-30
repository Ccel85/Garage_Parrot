<?php

$servername='localhost';
$bdd='garageparrot';

?>

<?php
try
{
	// On se connecte à MySQL
	$pdo = new PDO ("mysql:host=$servername;port=3306;dbname=garageparrot",'user','3f7zhhRn4NH69R' );
}
catch(PDOException $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
try
{
	// On se connecte à MySQL
	$adminpdo = new PDO ("mysql:host=$servername;port=3306;dbname=garageparrot",'root','' );
}
catch(PDOException $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
?>



