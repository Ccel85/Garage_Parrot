<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Garage V.Parrot</title>
<!--Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<!--feuille CSS -->
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php include'header.html';?>
<div class="contact" >
    <div class="cardInfo">
        <p>Vous pouvez nous contacter :<br>
            <span>par mail: garageparrot@gmail.com<br>
            Tel:  09.66.34.56.12</span><br>
            ou à l’aide du formulaire de contact. </p>
    </div>
<form>
<div class="formulaire">
    <div class="form-group">
        <label for="exampleFormControlInput1">Votre nom et prénom</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="John Doe">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Votre Email</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Votre téléphone</label>
        <input type="phone" class="form-control" id="exampleFormControlInput1" placeholder="01.23.45.67.89">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">Votre sujet</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Votre sujet">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Votre message</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <div>
    <button type="submit">Envoyer</button>
    </div>
</div>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php include 'footer.html' ?>