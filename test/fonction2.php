<?php
include('../Session/variable.php');
include('../config/configsql.php');
include('../html/header.php');

$services = getservice($pdo);
if(isset($_POST['modifierService'])){
$sql = "UPDATE `garageparrot`.`service` SET 
            title = :title, 
            description = :description 
            WHERE id = :id";
    $statement = $pdo->prepare($sql); 
  // envoi des requêtes
    foreach ($_POST['id'] as $id) {

$statement->execute(['id'=>$id, 'title'=> $_POST['title'][$id], 'decription' => $_POST['description'][$id]]);
    }
}
    // création de la requête
$sql = "SELECT * FROM service";
// envoi de la requête
$statement = $pdo->prepare($sql);
$statement->execute();
$newservice = $statement->fetchAll();
?>