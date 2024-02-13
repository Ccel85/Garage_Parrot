<?php 
include('../Session/variable.php');
include('../config/configsql.php');
include('../templates/header.php');

//Page modification des annonces voiture
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
  $carPrice = $_POST['price'];
  $carDescription = $_POST['carContent'];
  $carBoite = $_POST['carBoite'];
  $carDoor = $_POST['carDoor'];
  $puissanceFiscale = $_POST['puissanceFiscale'];
  $puissance = $_POST['puissance'];
  $guarantie = $_POST['guarantie'];
  $chassis = implode(',', $_POST['chassis']);
  $carColor = $_POST['carColor'];
  $interieur = implode(',',$_POST['interieur']);
  $autre = $_POST['autre'];
  //$image_service=$_POST['image'];

  // Requête de modification d'enregistrement
  $sth= $adminpdo->prepare ("UPDATE `garageparrot`.`cars` SET 
  modele = :modele,
  energy = :energy,
  km = :km,
  year = :year,
  carContent = :carContent,
  price = :price,
  carBoite = :carBoite,
  carDoor = :carDoor,
  puissanceFiscale = :puissanceFiscale,
  puissance = :puissance,
  guarantie = :guarantie,
  color = :color,
  chassis = :chassis,
  interieur = :interieur,
  autre = :autre
  WHERE id = :id");

  $sth->bindParam (':id',$id);
  $sth->bindParam (':modele',$carModel);
  $sth->bindParam (':energy',$carEnergy);
  $sth->bindParam (':km',$carKm);
  $sth->bindParam (':year',$carYear);
  $sth->bindParam (':carContent',$carDescription);
  $sth->bindParam (':carBoite',$carBoite);
  $sth->bindParam (':carDoor',$carDoor);
  $sth->bindParam (':puissanceFiscale',$puissanceFiscale);
  $sth->bindParam (':puissance',$puissance);
  $sth->bindParam (':guarantie',$guarantie);
  $sth->bindParam (':color',$carColor);
  $sth->bindParam (':price',$carPrice);
  $sth->bindParam (':interieur',$interieur);
  $sth->bindParam(':chassis', $chassis);
  $sth->bindParam (':autre',$autre);
  $annonce=$sth->execute();

  } elseif (isset($_POST['supprimerAnnonce'])){
    // Réecriture des variables

    $id = $_POST['id'];
  //$image_service=$_POST['image'];

  // Requête de modification d'enregistrement
  $sth= $adminpdo->prepare ("DELETE * FROM cars WHERE id = :id");
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