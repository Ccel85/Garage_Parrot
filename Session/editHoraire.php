<?php 
include('../Session/variable.php');
include('../config/configsql.php');
include('../templates/header.php');

//Page modification des horaires
//recuperation des donnee service de BDD - editHorairePage.php

/*if (isset($_POST['creerService'])) {
  header('Location=../templates/adminServices.php');
}*/

if(isset($_POST['modifierHoraire'])) {

  // Réecriture des variables
$id = $_POST['id'];
$day = $_POST["day"];
$HeureDebutAm = $_POST["heure_debut_am"];
$HeureFinAm = $_POST["heure_fin_am"];
$HeureDebutPm = $_POST["heure_debut_pm"];
$HeureFinPm = $_POST["heure_fin_pm"];

  // Requête de modification d'enregistrement
  $sth= $adminpdo->prepare (
  "UPDATE `garageparrot`.`horaires`SET 
  day = :day, 
  heure_debut_am = :heure_debut_am,
  heure_fin_am = :heure_fin_am,
  heure_debut_pm = :heure_debut_pm,
  heure_fin_pm = :heure_fin_pm
  WHERE id = :id");

  $sth->bindParam (':id',$id);
  $sth->bindParam (':day',$day);
  $sth->bindParam (':heure_debut_am',$HeureDebutAm);
  $sth->bindParam (':heure_fin_am',$HeureFinAm);
  $sth->bindParam (':heure_debut_pm',$HeureDebutPm);
  $sth->bindParam (':heure_fin_pm',$HeureFinPm);
  $sth->execute();

  } elseif (isset($_POST['supprimerHoraire'])){

    // Réecrire des variables

$id = $_POST['id'];
$day = $_POST["day"];
$HeureDebutAm = $_POST["heure_debut_am"];
$HeureFinAm = $_POST["heure_fin_am"];
$HeureDebutPm = $_POST["heure_debut_pm"];
$HeureFinPm = $_POST["heure_fin_pm"];

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
