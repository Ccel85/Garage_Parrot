<?php session_start(); 
include('variable.php');
include('../config/configsql.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Garage V.Parrot</title>
    <!--Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!--feuille CSS -->
    <link rel="stylesheet" href="../html/style.css">
</head>
    <body>    
                
        <form action="newVehicule.php" method="POST">
        <h2>Création d'annonce de véhicule d'occasion</h2> 
            <div class="formulaire">
            <div class="form-group">
                <label for="exampleFormControlInput1" >Photos</label>
                <input class="form-control" type="file" name="Car_file" id="exampleFormControlInput1" required>
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
                <label for="car_gasoil">Diesel</label><br>
                <input type="radio" id="Essence" name="Car_gasoil" value="Essence">
                <label for="Essence">Essence</label><br>
                <input type="radio" id="hybride" name="Car_gasoil" value="Hybride">
                <label for="Hybride">Hybride</label><br>
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
                <input class="form-control" type="textarea" name="Car_descritpion" id="exampleFormControlInput1" required>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
    
