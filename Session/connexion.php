<?php 
include('../Session/variable.php');
include('../config/configsql.php');

// Page de connexion utilisateur

// Récupération des valeurs du formulaire
$email = $_POST['email'];
$password = $_POST['mdp'];

// Création de l'objet User avec les données du formulaire

$user = new User($email, $password);

// Fonction connection utilisateur
User :: connect($pdo,$email,$password);

?>
