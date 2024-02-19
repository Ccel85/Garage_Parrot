<?php 
session_start();
include('../config/sessionStop.php');
include('../Session/variable.php');
include('../config/configsql.php');
include('../templates/header.php');

    $totalCars = numberCars($adminpdo);
    $totalMessage = numbermessage($adminpdo);
    $totalComments = numberComments($adminpdo);

//PAGE SESSION ADMIN?>

<div>
    <p class="text-center"> Bonjour <span class="textRed "><?php echo $_SESSION['surname'] . ' ' . $_SESSION['name'].', '; ?></span> vous êtes connecté en tant qu'<span class="textRed"><?php echo $_SESSION['role']?></span>. </p>
    <br>
    <div class="menu">    
        <nav>   
            <div class=" menuAdmin">
                <ul class="list-group">
                    <a href="../templates/adminUtilisateurs.php">
                    <li class="list-group-item d-flex justify-content-between align-items-center" >Gestion des utilisateurs</li></a>
                    <a href="../templates/editServicePage.php">
                    <li class="list-group-item d-flex justify-content-between align-items-center">Gestion des services</li></a>
                    <a href="../templates/adminHoraire.php">
                    <li class="list-group-item d-flex justify-content-between align-items-center">Gestion des horaires</li></a>
                    <a href="../templates/editCarPage.php">
                    <li class="list-group-item d-flex justify-content-between align-items-center">Gestion des véhicules</li></a>
                    <a href="../templates/messagePage.php">
                    <li class="list-group-item d-flex justify-content-between align-items-center">Gestion Message client</li></a>
                    <a href="../Session/deconnexion.php">
                    <li class="list-group-item d-flex justify-content-between align-items-center">Déconnexion</li></a><br>
                </ul>
            </div>
        </nav>
    
        <div class="tableauBord">
            <ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
                Nombre de message non lu
                    <span class="badge  rounded-pill m-2"><?php echo ($totalMessage)?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                Nombre d'annonce en ligne
                    <span class="badge  rounded-pill m-2"><?php echo ($totalCars)?></span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                Nombre d'avis
                    <span class="badge  rounded-pill m-2"><?php echo ($totalComments)?></span>
                </li>
            </ul>
        </div>
    </div>
</div>
<br>
<?php include '../templates/footer.php' ?>
</html>
    