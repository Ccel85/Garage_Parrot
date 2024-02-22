<?php 
//session_start();
include('../config/sessionStop.php');
include('../Session/variable.php');
include('../config/configsql.php');
include('../templates/header.php');
?>
<!--Affichage de la page de service -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb p-3 bg-body-tertiary rounded-3">
        <li class="breadcrumb-item"><a href="../templates/accueil.php">Accueil </a></li>
        <li class="breadcrumb-item active" aria-current="page"></li>
    </nav>
<div>
  <?php $services = getservice($adminpdo);
    foreach ($services as $key => $service) {
          include('service.php');
  }
  ?>
</div>
  <?php include '../templates/footer.php' ?>