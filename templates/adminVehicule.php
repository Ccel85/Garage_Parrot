<?php 
session_start();
include('../Session/variable.php');
include('../config/configsql.php');
include('../templates/header.php');
//création annonce vehicule
?>

        <form action="../Session/newVehicule.php" method="POST">
        <h2>Création d'annonce de véhicule d'occasion</h2> 
            <div class="formulaire">
            <div enctype="multipart/form-data" class="form-group">
                <label for="exampleFormControlInput1" >Photos</label>
                <input class="form-control" type="file" name="Car_file" id="exampleFormControlInput1" >
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1" >Modèle</label>
                <input class="form-control" type="text" name="Car_model" id="exampleFormControlInput1" autofocus required>
            </div>
            <div >
                <label for="exampleFormControlInput1" required>Energie</label>
            </div>
            <div>
                <input type="radio" id="gasoil" name="Car_gasoil" value="Gasoil">
                <label for="gasoil">Diesel</label><br>
                <input type="radio" id="Essence" name="Car_gasoil" value="Essence">
                <label for="Essence">Essence</label><br>
                <input type="radio" id="hybride" name="Car_gasoil" value="Hybride">
                <label for="hybride">Hybride</label><br>
                <input type="radio" id="electrique" name="Car_gasoil" value="Electrique">
                <label for="electrique">Electrique</label>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Kilomètre</label>
                <input class="form-control" type="text" name="Car_kilometers" id="exampleFormControlInput1" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Année</label>
                <input class="form-control" type="text" name="Car_year" id="exampleFormControlInput1" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Description</label>
                <input class="form-control" type="textarea" name="Car_description" id="exampleFormControlInput1" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Prix</label>
                <input class="form-control" type="text" name="Car_price" id="exampleFormControlInput1" required>
            </div>
            <div class="form-group">
            <button type="submit">Créer véhicule</button>
            </div>
        </div>
        </form>
        <?php include '../templates/footer.php' ?>
    
