<?php 
session_start();
include('../config/sessionStop.php');
include('../Session/variable.php');
include('../config/configsql.php');
include('../templates/header.php');
?>

<form action="../Session/newLogin.php" method="POST">
    <h2>Création utilisateur </h2> 
    <div class="formUser">
        <div class="form-group">
            <label for="exampleFormControlInput1" >Nom</label>
            <input class="form-control" type="text" name="User_name" id="exampleFormControlInput1" placeholder="Doe" autofocus >
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Prénom</label>
            <input class="form-control" type="text" name="User_surname" id="exampleFormControlInput1" placeholder="John" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Votre Email</label>
            <input class="form-control" type="email" name="User_email" id="exampleFormControlInput1" placeholder="name@example.com" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Mot de passe</label>
            <input class="form-control" type="phone" name="User_mdp" id="exampleFormControlInput1" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Compte</label>
            <select class="form-control" name="User_type" id="exampleFormControlInput1" >
                <option value="" selected></option>
                <option name="administrateur">Administrateur</option>
                <option name="collaborateur">Employé</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" name="createUser">Créer utilisateur</button>
        </div>
    </div>  
    <div>
    <hr>
        <h2 class="text-center">Liste utilisateurs</h2>
        <?php   $bddUsers = getUsers($adminpdo);    
            foreach ($bddUsers as $bddUser){ ?>
        <div class="formUser">
            <div class="form-group">
                <label for="exampleFormControlInput1" >Nom</label>
                <input class="form-control" type="text" name="name" id="exampleFormControlInput1" value = <?= $bddUser['name']?>  autofocus >
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Prénom</label>
                <input class="form-control" type="text" name="surname" id="exampleFormControlInput1"  value = <?= $bddUser['surname']?> >
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Votre Email</label>
                <input class="form-control" type="email" name="email" id="exampleFormControlInput1"  value = <?= $bddUser['email']?> >
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Compte</label>
                <select class="form-control" name="role" id="exampleFormControlInput1" >
                    <option  value="<?=$bddUser['role']?>" selected><?=$bddUser['role']?></option>
                    <option value="Administrateur">Administrateur</option>
                    <option value="Employé">Employé</option>
                </select>
            </div>
            <!-- Champ caché pour stocker l'ID de l'utilisateur -->
            <input type="hidden" name="id" value="<?= $bddUser['id'] ?>">
            <div class="form-group">
                <button type="submit" name="modifierUtilisateur">Valider la modification</button>
                <button  type="submit" name="supprimerUtilisateur">Supprimer la selection</button>
            <div>
        </div>
    </div> 
</div>
<?php } ?>
</form>
<?//php include '../templates/footer.php' ?>

