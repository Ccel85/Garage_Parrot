<?php 
include('../Session/variable.php');
include('../config/configsql.php');
include('../templates/header.php');

//Page modification de services
//recuperation des donnee service de BDD - editServicePage.php

if(isset($_POST['modifierService'])) {

  // Réecriture des variables
  $id = $_POST['id'];
  $titre_service = $_POST['title'];
  $description_service = $_POST['description'];
  $fileDestination ='';

  if(isset($_FILES['fileInput'])) {
    $file = $_FILES['fileInput'];
  if ($file['error'] === UPLOAD_ERR_OK) {
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileDestination = '../uploads/' . $fileName;

    // Déplace le fichier téléchargé vers le dossier de destination
    if (move_uploaded_file($fileTmpName, $fileDestination)) {
        echo "Le fichier a été téléchargé avec succès.";
        echo "<br>";
        echo "Chemin d'accès de l'image : " . $fileDestination ."<br>";
    } else {
        echo "Une erreur s'est produite lors du téléchargement du fichier.";
    }
} else {
    echo "Une erreur est survenue : " . $file['error'];
}
}
  // Requête de modification d'enregistrement
  $sth= $adminpdo->prepare ("UPDATE `garageparrot`.`services` SET title = :title,
  servicesContent = :servicesContent,
  servicesPicture = :servicesPicture
   WHERE id = :id");
  $sth->bindParam (':id',$id);
  $sth->bindParam (':title',$titre_service);
  $sth->bindParam (':servicesContent',$description_service);
  $sth->bindParam (':servicesPicture',$fileDestination);
  $sth->execute();
  

  } elseif (isset($_POST['supprimerService'])){

  $id = $_POST['id'];
  $titre_service = $_POST['title'];
  $description_service = $_POST['description'];
  //$image_service=$_POST['image'];

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
          <div class='button'>";
          header("refresh:3; url=../templates/editServicePage.php");
          exit();
          echo"</div>";
}


    

?>




?>
