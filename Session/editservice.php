<?php 
include('../Session/variable.php');
include('../config/configsql.php');
include('../templates/header.php');
//recuperation des donnee service de BDD - editServicePage.php

//on recupere les données de la table service 

  if(isset($_POST['modifierService'])) {

  // Réecriture des variables
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
  }
  if (!$sth) {
    echo "La modification a échoué";
} else {
    echo "<div class='alert alert-success'>
            <h1>Requête validée !</h1>
            <p>La mise à jour a bien été effectuée !</p>
          </div>
          <a href='../templates/admin.php' class='btn btn-primary' style='display: flex; justify-content: center;'>Retour Tableau de bord</a>";
}
?>
