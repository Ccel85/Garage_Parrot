<?php 
//session_start();
include('../config/sessionStop.php');
include('../Session/variable.php');
include('../config/configsql.php');
include('../templates/header.php');
//création annonce vehicule
?>

<form action="../Session/newVehicule.php" method="POST" enctype="multipart/form-data">
    <h2>Création d'annonce de véhicule d'occasion</h2>
    <br>
    <div class="formulaire">
        <div class="form-group">
            <label for="fileInput1">Image 1 :</label>
            <input type="file" name="fileInput[]" id="fileInput1" accept="image/*">
        </div>
        <div class="form-group">
            <label for="fileInput2">Image 2 :</label>
            <input type="file" name="fileInput[]" id="fileInput2" accept="image/*">
        </div>
        <div class="form-group">
            <label for="fileInput3">Image 3 :</label>
            <input type="file" name="fileInput[]" id="fileInput3" accept="image/*">
        </div>
        <div class="form-group">
            <label for="fileInput4">Image 4 :</label>
            <input type="file" name="fileInput[]" id="fileInput4" accept="image/*">
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
    
