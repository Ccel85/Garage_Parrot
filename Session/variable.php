<?php

include ('../config/configsql.php');
//recuperer les variables du client MySQL

//Récupération des variables à l'aide du client MySQL
$usersStatement = $mysql->prepare('SELECT * FROM utilisateur');
$usersStatement->execute();
$users = $usersStatement->fetchall();


$carCreate = $mysql->prepare('SELECT * FROM vehicule');
$carCreate->execute();
$cars = $carCreate->fetchall();?>