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
    <div class="nosServices">
            <div class="mecanique">
                <img src="../assets/img/img_service_mecanique.png" alt="image mecanique">
                <div class="texteMecanique">
                <h2>MECANIQUE</h2>
                <p>Nous intervenons sur tous types de travaux, sur de l’entretien classique aussi bien que sur de la mécanique lourde.<br>
                    Le garage effectue vos révisons périodiques et vidanges sur tous types de véhicules,même les plus récents.</p>
                </div>
            </div>
            <div class="carrosserie">        
                <div class="texteCarrosserie">
                    <h2>CARROSSERIE</h2>
                    <p>Nous disposons de notre propre atelier de carosserie et de sa cabine de peinture.<br>
                    Nous proposons le:</p>
                    <ul>
                        <li>-Redressage et remise en état</li>
                        <li>-Débosselage</li>
                        <li>-Peinture de votre carosserie</li>
                        <li>-Lustrage</li>
                        <li>-Vernissage</li>
                    </ul>
                </div>
                <img src="../assets/img/img_service_carrosserie.png" alt="image carrosserie">
            </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php include 'footer.html' ?>