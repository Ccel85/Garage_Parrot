<?php 
include('../config/sessionStart.php');
include('../Session/variable.php');
include('../config/configsql.php');
include('../templates/header.php');
    //condition session admin
    ?>
    <nav>
        <h1> Bonjour, <?php echo $_SESSION['surname'] . ' ' . $_SESSION['name']; ?> </h1>
        <ul>
            <a href="adminUtilisateurs.php"><li>Gestion des utilisateurs</li></a>
            <a href="editServicePage.php"><li>Gestion des services</li></a>
            <a href="#"><li>Gestion des infos</li></a>
            <a href="editCarPage.php"><li>Gestion des véhicules</li></a>
            <a href="#"><li>Message client</li></a>
            <a href="./Session/deconnection.php"><li>Déconnexion</li></a><br>
            <p> Vous êtes connecté en tant qu'<?php echo $_SESSION['role']?>. </p>
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
<script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="sidebars.js"></script>
</body>
</html>
    