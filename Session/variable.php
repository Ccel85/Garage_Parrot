<?php

include ('../config/configsql.php');
//recuperer les variables du client MySQL

//Récupération des variables à l'aide du client MySQL pour les utilisateurs
$usersStatement = $pdo->prepare('SELECT * FROM utilisateur');
$usersStatement->execute();
$users = $usersStatement->fetchall();


//$carCreate = $mysql->prepare('SELECT * FROM vehicule');
//$carCreate->execute();
//$cars = $carCreate->fetchall();?>


<?php
//création des variables pour annonce
/*$stmt = $pdo->query("SELECT * FROM vehicule ");
$row = $stmt->fetch();
    $carModele=$row['modele'];
    $carGasoil=$row['carburant'];
    $carKilometers=$row['km'];
    $carYear=$row['année'];
    $carDescription=$row['description'];
    $carPrice=$row['Prix'];
    $carId=$row['id'];*/


    function getCarbyId(PDO $pdo, $carId){

        $getcar = $pdo->prepare("SELECT * FROM vehicule ORDER BY id = :id");
        $getcar -> bindParam (':id',$carId, PDO::PARAM_INT);
        $getcar->execute();
        return $getcar->fetchAll();
    }

    function getcars(PDO $pdo, int $limit = null) {
        $sql = 'SELECT * FROM VEHICULE ORDER BY id DESC';
    
        if ($limit) {
            $sql .= ' LIMIT :limit';
        }
    
        $query = $pdo->prepare($sql);
    
        if ($limit) {
            $query->bindParam(':limit', $limit, PDO::PARAM_INT);
        }
    
        $query->execute();
        return $query->fetchAll();
    }
?>

<?php  
//$id=(INT)$_POST['id'];

//$getcar = $pdo->query("SELECT * FROM vehicule ORDER BY id=$carId ");
//$cars = $getcar->fetchall();
?>