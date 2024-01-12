<?php 
include('../config/configsql.php');
include('variable.php');
include('../templates/header.php');

//page création vehicule

$newCar = new Car (
        $_POST["Car_model"],
        $_POST["Car_gasoil"],
        $_POST["Car_kilometers"],
        $_POST["Car_year"],
        $_POST["Car_description"],
        $_POST["Car_price"]);

//insertion donnée pour alimenter la Table vehicule

$modele = $newCar->getModele();
$energy = $newCar->getEnergy();
$km = $newCar->getKm();
$year =$newCar-> getYear();
$carContent = $newCar-> getcarContent();
$price = $newCar->getPrice();

if (
isset($_POST["Car_model"], $_POST["Car_gasoil"], $_POST["Car_kilometers"], $_POST["Car_year"], $_POST["Car_price"], $_POST["Car_description"])
&& !empty($_POST["Car_model"]) && !empty($_POST["Car_gasoil"]) && !empty($_POST["Car_kilometers"]) && !empty($_POST["Car_year"]) && !empty($_POST["Car_description"] && !empty($_POST["Car_price"]))){

try{
//$sqlcar= " INSERT INTO  vehicule (modele,energy,km,year,carContent,price) VALUES ('$carModel','$carGasoil','$carKilometers','$carYear','$carDescription','$carPrice','$carFile')";
$sqlcar= " INSERT INTO  cars (modele,energy,km,year,carContent,price) VALUES (:modele,:energy,:km,:year,:carContent,:price)";
$statement = $adminpdo->prepare ($sqlcar);
$statement->bindParam(':modele', $modele);
$statement->bindParam(':energy', $energy);
$statement->bindParam(':km', $km);
$statement->bindParam(':year', $year);
$statement->bindParam(':carContent', $carContent);
$statement->bindParam(':price', $price);

$statement->execute();

echo 'La fiche véhicule ' . $modele . ' a bien été créée';

} catch (PDOException $e) {

echo 'Erreur lors de la création de la fiche véhicule : '.$e->getMessage();

}
}
?>
<form action="../templates/admin.php" style="display:flex; justify-content:center">
<button  type="" name="">Tableau de bord administrateur</button>
</form>
<?php include '../templates/footer.php' ?>