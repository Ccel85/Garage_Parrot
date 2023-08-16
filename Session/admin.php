<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="../html/style.css" rel="stylesheet">
    </head>
    <h1>Bonjour ADMIN</h1>

    <?php if (isset($_SESSION['admin']) AND $_SESSION['admin'] == true) {  ?>

        
    <nav>
    <h1>Bonjour ADMIN</h1>
        <ul>
            <a href="#"><li>Gestion des utilisateurs</li></a>
            <a href="#"><li>Gestion des services</li></a>
            <a href="#"><li>Gestion des infos</li></a>
            <a href="#"><li>Gestion des vehicules</li></a>
            <a href="#"><li>Message clients</li></a>
            <a href="deconnection.php"><li>Déconnexion</li></a>
            <p> Vous êtes connecté en tant qu'<?php echo $_SESSION['user']?> </p>
        </ul>
    </nav>

<?php } else { ?>
    <h1>Bonjour USER</h1>
<nav>
    <ul>
        <a href="#"><li>Gestion des vehicules</li></a>
        <a href="#"><li>Gestion des avis</li></a>
        <a href="#"><li>Message clients</li></a>
        <a href="deconnection.php"><li>Déconnexion</li></a>
        <p> Vous êtes connecté en tant qu'<?php echo $_SESSION['user']?></p>
    </ul>
</nav>
<?php }
?>
</html>