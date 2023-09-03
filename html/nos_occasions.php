<?php 
include('../html/header.php');
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
  <?php $cars = getcars($pdo);?>
  <div>  
    <?php foreach ($cars as $key => $car) {
    include('cars.php');
  }
  ?>
  </div> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
  <?php include ('../html/footer.html') ?>
