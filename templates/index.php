<?php 
include ('../templates/header.php');
include ('../config/sessionStart.php');
include('../Session/variable.php');
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
    <h3>Avis client:</h3>
    <div class="avis">

    </div>
</div>
<?php include 'footer.php' ?>
