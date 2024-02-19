<?php 
include('../config/sessionStop.php');
include('../Session/variable.php');
include('../config/configsql.php');
include('../templates/header.php');?>

<?php 
if (isset($_GET['id'])) {
  $carId = $_GET['id'];
  // Utiliser l'ID pour récupérer les détails de l'annonce depuis la base de données
  $carDetails = getCarById($adminpdo,$carId);}
  // Vérifier si l'annonce existe
  if ($carDetails) {?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
        <li class="breadcrumb-item"><a href="../templates/index.php">Accueil </a></li>
        <li class="breadcrumb-item"><a href="../templates/nos_occasions.php">Nos occasions </a></li>
        <li class="breadcrumb-item active" aria-current="page"></li>
</nav>
<div class="container  announcement-container announcement-<?= $carDetails['id']?>" >  
    <div id="myCarousel" class="carousel slide mb-6 pointer-event" data-bs-ride="carousel">
<?php
$idVehicule = $carId;
// Chemin vers le dossier d'images du véhicule
$cheminDossierImagesVehicule = '../assets/img/';
// Liste des fichiers d'images dans le dossier du véhicule
$fichiersImagesVehicule = scandir($cheminDossierImagesVehicule);
// Filtrer les résultats pour ne conserver que les dossiers (en excluant . et ..)
$dossiersImages = array_filter($fichiersImagesVehicule, function ($element) use ($cheminDossierImagesVehicule) {
    return is_dir($cheminDossierImagesVehicule . '/' . $element) && !in_array($element, ['.', '..']);
});
$idVehicule  =$_GET['id'] + 1;
// Utilisez cet index pour récupérer le nom du dossier image correspondant
if (!empty($dossiersImages)) {
  $nomDossierImage = $dossiersImages[$idVehicule];
  $cheminDossier = $cheminDossierImagesVehicule . '/' . $nomDossierImage;
  $contenuDossier = scandir($cheminDossier);
// Filtrer les résultats pour ne conserver que les fichiers (en excluant . et ..)
    $fichiersImages = array_filter($contenuDossier, function ($element) use ($cheminDossier) {
    return is_file($cheminDossier . '/' . $element) && !in_array($element, ['.', '..']);
      });
      }
// Afficher le carrousel seulement s'il y a des images dans ce dossier
  if (!empty($fichiersImages)) {
      echo '<div class="carrousel">';
      echo '<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">';
      echo '<div class="carousel-inner text-center ">';
      foreach ($fichiersImages as $index => $fichierImage) {
        echo '<div class="carousel-item imgcarousel' . ($index === 2 ? ' active' : '') . '">';
        echo '<img class="card-img imgcarousel" src="' . $cheminDossier . '/' . $fichierImage . '" alt="' . $fichierImage . '">';
        echo '</div>';
      }
      echo '</div>';
// Boutons de contrôle pour passer à l'image suivante ou précédente
    echo '<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">';
    echo '<span class="carousel-control-prev-icon" aria-hidden="true"></span>';
    echo '<span class="visually-hidden">Previous</span>';
    echo '</button>';
    echo '<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">';
    echo '<span class="carousel-control-next-icon" aria-hidden="true"></span>';
    echo '<span class="visually-hidden">Next</span>';
    echo '</button>';
    echo '</div>';
    echo '</div>'; 
    } else {
        echo "Aucune image trouvée dans le dossier $dossier.";
    }
} else {
    echo "Aucun dossier d'images trouvé.";
}
// Supposons que $carId contient l'ID du véhicule
  $idVehicule  =$_GET['id'] + 1;
  // Utilisez cet index pour récupérer le nom du dossier image correspondant
  $nomDossierImage = $dossiersImages[$idVehicule];?>
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
  <?php ?>
  </div>
<?php ?>
</div>
</form>
<?php include '../templates/footer.php' ?>
<script>demandeInfo()</script>