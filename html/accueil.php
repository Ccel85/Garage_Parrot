<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Garage V.Parrot</title>
<!--Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<!--feuille CSS -->
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php include'header.html';?>
<div>
    <img class="imageAccueil" src="../assets/img/img_accueil.png"  alt="image_accueil">
</div>
<div>
    <p class="promesse">Le <span>Garage V.Parrot</span> vous propose une large gamme<span> de services</span>
        afin de garantir la <span>performance</span> et la <span>sécurité</span> de votre véhicule.<br>     
        Nous vous proposons aussi des <span>véhicules d’occasion</span> à la vente .<br>    
        Le garage V.Parrot vous assure un <span> traitement personnalisé</span> de vos besoins et demandes.</p>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php include 'footer.html' ?>
