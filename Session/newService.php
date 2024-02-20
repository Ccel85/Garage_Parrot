<?php 
include('../config/configsql.php');
include('variable.php');
include('../templates/header.php');
?>

<?php  
if(isset($_FILES['fileInput'])) {
  $file = $_FILES['fileInput'];

  // Vérifie si aucun fichier n'a été téléchargé
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


//page création service

$newService = new Service (
        $_POST["service_title"],
        $_POST["service_description"],
        $fileDestination
        );


$title = $newService->getTitle();
$content = $newService->getContent();
$fileDestination = $newService->getFile();

if (
isset($_POST["service_title"],$_POST["service_description"])
&& !empty($_POST["service_title"]) && !empty($_POST["service_description"])){

try{

$sqlService= " INSERT INTO  services (title,servicesContent,servicesPicture) VALUES (:title,:servicesContent,:servicesPicture)";
$statement = $adminpdo->prepare ($sqlService);
$statement->bindParam(':title', $title);
$statement->bindParam(':servicesContent', $content);
$statement->bindParam(':servicesPicture', $fileDestination);
$statement->execute();

echo 'Le service ' . $title . ' a bien été créée';
header("refresh:3; url=../templates/editServicePage.php");
exit();

} catch (PDOException $e) {

echo 'Erreur lors de la création du service : '.$e->getMessage();

}
}
?>
<form action="../templates/admin.php" style="display:flex; justify-content:center">
<button  type="" name="">Tableau de bord administrateur</button>
</form>
<?php include '../templates/footer.php' ?>

