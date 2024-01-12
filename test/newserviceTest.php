<?php 
include('../config/configsql.php');
include('../Session/variable.php');
include('../templates/header.php');
?>

<?php  
//page création service
//insertion donnée pour alimenter la Table service
        //$serviceFile = $_POST["service_file"];
        $serviceTitle = $_POST["service_title"];
        $serviceDescription = $_POST["service_description"];
//vérification que les données saisie n'existe pas à faire

        $sqlservice= " INSERT INTO  services (title,servicesContent) VALUES (:title,:servicesContent)";
        $statement = $adminpdo-> prepare ($sqlservice);
        $statement->bindParam(':title',$serviceTitle);
        $statement->bindParam(':servicesContent',$serviceDescription);
        $statement->execute();
        echo 'La page service a été mise à jour';
?>
<button type="submit" action="admin.php">Retour au menu administrateur</button>