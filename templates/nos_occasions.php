<?php 
session_start();
include('../Session/variable.php');
include('../config/configsql.php');
include('../templates/header.php');

$cars = getCar($adminpdo);

//fonction recupere valeur min et max en BDD des filtres
$minMaxRange = minMaxRange($adminpdo);
?>
<nav aria-label="breadcrumb">
    <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
        <li class="breadcrumb-item"><a href="../templates/index.php">Accueil </a></li>
        <li class="breadcrumb-item active" aria-current="page"></li>
</nav>
  <div class="filtres">
    <h3>Filtres:</h3>
    <div class="filter">
      <div class="price">
        <h3>Prix</h3>
        <input type="range" id="prix" name="prix" min="<?php echo $minMaxRange["min_prix"];?>" max="<?php echo $minMaxRange["max_prix"];?>" value="<?php echo $minMaxRange["max_prix"];?>" step="1000" >
        <span id="prixValeur"></span>
      </div>
      <div class="année">
        <h3>Année</h3>
        <input type="range" id="annee" name="annee" min="<?php echo $minMaxRange["min_annee"];?>" max="<?php echo $minMaxRange["max_annee"];?>" value="<?php echo $minMaxRange["max_annee"];?>" step="1" >
        <span id="anneeValeur"></span>
      </div>
      <div class="km">
        <h3>Kilométrage</h3>
        <input type="range" id="km" name="km" min="<?php echo $minMaxRange["min_km"];?>" max="<?php echo $minMaxRange["max_km"];?>"  value="<?php echo $minMaxRange["max_km"];?>"step="5000">
        <span id="kmValeur"></span>
    </div>
    </div>
  </div>
  <div class="cards">  
  <?php 
  //if (isset($_POST['prix'])) {
    //getFilteredVehicles($adminpdo, $minPrix, $maxPrix, $minAnnee, $maxAnnee, $minKm, $maxKm);

  foreach ($cars as $carKey => $car) { 
    foreach ($carImages as $imageKey => $carImage) {
      if ($car['id'] === $imageKey) { 
              include('../templates/cars.php'); 
      }
      }
    }
  
  ?>
</div>  
<script>
   // Ajouter des écouteurs d'événements pour chaque curseur
    document.getElementById("prix").addEventListener("input", function () {    
        afficherValeur("prix", "prixValeur");
        updatePrixValue();
        getFilteredVehicles(parseInt(document.getElementById("prix").value), parseInt(document.getElementById("annee").value), parseInt(document.getElementById("km").value));
    });
    // Ajouter un écouteur d'événements pour le curseur d'année
    document.getElementById("annee").addEventListener("input", function () {
    // Mettre à jour l'affichage de la valeur du curseur d'année
    afficherValeur("annee", "anneeValeur");
    // Mettre à jour les filtres et afficher les cartes correspondantes en fonction de la valeur du curseur d'année
    getFilteredVehicles(parseInt(document.getElementById("prix").value), parseInt(document.getElementById("annee").value), parseInt(document.getElementById("km").value));
});
// Ajouter un écouteur d'événements pour le curseur de kilométrage
    document.getElementById("km").addEventListener("input", function () {
    // Mettre à jour l'affichage de la valeur du curseur de kilométrage
    afficherValeur("km", "kmValeur");
    // Mettre à jour les filtres et afficher les cartes correspondantes en fonction de la valeur du curseur de kilométrage
    getFilteredVehicles(parseInt(document.getElementById("prix").value), parseInt(document.getElementById("annee").value), parseInt(document.getElementById("km").value));
});


</script>
  <?php include '../templates/footer.php' ?>
