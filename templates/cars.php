
<!--affichage annonce car-->
<div class="container">
  <div class="card" id="card" >
    <div class="card-body"> 
    <img class="card-img-top" alt="Renault Captur" src="<?= $carImage;?>">
      <h5 class="card-title"><?=$car['modele']; ?></h5>
      <div class="logo-card">
      <div class="logos">
        <img src="../assets/logo/logo_carburant.svg">
        <p class=""><?= $car['energy'];?></p>
      </div>
      <div class="logos">
        <img src="../assets/logo/logo_compteur_vitesse.svg">
        <p class=""><?= $car['km'].' Km'; ?></p>
      </div>
      <div class="logos">
        <img src="../assets/logo/logo_calendrier.svg">
        <p class=""><?= $car['year']; ?></p>
      </div>
      </div>
      <div>
      <h2 class="prix"><?= $car['price']." "."€"; ?></h2>  
      </div>
    
    <button onclick="window.location.href = '../templates/carDetail.php';" class="button-occasions">Plus de détails</button>
    <div><?= "Référence de l'annonce : 00".$car['id']; ?></div>
    </div>
  </div>
</div>
