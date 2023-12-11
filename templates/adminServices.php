<?php  
include('variable.php');
include('../config/configsql.php');
include('../templates/header.php');

//creation de service
?>        <form action="./Session/newService.php" method="POST">
            <h2>création de services</h2> 
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
    
