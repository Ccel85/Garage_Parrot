<?php 
include('../config/configsql.php');
include('variable.php');
include('../templates/header.php');
?>

<?php  
//page création service

$newService = new Service (
      //  $_POST["service_file"],
        $_POST["service_title"],
        $_POST["service_description"]);

//$serviceFile = $newService->getFile();
$title = $newService->getTitle();
$content = $newService->getContent();

if (
isset($_POST["service_title"],$_POST["service_description"])
&& !empty($_POST["service_title"]) && !empty($_POST["service_description"])){

try{

$sqlService= " INSERT INTO  services (title,servicesContent) VALUES (:title,:servicesContent)";
$statement = $adminpdo->prepare ($sqlService);
$statement->bindParam(':title', $title);
$statement->bindParam(':servicesContent', $content);
$statement->execute();

echo 'Le service ' . $title . ' a bien été créée';

} catch (PDOException $e) {

echo 'Erreur lors de la création du service : '.$e->getMessage();

}
}
?>
<form action="../templates/admin.php" style="display:flex; justify-content:center">
<button  type="" name="">Tableau de bord administrateur</button>
</form>
<?php include '../templates/footer.php' ?>

