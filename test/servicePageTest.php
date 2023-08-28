<?php  
include('../Session/variable.php');
include('../config/configsql.php');
include('../html/header.php');
// PAGE VISUALISATION DES SERVICE POUR POUVOIR LES SUPPPIRMER MODIFIER ?>
<div>
  <h2>Gestion page services</h2> 
  <?php $services = getservice($pdo);
  foreach ($services as $service){?>  
    <form>
      <h2 class="service-id"><?=$service['id']; ?></h2>
      <img src=<?= $service['image']?> class="" alt="">
    </div>
    <div class="">
      <h2 class="service-title"><?=$service['title']; ?></h2>
    </div>
    <div class="">
      <h3 class="">Description :</h3><br>
      <?= nl2br(htmlspecialchars($service['description']));?>
      <div><button name="modifierService"><a href="editServicepageTest.php">Modifier</a></button></div>
  </form>
    <hr>
  <?php }?>
  <div>
    <button action="editservicepageTest.php">Modifier service</button>
  </div>
  <div>
    <button>  
    <a href="../Session/adminServices.php">Ajouter service</a>
    </button>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
