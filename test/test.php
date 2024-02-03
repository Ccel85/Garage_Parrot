<?php
include('../templates/header.php');
include('../Session/variable.php');
include('../config/configsql.php');


//$minMaxRange = minMaxRange($adminpdo);
$cars = getCarbyId($adminpdo);
$minMaxRange = minMaxRange($adminpdo);


/*try{

$pdo = new PDO ("mysql:host=localhost;port=3306;dbname=garageparrot",'user','3f7zhhRn4NH69R' );
$pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "<br> Connexion à la bdd : OK !"."<br>";

//Recuperer tous les utilisateurs

$query = "SELECT * FROM users";
$stmt = $pdo->query($query);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

//Afficher les utilisateurs

foreach ($users as $user){
    echo"ID:".$user['id']."<br>";
    echo"ID:".$user['name']."<br>";
    echo"ID:".$user['surname']."<br>";
    echo"ID:".$user['email']."<br>";
    echo "<br>";
}

} catch(PDOException $e) {
        echo "Erreur de connection a la BDD" . $e->getMessage();
}*/
if (isset($filters)){
function getFilteredVehicles(PDO $adminpdo, $minPrix, $maxPrix, $minAnnee, $maxAnnee, $minKm, $maxKm) {
    // Requête SQL avec des paramètres de filtrage
    $requete = "SELECT * FROM cars
                WHERE price BETWEEN :min_prix AND :max_prix
                AND year BETWEEN :min_annee AND :max_annee
                AND km BETWEEN :min_km AND :max_km";

    // Préparation de la requête
    $stmt = $adminpdo->prepare($requete);

    // Attribution des valeurs aux paramètres
    $stmt->bindParam(':min_prix', $minPrix, PDO::PARAM_INT);
    $stmt->bindParam(':max_prix', $maxPrix, PDO::PARAM_INT);
    $stmt->bindParam(':min_annee', $minAnnee, PDO::PARAM_INT);
    $stmt->bindParam(':max_annee', $maxAnnee, PDO::PARAM_INT);
    $stmt->bindParam(':min_km', $minKm, PDO::PARAM_INT);
    $stmt->bindParam(':max_km', $maxKm, PDO::PARAM_INT);

    // Exécution de la requête
    $stmt->execute();

    // Récupération des résultats
    $resultats = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Fermeture de la requête
    $stmt->closeCursor();

    return $resultats;
}

// Utilisation de la fonction avec les valeurs des filtres
$minPrix = $minMaxRange["min_prix"];
$maxPrix = $minMaxRange["max_prix"];
$minAnnee = $minMaxRange["min_annee"];
$maxAnnee = $minMaxRange["max_annee"];
$minKm = $minMaxRange["min_km"];
$maxKm = $minMaxRange["max_km"];

$resultatsFiltres = getFilteredVehicles($adminpdo, $minPrix, $maxPrix, $minAnnee, $maxAnnee, $minKm, $maxKm);
var_dump($resultatsFiltres);
// Affichage des résultats
foreach ($resultatsFiltres as $vehicule) {
    echo "ID : " . $vehicule['id'] . " - Marque : " . $vehicule['modele'] . "<br>";
    // Ajoutez d'autres détails selon votre structure de base de données
}
}
?>
