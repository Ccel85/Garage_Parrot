<?php  
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
                    <label for="service_file" >Images</label>
                    <input class="form-control" type="file" name="service_file" id="exampleFormControlInput1" required>
                </div>
                <div class="form-group">
                    <label for="service_title" >Entrée titre du service</label>
                    <input class="form-control" type="text" name="service_title" id="exampleFormControlInput1" required>
                </div>
                <div class="form-group">
                    <label for="service_description">Description du service</label>
                    <textarea rows="10" class="form-control" type="text" name="service_description" id="exampleFormControlInput1" required></textarea>
                </div>
                <div class="form-group">
                <button type="submit">Valider</button>
                </div>
            </div>
        </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
    
