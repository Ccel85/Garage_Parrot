<?php 
session_start();
include('../Session/variable.php');
include('../config/configsql.php');
include ('../templates/header.php');
?>
    <div>
        <img class="imageAccueil" src="../assets/img/img_accueil.png"  alt="image_accueil">
    </div>
    <div>
        <p class="promesse">Le <span class="textRed">Garage V.Parrot</span> vous propose une large gamme<span class="textRed"> de services</span>
            afin de garantir la <span class="textRed">performance</span> et la <span class="textRed">sécurité</span> de votre véhicule.<br>     
            Nous vous proposons aussi des <span class="textRed">véhicules d’occasion</span> à la vente .<br>    
            Le garage V.Parrot vous assure un <span class="textRed"> traitement personnalisé</span> de vos besoins et demandes.</p>
    </div>
    <div class="navButton">
        <div class="button">
            <a href="nos_services.php">Réparation et entretien</a>
        </div>
        <div class="button">
            <a href="nos_occasions.php">Nos occasions</a>
        </div>
        <div class="button">
            <a href="contact.php">Contact</a>
        </div>
    </div>
    <div>
    <hr>
        <h3>Nos clients nous recommandent :</h3>
        <div>
        <?php 
        $comments=ratingComments($adminpdo);
        foreach($comments as $comment){
            $datePublication = strtotime($comment['date']);
            // Date actuelle
            $dateActuelle = time();
            // Calcul de la différence en jours
            $diffEnJours = floor(($dateActuelle - $datePublication) / (60 * 60 * 24));
            // Calcul de la différence en semaines
            $diffEnSemaines = floor($diffEnJours / 7);
            // Affichage du message en fonction de la différence
            if ($diffEnJours == 0) {
                echo "Publié aujourd'hui";
            } elseif ($diffEnJours == 1) {
                echo "Publié hier";
            } elseif ($diffEnJours < 7) {
                echo "Publié il y a " . $diffEnJours . " jours";
            } elseif ($diffEnSemaines == 1) {
                echo "Publié il y a 1 semaine";
            } else {
                echo "Publié il y a " . $diffEnSemaines . " semaines";
            }?>
            <p class="blog-post-meta"><?=($comment['pseudo']) ?></p>
            <p><?= htmlspecialchars($comment['comments']) ?></p>
            <span value="" id="rating" class="rating" data-rating="<?=htmlspecialchars($comment['rating']) ?>">Note :</span>
            <span class="etoilesContainer"></span>
            <hr>
            <?php }?>
        </div>
    </div>
    <div>
    </div>
    <div>
    <?php include '../templates/comments_create.php'?>
    </div>
<script>
// Définition de la fonction pour afficher les étoiles en fonction du nombre donné
    function afficherEtoiles(nombre) {
        var etoiles = '';
        for (var i = 0; i < nombre; i++) {
            etoiles += '★'; // Ajoute une étoile à chaque itération
        }
        return etoiles;
    }
    document.addEventListener("DOMContentLoaded", function() {
        // Sélectionnez tous les éléments ayant la classe "rating"
        var ratings = document.querySelectorAll('.rating');
        // Pour chaque élément, convertissez la valeur en étoiles
        ratings.forEach(function(ratingElement) {
            var rating = parseInt(ratingElement.dataset.rating); // Convertit le contenu en nombre
            console.log(rating);
            var etoiles = afficherEtoiles(rating); // Convertit le nombre en étoiles en utilisant la fonction définie ci-dessus
            console.log(etoiles);
            var etoilesContainer = ratingElement.nextElementSibling; // Sélectionne l'élément suivant (qui est le conteneur des étoiles)
            etoilesContainer.textContent = etoiles; // Affiche les étoiles dans le conteneur
            console.log(etoiles);
        });
    });
</script>
<?php include 'footer.php' ?>
