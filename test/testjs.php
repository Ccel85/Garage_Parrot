<?php 
include('../templates/header.php');
include('../Session/variable.php');
include('../config/configsql.php');
include('../config/sessionStart.php');
?>
<?php $cars = getCarbyId($adminpdo);
      $minMaxRange = minMaxRange($adminpdo);?>
      
  <div class="filtres">
    <h3>Filtres:</h3>
    <div class="filter">
      <div class="price">
        <h3>Prix</h3>
        <input type="range" id="prix" name="prix" min="<?php echo $minMaxRange["min_prix"];?>" max="<?php echo $minMaxRange["max_prix"];?>" step="1000" >
        <span id="prixValeur"></span>
      </div>
      <div class="année">
        <h3>Année</h3>
        <input type="range" id="annee" name="année" min="<?php echo $minMaxRange["min_annee"];?>" max="<?php echo $minMaxRange["max_annee"];?>" step="1" >
        <span id="anneeValeur"></span>
      </div>
      <div class="km">
        <h3>Kilométrage</h3>
        <input type="range" id="km" name="km" min="<?php echo $minMaxRange["min_km"];?>" max="<?php echo $minMaxRange["max_km"];?>" step="5000">
        <span id="kmValeur"></span>
    </div>
    </div>
  </div>
  <div class="cards">  
<?php foreach ($cars as $carKey => $car) : 
  //var_dump($car);?>  
  <?php foreach ($carImages as $imageKey => $carImage) :?>
    <?php if ($carKey === $imageKey) : ?>
            <?php include('../templates/cars.php'); ?>
            <?php endif;  ?>
            <?php endforeach; ?>
            <?php endforeach; ?>
  </div>  
  

  <?php include '../templates/footer.php' ?>