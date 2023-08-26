<?php //session_start(); 
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
        <form action="newService.php" method="POST">
        <h2>Gestion page services</h2> 
            <div class="formulaire">
            <div enctype="multipart/form-data" class="form-group">
                <label for="exampleFormControlInput1" >Images</label>
                <input class="form-control" type="file" name="service_file" id="exampleFormControlInput1" required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1" >Entrée titre du service</label>
                <input class="form-control" type="text" name="titre_service" id="exampleFormControlInput1" autofocus required>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Déscription du service</label>
                <textarea class="form-control" type="text" name="service_Detail" id="exampleFormControlInput1" required>
            </div>
            <div class="form-group">
            <button type="submit">Valider</button>
            </div>
        </div>
        </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
    
