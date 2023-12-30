<?php 
include('../templates/header.php');
include('../Session/variable.php');
include('../config/configsql.php');
?>
<!--Affichage de la page de service -->
<div>
  <?php $services = getservice($adminpdo);
    foreach ($services as $key => $service) {
          include('service.php');
  }
  ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
  <?php include '../templates/footer.php' ?>