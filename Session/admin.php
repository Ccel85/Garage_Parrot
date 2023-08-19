<?php
session_start();
//include('connexion.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="../html/style.css" rel="stylesheet">
    </head>


    <?php 


    //condition session admin

   // if (isset($_SESSION['admin']) AND $_SESSION['admin'] == true) {  ?>

    <nav>
    <h1>Bonjour <?php  echo ($_SESSION['nom']) ?></h1>
        <ul>
            <a href="#"><li>Gestion des utilisateurs</li></a>
            <a href="#"><li>Gestion des services</li></a>
            <a href="#"><li>Gestion des infos</li></a>
            <a href="#"><li>Gestion des vehicules</li></a>
            <a href="#"><li>Message clients</li></a>
            <a href="deconnection.php"><li>Déconnexion</li></a>
            <p> Vous êtes connecté en tant qu'<?php echo ($_SESSION['nom'])?> </p>
        </ul>
    </nav>

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
</html>