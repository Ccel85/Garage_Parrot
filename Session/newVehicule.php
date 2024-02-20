<?php 
include('../config/configsql.php');
include('variable.php');
include('../templates/header.php');

//page création vehicule



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
    
    $newCar = new Car (
        $_POST["Car_model"],
        $_POST["Car_gasoil"],
        $_POST["Car_kilometers"],
        $_POST["Car_year"],
        $_POST["Car_description"],
        $_POST["Car_price"],
        $fileDestinations 
    );
    
    //insertion donnée pour alimenter la Table vehicule
    
    $modele = $newCar->getModele();
    $energy = $newCar->getEnergy();
    $km = $newCar->getKm();
    $year = $newCar->getYear();
    $carContent = $newCar->getcarContent();
    $price = $newCar->getPrice();
    $fileDestinations = $newCar->getFile(); // Supprimer cette ligne
    
    if (
        isset($_POST["Car_model"], $_POST["Car_gasoil"], $_POST["Car_kilometers"], $_POST["Car_year"], $_POST["Car_price"], $_POST["Car_description"])
        && !empty($_POST["Car_model"]) && !empty($_POST["Car_gasoil"]) && !empty($_POST["Car_kilometers"]) && !empty($_POST["Car_year"]) && !empty($_POST["Car_description"] && !empty($_POST["Car_price"]))
    ) {
        try {
            $sqlcar= "INSERT INTO  cars (modele,energy,km,year,carContent,price,img1,img2,img3,img4) VALUES (:modele,:energy,:km,:year,:carContent,:price,:img1,:img2,:img3,:img4)";
            $statement = $adminpdo->prepare ($sqlcar);
            $statement->bindParam(':modele', $modele);
            $statement->bindParam(':energy', $energy);
            $statement->bindParam(':km', $km);
            $statement->bindParam(':year', $year);
            $statement->bindParam(':carContent', $carContent);
            $statement->bindParam(':price', $price);
            $statement->bindParam(':img1', $fileDestinations[0]);
            $statement->bindParam(':img2', $fileDestinations[1]);
            $statement->bindParam(':img3', $fileDestinations[2]);
            $statement->bindParam(':img4', $fileDestinations[3]);
            $statement->execute();
    
            echo 'La fiche véhicule ' . $modele . ' a bien été créée';
        } catch (PDOException $e) {
            echo 'Erreur lors de la création de la fiche véhicule : '.$e->getMessage();
        }
    }
    ?>
    <form action="../templates/admin.php" style="display:flex; justify-content:center">
        <button type="" name="">Tableau de bord administrateur</button>
    </form>
    <?php include '../templates/footer.php' ?>
    
