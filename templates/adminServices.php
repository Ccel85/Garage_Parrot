<?php  
include('../Session/variable.php');
include('../config/configsql.php');
include('../templates/headerAdmin.php');

//creation de service
?>        <form action="../Session/newservice.php"  enctype= "multipart/form-data" method="POST">
            <h2>création de services</h2> 
                <div class="formulaire">
            <div class="form-group">
                    <label for="service_file" >Images</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
                    <input class="form-control" type="file" name='service_file' id="exampleFormControlInput1" >
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
        <?php include '../templates/footer.php' ?>
</html>
    
