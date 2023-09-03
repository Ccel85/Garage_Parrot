
<div class="container-fluid">
    <!--card-->
  <div class="card border-primary mb-3 row row-cols-1 row-cols-md-" >
    <img src=<?= $car['image']?> class="card-img-top" alt="Renault Captur">
    <div class="card-body container-fluid ">
      <h5 class="card-title"><?=$car['modele']; ?></h5>
      <div class="logo-card row">
        <div class="logos w-auto">
          <img class="w-auto "src="../assets/logo/logo_carburant.svg">
          <p class=" card-text w-auto"><?= $car['carburant'];?></p>
        </div>
        <div class="logos w-auto ">
          <img class="w-auto " src="../assets/logo/logo_compteur_vitesse.svg">
          <p class=" card-text w-auto"><?= $car['km']; ?></p>
        </div>
        <div class="logos w-auto">
          <img class="w-auto " src="../assets/logo/logo_calendrier.svg">
          <p class="card-text w-auto"><?= $car['année']; ?></p>
        </div>
      </div>
      <div class="row">
      <h2 class="prix"><?= $car['Prix']." "."€"; ?></h2>  
      </div>
    <button class="button-occasions  text-center">Plus de détails</button>
    <div class="row"><?= "Ref annonce :".$car['id']; ?></div>
    </div>
  </div>
</div>



