<?php 
//session_start();
include('../config/sessionStop.php');
include('../Session/variable.php');
include('../config/configsql.php');
include('../templates/header.php');

//Page modification des annonces voiture
//recuperation des donnee service de BDD - editCarPage.php

if(isset($_POST['modifierAnnonce'])) {

  if(isset($_FILES['fileInput'])) {
    $uploadedFiles  = $_FILES['fileInput'];
    $fileDestinations = [];
    foreach ($uploadedFiles['tmp_name'] as $index => $tmpName) {
        $fileName = $uploadedFiles['name'][$index];
        $fileDestination = '../uploads/' . $fileName;
        if (move_uploaded_file($tmpName, $fileDestination)) {
            $fileDestinations[] = $fileDestination;
        }
    }
}

  // Réecriture des variables
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
  if (isset($_POST['chassis']) && !empty($_POST['chassis'])) {
    $chassis = implode(',', $_POST['chassis']);
} else {
    $chassis = '';
}
  $carColor = $_POST['carColor'];
  if (isset($_POST['interieur']) && !empty($_POST['interieur'])) {
    $interieur = implode(',', $_POST['interieur']);
} else {
    $interieur = '';
}
  $autre = $_POST['autre'];
  $fileDestinations;

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
  autre = :autre,
  img1 = :img1,
  img2 = :img2,
  img3 = :img3,
  img4 = :img4
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
  $sth->bindParam(':img1',$fileDestinations[0]);
  $sth->bindParam(':img2',$fileDestinations[1]);
  $sth->bindParam(':img3',$fileDestinations[2]);
  $sth->bindParam(':img4',$fileDestinations[3]);
  $annonce=$sth->execute();

  } elseif (isset($_POST['supprimerAnnonce'])){

    $id = $_POST['id'];

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
          </div>";
  if ($_SESSION['role']=='Administrateur') {
           // Redirection après modification réussie
          header("refresh:2; url=../templates/admin.php");
          exit();
            } else {
           // Redirection après modification réussie
          header("refresh:2; url=../templates/employes.php");
          exit();
            }
          
}
?>