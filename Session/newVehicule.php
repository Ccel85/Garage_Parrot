<?php 
include('../config/configsql.php');
include('variable.php');?>

<?php  
//insertion donnée pour alimenter la Table vehicule
        $carFile = $_POST["Car_file"];
        $carModel = $_POST["Car_model"];
        $carGasoil = $_POST["Car_gasoil"];
        $carKilometers = $_POST["Car_kilometers"];
        $carYear = $_POST["Car_year"];
        $carDescription = $_POST["Car_descritpion"];
        $carPrice = $_POST["Car_price"];
//vérification que les données saisie n'existe pas à faire

                $sqlcar= " INSERT INTO  vehicule (modele,carburant,km,année,description,prix,image) VALUES ('$carModel','$carGasoil','$carKilometers','$carYear','$carDescription','$carPrice','$carFile')";
                $pdo-> exec ($sqlcar);
                echo 'La fiche véhicule '.$carModel.' a bien ete créé';
?>