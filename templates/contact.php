<?php 
include('header.php');
include('../config/sessionStart.php');
include('../Session/variable.php');?>
<div class="contact" >
    <div class="cardInfo">
        <p>Vous pouvez nous contacter :<br>
            <span class="infoContact">par mail: garageparrot@gmail.com<br>
            Tel:  09.66.34.56.12</span><br>
            ou à l’aide du formulaire de contact. </p>
    </div>
<form  method="POST">
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
        <input type="text" class="form-control subject" value="" name="subject" id="exampleFormControlInput1" placeholder="Votre sujet">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Votre message</label>
        <textarea class="form-control" name="message" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <div>
    <button type="submit">Envoyer</button>
    </div>
</div>
</form>
</div>
<?php
if(isset($_POST['validerMessage'])) { 
    insertMessage($adminpdo);}  ?>
    
<?php  include '../templates/footer.php' ?>
<script>demandeInfo()</script>