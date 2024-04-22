<?php 

include('../config/sessionStart.php');
include('../Session/variable.php');
include('../config/configsql.php');

// Page de connexion utilisateur
if(isset($_POST['email']) && isset($_POST['mdp'])) {
// Récupération des valeurs du formulaire
$email = $_POST['email'];
$password = $_POST['mdp'];
try{
// Création de l'objet User avec les données du formulaire
$user = new User($email, $password);
// Fonction connection utilisateur
User :: connect($pdo,$email,$password);
} catch (PDOException $e) {

  echo 'Erreur lors de la connexion : '.$e->getMessage();
}
}
?>
