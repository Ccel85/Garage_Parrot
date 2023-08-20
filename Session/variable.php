<?php

include ('../config/configsql.php');
//recuperer les variables du client MySQL

//Récupération des variables à l'aide du client MySQL
$usersStatement = $mysqlUser->prepare('SELECT * FROM utilisateur');
$usersStatement->execute();
$users = $usersStatement->fetchall();?>