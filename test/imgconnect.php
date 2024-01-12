<?php
include('../config/configsql.php');
include('../Session/variable.php');
include('../templates/header.php');

$req=$adminpdo->prepare("SELECT * from servicefile WHERE fileId=? limit 1");
$req->setFetchMode(PDO::FETCH_ASSOC);
$req->execute(array($_GET['fileId']));
$tab=$req->fetchAll();
var_dump ($tab);
var_dump ($_FILES);
echo ($tab[0]['img']);
?>