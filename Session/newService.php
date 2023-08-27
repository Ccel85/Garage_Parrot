<?php 
include('../config/configsql.php');
include('variable.php');?>

<?php  
//insertion donnée pour alimenter la Table service
        $serviceFile = $_POST["service_file"];
        $serviceTitle = $_POST["service_title"];
        $serviceDescription = $_POST["service_description"];
//vérification que les données saisie n'existe pas à faire

                $sqlservice= " INSERT INTO  service (title,description,image) VALUES ('$serviceTitle','$serviceDescription','$serviceFile')";

                $pdo-> exec ($sqlservice);

                echo 'La page service a été mise à jour';
?>