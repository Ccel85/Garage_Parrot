<?php 
include('../Session/variable.php');
include('../config/configsql.php');
include('../html/header.php');

//on recupere les données de la table service 
$services = getservice($pdo);

foreach ($services as $service){
  if(isset($_POST['modifierService'])) {
  // Réecriture des variables
  $id='id';
 $titre_service=$_POST['title'];
  $description_service=$_POST['description'];
  $image_service=$_POST['image'];}

  // Requête de modification d'enregistrement
  $sth= $pdo->prepare ("UPDATE `garageparrot`.`service` SET title='$titre_service',
  description='$description_service',image='$image_service' WHERE id = :id
  ");
  $sth->bindParam (':id',$id,PDO::PARAM_INT);
  $sth->execute();

  //return $resultat->fetchAll();

if(!$sth) {
    echo("La modification a echouée");
   }
   else {
     echo "<div class='alert alert-success'><h1>Requête validée !</h1><p>La mise a jour a bien été effectuée !</p>";
   }
  }
  // Fin du test isset
 
  ?>