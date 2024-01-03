<?php 
include('../config/configsql.php');
include('variable.php');
include('../templates/header.php');
?>

<?php  
//page création service
        //$servicesPicture =($_FILES['service_file']['name']);
        $serviceTitle = $_POST['service_title'];
        $serviceContent = $_POST['service_description'];
       // $filename = file_get_contents($_FILES['service_file']['tmp_name']);

//vérification que les données saisie n'existe pas à faire!!

//insertion donnée pour alimenter la Table service
try{
$sqlservice= " INSERT INTO  services (title,servicesContent) VALUES (:title,:serviceContent)";
$statement = $adminpdo->prepare ($sqlservice);
$statement->bindParam(':title', $serviceTitle);
$statement->bindParam(':serviceContent', $serviceContent);
//$statement->bindParam(':servicesPicture',addslashes($filename));
$statement->execute();

/*$sqlFile= " INSERT INTO  servicefile (name,size,type,img) VALUES (:name,:size,:type,:img)";
$stmt = $adminpdo->prepare ($sqlFile);
$stmt->bindParam(':name', $_FILES['service_file']['name']);
$stmt->bindParam(':size', $_FILES['service_file']['size']);
$stmt->bindParam(':type', $_FILES['service_file']['type']);
$stmt->bindParam(':img',file_get_contents($_FILES['service_file']['tmp_name']));
$stmt->execute();*/

echo 'La page service a été mise à jour';
}
catch (PDOException $e){
        echo "Erreur lors de la mise à jour :". $e->getMessage();
}
?>
<form action="../templates/admin.php" style="display:flex; justify-content:center">
        <button  type="" name="">Tableau de bord ADMIN</button>
</form>
<?php include '../templates/footer.php' ?>