<?php 
//session_start();
include('../config/sessionStop.php');
include('../Session/variable.php');
include('../config/configsql.php');
include('../templates/header.php');

$totalCars = numberCars($adminpdo);
$totalMessage = numbermessage($adminpdo);
$totalComments = numberComments($adminpdo);
    //Page session employé
   ?>
    <p class="text-center"> Bonjour <span class="textRed"><?php echo $_SESSION['surname'] . ' ' . $_SESSION['name'].', '; ?></span> vous êtes connecté en tant qu' <span class="textRed"><?php echo $_SESSION['role']?></span>. </p>
    <br>
    <div class="menu">    
    <nav>   
            <div class=" menuEmploye">
                <ul class="list-group">
                    <a href="editCarPage.php">
                    <li class="list-group-item d-flex justify-content-between align-items-center" >Gestion des véhicules</li></a>
                    <a href="editComments.php">
                    <li class="list-group-item d-flex justify-content-between align-items-center">Gestion des avis</li></a>
                    <a href="../templates/messagePage.php">
                    <li class="list-group-item d-flex justify-content-between align-items-center">Message clients</li></a>
                    <a href="../Session/deconnexion.php">
                    <li class="list-group-item d-flex justify-content-between align-items-center">Déconnexion</li></a><br>
                </ul>
            </div>
    </nav>
    
    <div class="tableauBord">
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href = "../templates/messagePage.php">Nombre de message non lu</a>
                <span class="badge  rounded-pill m-2"><?php echo ($totalMessage)?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href = "../templates/editCarPage.php">Nombre d'annonce en ligne</a>
                <span class="badge  rounded-pill m-2"><?php echo ($totalCars)?></span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
            <a href = "../templates/editComments.php">Nouveaux avis</a>
                <span class="badge  rounded-pill m-2"><?php echo ($totalComments)?></span>
            </li>
            </ul>
    </div>
</div>
<hr>
<div>
<h4 class="fst-italic">Messages récents </h4>
    <?php //gestion message
    $lastMessages= getLastMessage($adminpdo) ;
    foreach ($lastMessages as $lastMessage){
    // Convertir la date SQL en format JJ/MM/AA
    $dateFormatee = date("d-m-y", strtotime($lastMessage['date']));?>
            
    
    <div class="list-group">
        <a href="../templates/messagePage.php" class="list-group-item list-group-item-action d-flex gap-3 py-3 " aria-current="true">
        <div class="d-flex gap-2 w-100 justify-content-between align-items-start">
            <div>
                <h6 class="mb-0"> <?= ($lastMessage['name']." ".($lastMessage['surname'])) ?></h6>
                <p class="mb-0 opacity-75"><?= htmlspecialchars($lastMessage['message']) ?> </p>
            </div>
                <small class="opacity-50 text-nowrap"><?= ($dateFormatee) ?> </small>
        </div>
        </a>
    </div>
</div>
<br>
<?php }
include '../templates/footer.php' ?>
</html>
    