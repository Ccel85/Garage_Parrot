

<?php 
session_start();
include('../Session/variable.php');
include('../config/configsql.php');
include('../templates/header.php');
?>
<!--Page récuperation et traitement des messages-->
<h2>Messages reçus: </h2>
  <?php 
  //integrer notion archivage en BDD
    $check = checkMessage($adminpdo);
  //fonction de récuperation des messages en BDD sans archivage
    $allMessages = getMessages($adminpdo);
    foreach ($allMessages as $allMessage){
// Convertir la date SQL en format JJ/MM/AA
  $dateFormatee = date("d-m-y", strtotime($allMessage['date']));?>
<form method="POST">
  <div class="message">
    <input type="checkbox" class="checkboxMessage m-3" class="checkboxMessage"name="archive[<?= $allMessage['email'] ?>]" value='Y'>
    <input type="hidden" name="archive[]" id="archiveInput" class="archiveInput" value=''>
    <p class="blog-post-meta fst-italic m-3"><?= ($dateFormatee).' '. ($allMessage['name']." ".($allMessage['surname'])) ?> </a></p>
    <p class="blog-post-meta m-3 text-nowrap"><?= htmlspecialchars($allMessage['message']) ?> </a></p>
    <p class="blog-post-meta m-3 text-nowrap"><?= 'Tel: '.htmlspecialchars($allMessage['phone']) ?></p>
    <p class="blog-post-meta m-3 text-nowrap"><?='Mail: '.htmlspecialchars($allMessage['email']) ?></p>
  </div>
  <hr>
    <?php } ?>
    <div class="navButton">
      <button type = "submit" class="button " name="validerArchive" >Valider archivage</button>
  </div>
</form>
  <h2>Messages archivés: </h2>
<div>
    <?php 
    //recuperer les messages archivés
    $archiveMessages = messageArchive($adminpdo);
    foreach ($archiveMessages as $archiveMessage){
    $dateFormate = date("d-m-y", strtotime($archiveMessage['date']));?>
  <div class="message">
    <p class="blog-post-meta fst-italic m-3"><?= ($dateFormate).' '. ($archiveMessage['name']." ".($archiveMessage['surname'])) ?> </a></p>
    <p class="blog-post-meta m-3 text-nowrap"><?= htmlspecialchars($archiveMessage['message']) ?> </a></p>
    <p class="blog-post-meta m-3 text-nowrap"><?= 'Tel: '.htmlspecialchars($archiveMessage['phone']) ?></p>
    <p class="blog-post-meta m-3 text-nowrap"><?='Mail: '.htmlspecialchars($archiveMessage['email']) ?></p>
  </div>
  <hr>
  <?php }?>
</div>
<?php 
include '../templates/footer.php' ?>
<script>checkboxMessage();</script>

