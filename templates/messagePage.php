

<?php 
include('headerEmployes.php');
include('../Session/variable.php');
?>

<!--Page récuperation et traitement des messages-->

<h1 class=" ">Messages</h1>
<?php
$check = checkMessage($adminpdo);
$allMessages = getMessages($adminpdo);
foreach ($allMessages as $allMessage){
// Convertir la date SQL en format JJ/MM/AA
  $dateFormatee = date("d-m-y", strtotime($allMessage['date']));?>
<form method="post">
  <div class="message">
  <input type="checkbox" class="checkboxMessage m-3">

  <p class="blog-post-meta fst-italic m-3"><?= ($dateFormatee).' '. ($allMessage['name']." ".($allMessage['surname'])) ?> </a></p>
  <p class="blog-post-meta m-3 text-nowrap"><?= htmlspecialchars($allMessage['message']) ?> </a></p>
  <p class="blog-post-meta m-3 text-nowrap"><?= 'Tel: '.htmlspecialchars($allMessage['phone']) ?></p>
  <p class="blog-post-meta m-3 text-nowrap"><?='Mail: '.htmlspecialchars($allMessage['email']) ?></p>
          <input type="hidden" name="archive[]" id="archiveInput" class="archiveInput" value=''></th></div>
<hr>
<h1 class=" ">Messages archivés</h1>
<?php $archiveMessages = messageArchive($adminpdo);
foreach ($archiveMessages as $archiveMessage){
  $dateFormate = date("d-m-y", strtotime($archiveMessage['date']));?>
  
  <div class="messageArchive">
    <table class="table">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Date</th>
      <th scope="col">Message</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
    </tr>
  </thead>
      <tbody>
        <tr>
          <th scope="row"><input type="checkbox" class="checkboxMessage"></th>
          <th class="text-body-secondary "><?= ($dateFormate).' '. ($archiveMessage['name']." ".($archiveMessage['surname'])) ?></a></thp>
          <th><?= htmlspecialchars($archiveMessage['message']) ?></th>
          <th><?= htmlspecialchars($archiveMessage['email']) ?></th>
          <th><?= htmlspecialchars($archiveMessage['phone']) ?></th>
        </tr>
      </tbody>
    </table >
    <?php }?>
  </div>
  <div class="align-items-center">
    <button type = "submit" class="button" name="valider" >Valider modification</button>
  </div>
</form>

<?php 

include '../templates/footer.php' ?>
<script>checkboxMessage();</script>

