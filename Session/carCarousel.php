<?php 
include('../templates/header.php');
include('../config/sessionStart.php');
include('../Session/variable.php');?>

<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../assets\img\1-jeepcompass\W102834019_STANDARD_1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../assets\img\1-jeepcompass\E112536985_STANDARD_7.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="../assets\img\1-jeepcompass\W102834019_STANDARD_2.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<?php include '../templates/footer.php' ?>

<?php
// Chemin du répertoire où se trouvent les images
$cheminRepertoire = '../assets/img';

// Liste des fichiers et dossiers dans le répertoire
$contenuRepertoire = scandir($cheminRepertoire);

// Filtrer les résultats pour ne conserver que les dossiers (en excluant . et ..)
$dossiersImages = array_filter($contenuRepertoire, function ($element) use ($cheminRepertoire) {
    return is_dir($cheminRepertoire . '/' . $element) && !in_array($element, ['.', '..']);
});

// Afficher le tableau des dossiers
var_dump($dossiersImages);
if (!empty($dossiersImages)) {
    foreach ($dossiersImages as $dossier) {
        echo '<h2>Dossier : ' . $dossier . '</h2>';

        // Obtenir la liste des fichiers dans le dossier
        $cheminDossier = $cheminRepertoire . '/' . $dossier;
        $contenuDossier = scandir($cheminDossier);

        // Filtrer les résultats pour ne conserver que les fichiers (en excluant . et ..)
        $fichiersImages = array_filter($contenuDossier, function ($element) use ($cheminDossier) {
            return is_file($cheminDossier . '/' . $element) && !in_array($element, ['.', '..']);
        });

        // Afficher le carrousel
        if (!empty($fichiersImages)) {
            echo '<div class="carrousel">';
              //code modifier en test
      $cars = getCarbyId($adminpdo);
      foreach ($cars as $carKey => $car) { 
          foreach ($fichiersImages as $imageKey => $fichier) {
            if ($carKey + 2 === $imageKey) { 
                echo '<img src="' . $cheminDossier . '/' . $fichier . '" alt="' . $fichier . '">';?>
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="' . $cheminDossier . '/' . $fichier . '" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="../assets\img\1-jeepcompass\E112536985_STANDARD_7.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="../assets\img\1-jeepcompass\W102834019_STANDARD_2.jpg" class="d-block w-100" alt="...">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
              </div>
             <?php }
          }
        }
            echo '</div>';
        } else {
            echo '<p>Aucun fichier d\'image trouvé dans le dossier.</p>';
        }
    }
} else {
    echo 'Aucun dossier d\'images trouvé dans le répertoire.';
}
?>

