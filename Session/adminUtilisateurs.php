<?php 
include('../config/sessionStart.php') ;
include('variable.php');
include('../config/configsql.php');
include('../html/header.php');
?>

        <form action="newLogin.php" method="POST">
        <h2>Création utilisateur </h2> 
            <div class="formulaire">
            <div class="form-group">
                <label for="exampleFormControlInput1" >Nom</label>
                <input class="form-control" type="text" name="User_name" id="exampleFormControlInput1" placeholder="Doe" autofocus required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Prénom</label>
                <input class="form-control" type="text" name="User_surname" id="exampleFormControlInput1" placeholder="John" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Votre Email</label>
                <input class="form-control" type="email" name="User_email" id="exampleFormControlInput1" placeholder="name@example.com" require>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Mot de passe</label>
                <input class="form-control" type="phone" name="User_mdp" id="exampleFormControlInput1" required>
            </div>
            
            <div class="form-group">
            <button type="submit">Créer utilisateur</button>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Type de compte</label>
                <select class="form-control" name="User_type" id="exampleFormControlInput1" required>
                    <option value="" selected></option>
                    <option value="adm">Administrateur</option>
                    <option value=" ">Sans droit</option>
            </div>
        </div>
        </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
    
