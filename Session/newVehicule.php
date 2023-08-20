<?php 
include('../config/configsql.php');
include('variable.php');?>

<?php   $carFile = $_POST["Car_file"];
        $carModel = $_POST["Car_model"];
        $carGasoil = $_POST["Car_gasoil"];
        $carKilometers = $_POST["Car_kilometers"];
        $carYear = $_POST["Car_year"];
        $carDescription = $_POST["Car_descritpion"];
        $carPrice = $_POST["Car_price"];
//verification que les donnees saisie n'existe pas 

        //foreach ($cars as $car) {

                $sqlcar= " INSERT INTO  vehicule (modele,carburant,km,année,description,prix) VALUES ('$carModel','$carGasoil','$carKilometers','$carYear','$carDescription','$carPrice')";

                $mysql-> exec ($sqlcar);

                echo 'La fiche véhicule '.$carModel.' a bien ete créé';
        //}
?>