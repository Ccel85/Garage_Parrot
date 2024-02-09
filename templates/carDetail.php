<?php 
include('header.php');
include('../config/sessionStart.php');
include('../Session/variable.php');?>

<?php 
if (isset($_GET['id'])) {
  $carId = $_GET['id'];
  // Utiliser l'ID pour récupérer les détails de l'annonce depuis la base de données
$carDetails = getCarById($adminpdo,$carId);}
  // Vérifier si l'annonce existe
  if ($carDetails) {
  foreach ($carImages as $imageKey => $carImage) {
    if ($carDetails['id'] === $imageKey) { ?>
<div class="container  announcement-container announcement-<?= $carDetails['id']?>" >

    <!-- debut test caroussel-->
    <div id="myCarousel" class="carousel slide mb-6 pointer-event" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2" class="active" aria-current="true"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item">
          <img class="bd-placeholder-img card-img" width="60%" height="60%" src="<?= $carImage;?>" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></img>
        </div>
        <div class="carousel-item active">
          <img class="bd-placeholder-img card-img" width="60%" height="60%" src="../assets/img/2-audirs4/E113347647_STANDARD_1.jpg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></img>
          </div>
        <div class="carousel-item">
          <img class="bd-placeholder-img card-img" width="60%" height="60%" src="../assets/img/2-audirs4/E113347647_STANDARD_1.jpg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"><rect width="100%" height="100%" fill="var(--bs-secondary-color)"></rect></img>
          </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Précédent</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Suivant</span>
      </button>
    </div>

  <!--<img class="img-top" alt="Image véhicule" src="<?= $carImage;?>">--><br>
  <div>
  <h1 class="carTitle"><?=$carDetails['modele']; ?></h1>
    <br>
    <h1 class="carContent"><?= $carDetails['carContent']; ?></h1>  
  </div>
  <div class="logo-card">
    <div class="logos">
      <img src="../assets/logo/logo_carburant.svg">
      <p class=""><?= $carDetails['energy'];?></p>
    </div>
    <div class="logos">
      <img src="../assets/logo/logo_compteur_vitesse.svg">
      <p class=""><?= $carDetails['km']; ?></p>
    </div>
    <div class="logos">
      <img src="../assets/logo/logo_calendrier.svg">
      <p class=""><?= $carDetails['year']; ?></p>
    </div>
  </div>
    <hr>
  <div class="carCaracteristique">
    <div class="carGeneral">
      <ul>  
        <div class="carDetail">
          <h2>Caracteristiques générales :</h2>
          <li>                
            <span class="titleDescritpion">Couleur :</span>
            <span class="color"><?= $carDetails['color']; ?></span>
          </li>
          <li>
            <span class="titleDescritpion">Boite :</span>
            <span class="carBoite"><?= $carDetails['carBoite']; ?></span>
          </li>
          <li>
            <span class="titleDescritpion">Nbre de porte :</span>
            <span class="carDoor"><?= $carDetails['carDoor']; ?></span>
          </li>
          <li>
            <span class="titleDescritpion">PuissanceFiscale :</span>
            <span class="puissanceFiscale"><?= $carDetails['puissanceFiscale'].' CV'; ?></span>
          </li>
          <li>
            <span class="titleDescritpion">Puissance :(DIN)</span>
            <span class="Puissance"><?= $carDetails['Puissance'].' ch'; ?></span>
          </li>
        </div>
        <br>
        <div class="guarantie">
          <h2>Guarantie :</h2>
          <span class=""><?= $carDetails['guarantie'].' mois'; ?></span>
        </div>
      </div>
      <div class="carInfos">
        <div class="carInterieur">
          <li class="carInterieur">
            <h2>Intérieur :</h2>
<?php $dataInterieur= explode(',', $carDetails['interieur']);
      foreach ($dataInterieur as $value)
  {?>
        <span class="interieur"><?= $value.'<br>'; ?></span>
<?php } ?>
          </li>
        </ul>
      </div>
      <br>
      <div class="chassis">
        <h2>Chassis :</h2>
  <?php $dataChassis= explode(',', $carDetails['chassis']);
      foreach ($dataChassis as $value)
      {?>
        <span class=""><?= $value.'<br>'; ?></span>
<?php } ?>
      <div class="autre">
<?php if (isset ($carDetails['autre'])&& !empty($carDetails['autre'])){?>
        <h2>Autre :</h2><br>
<?php
      $dataAutre= explode(',', $carDetails['autre']);
      foreach ($dataAutre as $value){?>
        <span class="autre"><?= $value.'<br>'; ?></span>
    <?php }}; ?>   
      </div>
    </div>
  </div>
</div>
    <hr>
      <div class="prix">
        <h2 class="prix">Prix :</h2>
        <h2 class="prix"><?= $carDetails['price']." "."€"; ?></h2>  
      </div>
    <hr>
  <div class="footerOccasion">  
    <div style="text-align: center;"><?= "Référence de l'annonce : 00".$carDetails['id']; ?></div>
      <div class=""> 
        <div>
        <button class="demandeInfo  button" id="demandeInfo" name="demandeInfo">Demande d'info</button>
        </div>
        <div> 
        <button  class="back button" onclick="window.location.href = '../templates/nos_occasions.php';">Retour</button>
        </div>
        
      </div>
    </div>
  <?php }?>
  </div>
<?php }}?>
</div>
</form>
<?php include '../templates/footer.php' ?>
<script>demandeInfo()</script>