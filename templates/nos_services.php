<?php 
include('../templates/header.php');
include('../Session/variable.php');
include('../config/configsql.php');
include('../config/sessionStart.php');
?>
<!--Affichage de la page de service -->
<div>
  <?php $services = getservice($adminpdo);
    foreach ($services as $key => $service) {
          include('service.php');
  }
  ?>
</div>
  <?php include '../templates/footer.php' ?>