<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Garage V.Parrot</title>
<!--Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<!--feuille CSS -->
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php include'header.php';?>
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
  <div class="container">
    <!--card-->
  <div class="card" style="width: 18rem;">
  <img src="../assets/img/img_occasion_captur.png" class="card-img-top" alt="Renault Captur">
  <div class="card-body">
    <h5 class="card-title">RENAULT Captur
        0.9 TCe 90ch Stop&Start energy</h5>
    <div class="logo-card">
      <div class="logos">
        <img src="../assets/logo/logo_carburant.svg">
        <!--<p class=""><?php echo $Carburant ?></p>-->
      </div>
      <div class="logos">
        <img src="../assets/logo/logo_compteur_vitesse.svg">
        <!--<p class=""><?php echo $kilometre ?></p>-->
      </div>
      <div class="logos">
        <img src="../assets/logo/logo_calendrier.svg">
        <!--<p class=""><?php echo $annee ?></p>-->
      </div>
    </div>
    <div>
      <h2 class="prix">10 000€</h2>  
      </div>
    <button class="button-occasions">Plus de détails</button>
  </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php include 'footer.html' ?>
