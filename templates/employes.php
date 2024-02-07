<?php 
include('../config/sessionStart.php');
include('../Session/variable.php');
include('../config/configsql.php');
include('../templates/headerEmployes.php');
    //condition session employe
    ?>
    <nav>
        <p> Bonjour <span class="textRed"><?php echo $_SESSION['surname'] . ' ' . $_SESSION['name'].', '; ?></span> vous êtes connecté en tant qu'<span class="textRed"><?php echo $_SESSION['role']?></span>. </p>
        <div class="admin">
        <div class="menuAdmin">
            <ul class="menuAdmin">
                <a href="editCarPage.php"><li>Gestion des vehicules</li></a>
                <a href="editAvis.php"><li>Gestion des avis</li></a>
                <a href="editMessage.php"><li>Message clients</li></a>
                <a href="./Session/deconnection.php"><li>Déconnexion</li></a><br>
            </ul>
        </div>
        <div> 
            <h1>Tableau de bord</h1>
        </div>
        </div>
    </nav>
  
  <?php include '../templates/footer.php' ?>
</html>
    