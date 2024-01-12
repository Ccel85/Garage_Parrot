<?php 
include('../Session/variable.php');
include('../config/configsql.php');
include('../templates/header.php');

//Page modification de services
//recuperation des donnee service de BDD - editServicePage.php

/*if (isset($_POST['creerService'])) {
  header('Location=../templates/adminServices.php');
}*/

if(isset($_POST['modifierAnnonce'])) {

  // Réecriture des variables
  //$service = new Services($_POST['title'], $_POST['description']);
  $id = $_POST['id'];
  $carModel = $_POST['modele'];
  $carEnergy = $_POST['energy'];
  $carKm = $_POST['km'];
  $carYear = $_POST['year'];
  $carDescription = $_POST['carContent'];
  $carPrice = $_POST['price'];
  //$image_service=$_POST['image'];

  // Requête de modification d'enregistrement
  $sth= $adminpdo->prepare ("UPDATE `garageparrot`.`cars` SET modele = :modele,energy = :energy, km = :km, year = :year,
  carContent = :carContent, price = :price WHERE id = :id");
  $sth->bindParam (':id',$id);
  //$carModel = $_POST['modele'];
  $sth->bindParam (':modele',$carModel);
  $sth->bindParam (':energy',$carEnergy);
  $sth->bindParam (':km',$carKm);
  $sth->bindParam (':year',$carYear);
  $sth->bindParam (':carContent',$carDescription);
  $sth->bindParam (':price',$carPrice);
  $annonce=$sth->execute();

  } elseif (isset($_POST['supprimerAnnonce'])){
    // Réecriture des variables
  //$service = new Services($_POST['title'], $_POST['description']);

  $id = $_POST['id'];
  $carModel = $_POST['modele'];
  $carEnergy = $_POST['energy'];
  $carKm = $_POST['km'];
  $carYear = $_POST['year'];
  $carDescription = $_POST['carContent'];
  $carPrice = $_POST['price'];
  //$image_service=$_POST['image'];

  // Requête de modification d'enregistrement
  $sth= $adminpdo->prepare ("DELETE FROM cars WHERE id = :id");
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