<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
<!--feuille CSS -->
<link rel="stylesheet" href="../css/style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
<title>Garage V.Parrot</title>
</head>
<body>
<?php include'header.html';?>
  <div class="">
    <h2>Filtres:</h2>
    <div class="filter">
    <div class="prix">
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
    <a class="button-occasions">Plus de détails</a>
  </div>
</div>
</div>
</body>
<?php include 'footer.html' ?>
