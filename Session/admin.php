<?php 
include('../config/sessionStart.php');
include('variable.php');
include('../config/configsql.php');
include('../html/header.php');

    //condition session admin
    ?>
    <nav>
    <h1>Bonjour, <?php /*User['prenom']." ".User['nom']."."*/ ?></h1>
        <ul>
            <a href="adminUtilisateurs.php"><li>Gestion des utilisateurs</li></a>
            <a href="editServicePage.php"><li>Gestion des services</li></a>
            <a href="#"><li>Gestion des infos</li></a>
            <a href="adminVehicule.php"><li>Gestion des vehicules</li></a>
            <a href="#"><li>Message clients</li></a>
            <a href="deconnection.php"><li>Déconnexion</li></a><br>
            <p> Vous êtes connecté en tant qu'<?php echo ($_SESSION['LOGGED_USER'])?>. </p>
        </ul>
    </nav>
<?php //}?>
<?php /* } else { ?>
    <h1>Bonjour <?php  ($_SESSION['nom']) ?></h1>
<nav>
    <ul>
        <a href="#"><li>Gestion des vehicules</li></a>
        <a href="#"><li>Gestion des avis</li></a>
        <a href="#"><li>Message clients</li></a>
        <a href="deconnection.php"><li>Déconnexion</li></a>
        <p> Vous êtes connecté en tant qu'<?php echo $loggedUser?></p>
    </ul>
</nav>
<?php }*/
?>