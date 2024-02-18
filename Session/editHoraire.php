<?php 
include('../Session/variable.php');
include('../config/configsql.php');
include('../templates/header.php');

//Page modification des horaires
//recuperation des donnees POST Horaire de BDD -

if(isset($_POST['modifierHoraire'])) {

  // Reecriture des variables
  //$id = $_POST['id'];
  $day = $_POST["day"];
  $heureDebutAm = $_POST["heure_debut_am"];
  $heureFinAm = $_POST["heure_fin_am"];
  $heureDebutPm = $_POST["heure_debut_pm"];
  $heureFinPm = $_POST["heure_fin_pm"];
  
  try{
  // requete mise à jour donnée
  $sthHoraire = $adminpdo->prepare(
      "UPDATE `garageparrot`.`horaires` SET 
      heure_debut_am = :heure_debut_am,
      heure_fin_am = :heure_fin_am,
      heure_debut_pm = :heure_debut_pm,
      heure_fin_pm = :heure_fin_pm
      WHERE day = :day"
  );
  // Bind parameters
  //$sthHoraire->bindParam(':id', $id);
  $sthHoraire->bindParam(':day', $day);
  $sthHoraire->bindParam(':heure_debut_am', $heureDebutAm);
  $sthHoraire->bindParam(':heure_fin_am', $heureFinAm);
  $sthHoraire->bindParam(':heure_debut_pm', $heureDebutPm);
  $sthHoraire->bindParam(':heure_fin_pm', $heureFinPm);
  $sthHoraire->execute();

  // Check if the update was successful
  if (!$sthHoraire) {
    echo "La modification a échoué. ";
      }  else {
        echo "<div class='alert alert-success'>
        <h1>Requête validée !</h1>
        <p>La mise à jour a bien été effectuée !</p>
    </div>";    
    }
} catch (PDOException $e) {

    echo 'Erreur lors de la modification de l\'Horaire : '.$e->getMessage();
  }
}
?>
<form action="../templates/admin.php" style="display:flex; justify-content:center">
<button  type="" name="">Tableau de bord administrateur</button>
</form>