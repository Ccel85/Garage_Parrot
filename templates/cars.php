
<!--affichage annonce car-->
<div class="container carCard">
  <div class="card" id="card" >
    <div class="card-body"> 
    <img class="card-img-top" alt="Image véhicule" src="<?php echo $car['img1']; ?>" alt="image vehicule">
      <h2 class="card-title"><?=$car['modele']; ?></h2>
      <div class="logo-card">
      <div class="logos">
        <img src="../assets/logo/logo_carburant.svg">
        <p class="energy"><?= $car['energy'];?></p>
      </div>
      <div class="logos">
        <img src="../assets/logo/logo_compteur_vitesse.svg">
        <p class="km"><?= $car['km'].' Km'; ?></p>
      </div>
      <div class="logos">
        <img src="../assets/logo/logo_calendrier.svg">
        <p class="year"><?= $car['year']; ?></p>
      </div>
      </div>
      <div>
      <h2 class="prix"><?= $car['price']." "."€"; ?></h2>  
      </div>
      <!---->
        
      <button  class="button-occasions" value="<?php echo $car['id']; ?>">Plus de détails</button>
      
    <div><?= "Référence de l'annonce : 00".$car['id']; ?></div>
    </div>
  </div>
</div>
