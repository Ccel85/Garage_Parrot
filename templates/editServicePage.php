<?php  
include('../Session/variable.php');
include('../config/configsql.php');
include('../templates/header.php');

//page de modification de servcies-editservice.php
$services = getservice($pdo);

  foreach ($services as $service){?>  
        <form action="./Session/editservice.php" method="POST">
            <h2 name="">Modification de services Ref: <?php echo $service['id'] ?></h2> 
            <input type="hidden" value="<?= $service['id']; ?>" name="id[]"/>
            <div class="formulaire">
                <!--<div enctype="multipart/form-data" class="form-group">
                    <label for="image" >Image</label>
                    <input class="form-control" type="file" name="image" id="exampleFormControlInput1" >
                </div>-->
                <div class="form-group">
                    <label for="title" >Entrée titre du service</label>
                    <input class="form-control" type="text" name="title [<?= $service['id'];?>] " value=<?php echo ($service['title']);?>>
                </div>
                <div class="form-group">
                    <label for="description">Description du service</label>
                    <textarea rows="10" class="form-control" type="text" name="description [<?= $service['id'];?>]" id="exampleFormControlInput1" ><?php echo htmlentities($service['description']);?></textarea>
                </div>
                <div class="form-group">
                <button type="submit" name="modifierService">Valider</button>
                </div>
            </div>
        </form>
        <?php } ?>
        <form action="adminServices.php" style="display:flex; justify-content:center">
            <button  type="" name="creerService">Créer un service</button>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
    
