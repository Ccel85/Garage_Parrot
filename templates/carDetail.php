<?php 
include('header.php');
include('../config/sessionStart.php');
include('../Session/variable.php');?>
<?php 
$cars = getCarbyId($adminpdo);
foreach ($cars as $carKey => $car) { ?>
  <?php foreach ($carImages as $imageKey => $carImage) {?>
    <?php if ($carKey === $imageKey) { ?>
<div class="container">
  <div class="card" >
    <div class="card-body"> 
      <!--  inclure manege image-->
      <img class="card-img-top" alt="Renault Captur" src="<?= $carImage;?>"><br>
      <h2 class="card-title"><?=$car['modele']; ?></h2>
      <div>
      <br>
      <h2 class="carContent"><?= $car['carContent']; ?></h2>  
    </div>
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
      <hr>
      <div class="carCaracteristique">
        <div class="carGeneral">
          <ul>  
            <div class="carDetail">
            <h2>Caracteristiques générales :</h2><br>
              <li>                
                <span class="titleDescritpion">Couleur :</span>
                <span class="color"><?= $car['color']; ?></span>
              </li>
              <li>
                <span class="titleDescritpion">Boite :</span>
                <span class="carBoite"><?= $car['carBoite']; ?></span>
              </li>
              <li>
                <span class="titleDescritpion">Nbre de porte :</span>
                <span class="carDoor"><?= $car['carDoor']; ?></span>
              </li>
              <li>
                <span class="titleDescritpion">PuissanceFiscale :</span>
                <span class="puissanceFiscale"><?= $car['puissanceFiscale'].' CV'; ?></span>
              </li>
              <li>
                <span class="titleDescritpion">Puissance :(DIN)</span>
                <span class="Puissance"><?= $car['Puissance'].' ch'; ?></span>
              </li>
            </div>
            <div class="guarantie">
                <h2>Guarantie :</h2><br>
                <span class=""><?= $car['guarantie'].' mois'; ?></span>
            </div>
        </div>
        <div class="carInfos">
            <div class="carInterieur">
              <li class="carInterieur">
                <h2>Intérieur :</h2><br>
                <?php $dataInterieur= explode(',', $car['interieur']);
                foreach ($dataInterieur as $value)
                {?>
                <span class="interieur"><?= $value.'<br>'; ?></span>
                <?php } ?>
              </li>
            </ul>
            </div>
            <div class="chassis">
                <h2>Chassis :</h2><br>
                <?php $dataChassis= explode(',', $car['chassis']);
                foreach ($dataChassis as $value)
                {?>
                <span class=""><?= $value.'<br>'; ?></span>
                <?php } ?>
              <div class="autre">
              <?php
              if (isset ($car['autre'])&& !empty($car['autre'])){?>
              <h2>Autre :</h2><br>
              <?php
              $dataAutre= explode(',', $car['autre']);
                foreach ($dataAutre as $value){
                ?>
                <span class="autre"><?= $value.'<br>'; ?></span>
                <?php }}; ?>   
                </div>
            </div>
        </div>
      </div>
      <hr>
      <div class="prix">
        <h2 class="prix">Prix :</h2>
        <h2 class="prix"><?= $car['price']." "."€"; ?></h2>  
      </div>
      <div><?= "Référence de l'annonce : 00".$car['id']; ?></div>
  </div>
  <?php }}?>
  </div>
<?php } ?>
</div>
<?php include '../templates/footer.php' ?>