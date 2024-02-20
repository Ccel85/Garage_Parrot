<?php  
//session_start();
include('../config/sessionStop.php');
include('../Session/variable.php');
include('../config/configsql.php');
include('../templates/header.php');

//page de modification de services-editservice.php
$services = getservice($adminpdo);

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
                <div class="form-group">
                    <label for="title" class="form-label" >Entrée titre du service</label>
                    <input class="form-control" type="text" name="title" value=<?php echo ($service['title']);?>>
                </div>
                <div class="form-group">
                    <label for="description">Description du service</label>
                    <textarea rows="10" class="form-control" type="text" name="description" id="exampleFormControlInput1" ><?php echo htmlentities($service['servicesContent']);?></textarea>
                </div>
                <div class="form-group">
                <button type="submit" name="modifierService">Valider la modification</button>
                <button  type="submit" name="supprimerService">Supprimer le service</button>
                </div>
            </div>
        </form>        
        <?php } ?>
        <form  action="../templates/adminServices.php" method="POST" style="display:flex; justify-content:center">
            <button  type="submit" name="creerService">Créer un service</button>
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
        <?php include '../templates/footer.php' ?>
</html>
    
