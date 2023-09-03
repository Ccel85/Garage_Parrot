<?php 
include('../config/sessionStart.php');
include('variable.php');
include('../config/configsql.php');
include('../html/header.php');

    ?>
    <h1>Bonjour <?php  ($_SESSION['nom']) ?></h1>
<nav>
    <ul>
        <a href="adminVehicule.php"><li>Gestion des vehicules</li></a>
        <a href="#"><li>Gestion des avis</li></a>
        <a href="#"><li>Message clients</li></a>
        <a href="deconnection.php"><li>Déconnexion</li></a>
        <p> Vous êtes connecté en tant qu'<?php echo $loggedUser?></p>
    </ul>
</nav>