<?php 

include('../Session/variable.php');
include('../config/sessionStart.php');
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
        <h3>Avis client</h3>
        <hr>
        <div>
        <?php $comments = checkComments($adminpdo);
        foreach($comments as $comment){
        $dateFormatee = date("d-m-y", strtotime($comment['date']));?>
            <p class="blog-post-meta"><?= ($dateFormatee).' '. ($comment['pseudo']) ?></p>
            <p><?= htmlspecialchars($comment['comments']) ?>
            <span value="" id="rating">-Note : <?=htmlspecialchars($comment['rating']) ?></span>
            <span class="etoilesContainer"></span>
            <hr>
            <?php }?>
        </div>
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
    // Sélectionnez tous les éléments ayant la classe "rating"
    var ratings = document.querySelectorAll('.rating');
    // Pour chaque élément, convertissez la valeur en étoiles
    ratings.forEach(function(ratingElement) {
        var rating = parseInt(ratingElement.textContent); // Convertit le contenu en nombre
        var etoiles = afficherEtoiles(rating); // Convertit le nombre en étoiles en utilisant la fonction définie ci-dessus
        var etoilesContainer = ratingElement.nextElementSibling; // Sélectionne l'élément suivant (qui est le conteneur des étoiles)
        etoilesContainer.textContent = etoiles; // Affiche les étoiles dans le conteneur
    });
</script>
<?php include 'footer.php' ?>
