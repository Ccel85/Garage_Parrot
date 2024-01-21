<?php 
include('header.php');
include('../Session/variable.php');
include('../config/configsql.php');
include('../config/sessionStart.php');
?>
  <div class="filtres">
    <h3>Filtres:</h3>
    <div class="filter">
      <div class="price">
        <h3>Prix</h3>
        <input type="range" id="prix" name="prix" min="0 €" max="20 000€">
      </div>
      <div class="année">
        <h3>Année</h3>
        <input type="range" id="année" name="année" min="0 €" max="20 000€">
        <label for="année"></label>
      </div>
      <div class="km">
        <h3>Kilométrage</h3>
        <input type="range" id="km" name="km" min="0 €" max="20 000€">
        <label for="km"></label>
      </div>
    </div>
  </div>
  <?php $cars = getCarbyId($adminpdo);?>
  <div class="cards">  
    <?php foreach ($cars as $key => $car) {
    include('cars.php');
  }
  ?>
  </div>  
  <?php include '../templates/footer.php' ?>
