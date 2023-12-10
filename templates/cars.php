<div class="container">
    <!--card-->
  <div class="card" style="width: 18rem;">
    <img src=<?= $car['image']?> class="card-img-top" alt="Renault Captur">
    <div class="card-body">
      <h5 class="card-title"><?=$car['modele']; ?></h5>
      <div class="logo-card">
      <div class="logos">
        <img src="../assets/logo/logo_carburant.svg">
        <p class=""><?= $car['carburant'];?></p>
      </div>
      <div class="logos">
        <img src="../assets/logo/logo_compteur_vitesse.svg">
        <p class=""><?= $car['km']; ?></p>
      </div>
      <div class="logos">
        <img src="../assets/logo/logo_calendrier.svg">
        <p class=""><?= $car['année']; ?></p>
      </div>
      </div>
      <div>
      <h2 class="prix"><?= $car['Prix']." "."€"; ?></h2>  
      </div>
    <button class="button-occasions">Plus de détails</button>
    <div><?= "Ref annonce :".$car['id']; ?></div>
    </div>
  </div>
</div>


