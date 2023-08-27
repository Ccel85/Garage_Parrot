<?php
include ('../config/configsql.php');
//recuperer les variables du client MySQL

    //Récupération des variables à l'aide du client MySQL pour les utilisateurs
    $usersStatement = $pdo->prepare('SELECT * FROM utilisateur');
    $usersStatement->execute();
    $users = $usersStatement->fetchall();

    //fonction recuperer donnee vehicule par id
    function getCarbyId(PDO $pdo, $carId){

        $getcar = $pdo->prepare("SELECT * FROM vehicule ORDER BY id = :id");
        $getcar -> bindParam (':id',$carId, PDO::PARAM_INT);
        $getcar->execute();
        return $getcar->fetchAll();
    }
    //fonction recuperer donnee vehicule par id
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
    //fonction recuperer image vehicule
    function getCarImage(string|null $image) {
        if ($image === null) {
            return '../img/img_clio_1.png';
        } else {
            return $image['image'];
        }
    }
    //fonction recuperer donnee service
    function getservice(PDO $pdo, int $limit = null) {
        $sql = 'SELECT * FROM service ORDER BY id DESC';
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
    //$carCreate = $mysql->prepare('SELECT * FROM vehicule');
//$carCreate->execute();
//$cars = $carCreate->fetchall();

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

?>

