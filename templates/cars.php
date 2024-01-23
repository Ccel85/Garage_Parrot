
<!--affichage annonce car-->
<div class="container">
  <div class="card" >
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
        <p class=""><?= $car['km']; ?></p>
      </div>
      <div class="logos">
        <img src="../assets/logo/logo_calendrier.svg">
        <p class=""><?= $car['year']; ?></p>
      </div>
      </div>
      <div>
      <h2 class="prix"><?= $car['price']." "."€"; ?></h2>  
      </div>
    <button class="button-occasions">Plus de détails</button>
    <div><?= "Ref annonce :".$car['id']; ?></div>
    </div>
    <?php //endforeach; ?>
  </div>
</div>
