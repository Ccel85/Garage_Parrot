<?php 
include('../html/header.php');
include('../Session/variable.php');
include('../config/configsql.php');
?>
<div>
  <?php $services = getservice($pdo);
    foreach ($services as $key => $service) {
          include('service.php');
  }
  ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
  <?php include '../html/footer.html' ?>