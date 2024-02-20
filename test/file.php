<?php 

include('../config/sessionStop.php');
include('../Session/variable.php');
include('../config/configsql.php');
include('../templates/header.php');?>

<!--<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sélectionner et afficher une image</title>
</head>
<body>
    <h2>Sélectionner une image</h2>
    <form action="../uploads/upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="fileInput" id="fileInput" accept="image/*" onchange="previewImage()">
        <br><br>
        <img id="imagePreview" src="#" alt="Aperçu de l'image" style="max-width: 300px; max-height: 300px;">
        <br><br>
        <input type="submit" value="Télécharger et Afficher">
    </form>
    //page de modification de services-editservice.php-->
<?php $services = getservice($adminpdo);

foreach ($services as $service){?>  
        <form action="../Session/editservice.php" enctype= "multipart/form-data" method="POST">
            <h2>Modification de services N°: <?php echo $service['id'] ?></h2> 
            <input type="hidden" value="<?= $service['id']; ?>" name="id"/>
            <div class="formulaire">
                <div class="form-group">
                    <label for="fileInput">Choisir un fichier :</label>
                    <input type="file" name="fileInput" id="fileInput" accept="image/*" onchange="previewImage()">
                    <br><br>
                    <img id="imagePreview" src="#" alt="Aperçu de l'image" style="max-width: 300px; max-height: 300px;">
                </div>
                <div>
                    <label for="imgBdd">Image actuelle :</label>
                    <img id="imgBdd"  name="imgBdd" style="max-width: 300px; max-height: 300px;" src="<?php echo ($service['servicesPicture']);?>">
                </div>
            </div>
<?php } ?>
</form>
<script>
    function previewImage() {
        var fileInput = document.getElementById('fileInput');
        var imagePreview = document.getElementById('imagePreview');

        // Vérifie si un fichier a été sélectionné
        if (fileInput.files && fileInput.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                // Affiche l'aperçu de l'image
                imagePreview.src = e.target.result;
            }

            // Lit le contenu du fichier sélectionné
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
</script>
</body>
<?php include '../templates/footer.php' ?>
</html>
