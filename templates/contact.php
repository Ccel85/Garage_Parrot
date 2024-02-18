<?php 
session_start();
include('../Session/variable.php');
include('../config/configsql.php');
include('../templates/header.php');?>
<?php
// Récupérer la valeur du sujet à partir de la variable POST
$subject = isset($_POST['subject']) ? $_POST['subject'] : '';
// Utiliser cette valeur dans l'attribut value de l'élément input
?>
<div class="contact" >
    <div class="cardInfo">
        <p>Vous pouvez nous contacter :<br>
            <span class="infoContact">par mail: garageparrot@gmail.com<br>
            Tel:  09.66.34.56.12</span><br>
            ou à l’aide du formulaire de contact. </p>
    </div>
<form  method="POST" 
    style="width: 400px;"
>
<div class="formulaire">
    <div class="form-group">
        <label for="exampleFormControlInput1" class="form-label">Votre nom </label>
        <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="DOE">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1" class="form-label">Votre prénom </label>
        <input type="text" class="form-control"  name="surname"id="exampleFormControlInput1" placeholder="John">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Votre Email</label>
        <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Votre téléphone</label>
        <input type="phone" class="form-control" name="phone" id="exampleFormControlInput1" placeholder="01.23.45.67.89">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Votre sujet</label>
        <input type="text" class="form-control subject" value="<?= htmlspecialchars($subject); ?>" name="subject" id="exampleFormControlInput1" placeholder="Votre sujet">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Votre message</label>
        <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <div>
    <button type="submit" name="validerMessage">Envoyer</button>
    </div>
</div>
</form>
</div>
<?php
if(isset($_POST['validerMessage'])) { 
    insertMessage($adminpdo);}  ?>

<script>document.addEventListener('DOMContentLoaded', function() {
    // Sélectionnez le champ de sujet
    var subjectInput = document.querySelector('.subject');

    // Si le champ de sujet a une valeur non vide, rend le champ de sujet en lecture seule
    if (subjectInput.value.trim() !== '') {
        subjectInput.readOnly = true;
    }
});
</script>
<?php  include '../templates/footer.php' ?>
