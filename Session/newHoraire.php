<?php 
include('../config/configsql.php');
include('variable.php');
include('../templates/header.php');
?>

<?php  
//page création Horaire

$newHoraire = new Horaire (
        $_POST["day1"],
        $_POST["heure_debut_am"],
        $_POST["heure_fin_am"],
        $_POST["heure_debut_pm"],
        $_POST["heure_fin_pm"]
      );

$day = $newHoraire->getDay();
$HeureDebutAm = $newHoraire->getHeureDebutAm();
$HeureFinAm = $newHoraire->getHeureFinAm();
$HeureDebutPm = $newHoraire->getHeureDebutPm();
$HeureFinPm = $newHoraire->getHeureFinPm();

if (
isset($_POST["day"],$_POST["heure_debut_am"],$_POST["heure_fin_am"],$_POST["heure_debut_pm"],$_POST["heure_fin_pm"])
&& !empty($_GET["day"]) && !empty($_POST["heure_debut_am"])&& !empty($_POST["heure_fin_am"])&& !empty($_POST["heure_debut_pm"])&& !empty($_POST["heure_fin_pm"])){

try{
  
$sqlHoraire= " INSERT INTO  horaires (day,heure_debut_am,heure_fin_am,heure_debut_pm,heure_fin_pm) VALUES (:day,:heure_debut_am,:heure_fin_am,:heure_debut_pm,:heure_fin_pm)";
$statement= $adminpdo->prepare ($sqlHoraire);
$statement->bindParam(':day', $day);
$statement->bindParam(':heure_debut_am', $HeureDebutAm);
$statement->bindParam(':heure_fin_am', $HeureFinAm);
$statement->bindParam(':heure_debut_pm', $HeureDebutPm);
$statement->bindParam(':heure_fin_pm', $HeureFinPm);
$statement->execute();

echo 'Les horaires ont bien été créé';

} catch (PDOException $e) {

echo 'Erreur lors de la modification de l\'Horaire : '.$e->getMessage();

}

}
?>
<form action="../templates/admin.php" style="display:flex; justify-content:center">
<button  type="" name="">Tableau de bord administrateur</button>
</form>
<?php include '../templates/footer.php' ?>

