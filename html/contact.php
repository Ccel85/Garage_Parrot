<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Garage V.Parrot</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="../css/style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Raleway&display=swap" rel="stylesheet">
</head>
<body>
<?php include'header.html';?>
<section class="contact" >
   <div class="info">
    <p>Vous pouvez nous contacter :<br>
        <span>par mail: garageparrot@gmail.com<br>
        Tel:  09.66.34.56.12</span><br>
        ou à l’aide du formulaire de contact. </p>
   </div>
    <div>
        <h2 class="form">Formulaire de contact:</h2>
        <form method="post" action="" >
            <label for="name">Votre nom et prénom</label>
            <input id="name" type="text" name="name" placeholder="John Doe">
            <label for="mail">Votre mail</label>
            <input id="mail" type="mail" name="mail" placeholder="mail@mail.com">
            <label for="phone">Votre téléphone</label>
            <input id="phone" name="phone" type="phone" placeholder="06.01.02.03.04">
            <label for="subject">Votre sujet</label>
            <input id="subject" type="text" name="subject" placeholder="">
            <label for="message">Votre message</label>
            <textarea id="message" name="message" id="message" rows="8"></textarea>
            <button type="submit">Envoyer</button>   
    </div>
</section>
</body>
<?php include 'footer.html' ?>