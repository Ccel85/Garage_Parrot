<?php 
include('../Session/variable.php');
include('../config/configsql.php');
include('../templates/header.php');

//Page modification de services
//recuperation des donnee service de BDD - editServicePage.php

/*if (isset($_POST['creerService'])) {
  header('Location=../templates/adminServices.php');
}*/

if(isset($_POST['modifierService'])) {

  // Réecriture des variables
  //$service = new Services($_POST['title'], $_POST['description']);
  $id = $_POST['id'];
  $titre_service = $_POST['title'];
  $description_service = $_POST['description'];
  //$image_service=$_POST['image'];

  // Requête de modification d'enregistrement
  $sth= $adminpdo->prepare ("UPDATE `garageparrot`.`services` SET title = :title,
  servicesContent = :servicesContent WHERE id = :id");
  $sth->bindParam (':id',$id);
  $sth->bindParam (':title',$titre_service);
  $sth->bindParam (':servicesContent',$description_service);
  $sth->execute();

  } elseif (isset($_POST['supprimerService'])){

  $id = $_POST['id'];
  $titre_service = $_POST['title'];
  $description_service = $_POST['description'];
  //$image_service=$_POST['image'];

  // Requête de modification d'enregistrement
  $sth= $adminpdo->prepare ("DELETE FROM services WHERE id = :id");
  $sth->bindParam (':id',$id);
  $sth->execute();
  }
  if (!$sth) {
    echo "La modification a échoué. ";
} else {
    echo "<div class='alert alert-success'>
            <h1>Requête validée !</h1>
            <p>La mise à jour a bien été effectuée !</p>
          </div>
          <div class='button'>
          <a href='../templates/admin.php' class='button'>Retour Tableau de bord</a>
          </div>"
          ;
}



?>
