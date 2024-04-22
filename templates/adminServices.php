<?php  
//session_start();
include('../config/sessionStart.php');
include('../Session/variable.php');
include('../config/configsql.php');
include('../templates/header.php');

//création de service
?>        <form action="../Session/newservice.php"  enctype= "multipart/form-data" method="POST">
            <h2>création de services</h2> 
                <div class="formulaire">
                <div class="form-group">
                <input type="file" name="fileInput" id="fileInput" accept="image/*" onchange="previewImage()">
                <br><br>
                <img id="imagePreview" src="#" alt="Aperçu de l'image" style="max-width: 300px; max-height: 300px;">
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
                <button type="submit"name="valider">Valider</button>
                </div>
            </div>
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
    
