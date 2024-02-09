

<?php 
include('headerEmployes.php');
include('../Session/variable.php');


$allMessages = getMessages($adminpdo);
foreach ($allMessages as $allMessage){?>

<?php 
// Convertir la date SQL en format JJ/MM/AA
  $dateFormatee = date("d-m-y", strtotime($allMessage['date']));?>
  <h1 class=" ">Messages</h1>
  <div>
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
          <th class="text-body-secondary "><?= ($dateFormatee).' '. ($allMessage['name']." ".($allMessage['surname'])) ?></a></thp>
          <th><?= htmlspecialchars($allMessage['message']) ?></th>
          <th><?= htmlspecialchars($allMessage['email']) ?></th>
          <th><?= htmlspecialchars($allMessage['phone']) ?></th>
        </tr>
      </tbody>
    </table >
  </div>
<?php }?>
<?php 
include '../templates/footer.php' ?>
<script>checkboxMessage();</script>

