<?php  
include('../Session/variable.php');
include('../config/configsql.php');
include('../templates/headerEmployes.php');

//Gestion des commentaires?>

<h1 class=" ">GESTION DES AVIS</h1>
<?php
    $allComments = getComments($adminpdo);
    foreach ($allComments as $allComment){
    // Convertir la date SQL en format JJ/MM/AA
    $dateFormatee = date("d-m-y", strtotime($allComment['date']));
    $idCommentaire = $allComment['id']?>
<form method="post" >
<div class="comments">
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Date</th>
            <th scope="col">Commentaire</th>
            <th scope="col">Note</th>
        </tr>
    </thead>
    
    <tbody>
        <tr>
            <th scope="row">
            <input type="checkbox" name="checkboxMessage" class="checkboxMessage" >
            <input type="hidden" name="archive[]" id="archiveInput<?= $idCommentaire ?>" class="archiveInput" value=''></th>
            <th class="text-body-secondary "><?= ($dateFormatee).' '. ($allComment['pseudo']) ?></th>
            <th><?= htmlspecialchars($allComment['comments']) ?></th>
            <th><?= htmlspecialchars($allComment['rating']) ?></th>
        </tr>
    </tbody>
</table >
</div>
<?php }
$dateFormatee = date("d-m-y", strtotime($allComment['date']));?>
<div class="button">
    <button type = "submit" class="button" name="valideComments" >Valider modification</button>
</div>
</form>
<?php 
//insertion de la valeur archivé en BDD
$insertCheck = insertCheck($adminpdo);
include '../templates/footer.php' ?>
<!--gestion des check JS-->
<script>checkboxMessage();</script>
    
