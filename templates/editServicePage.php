<?php  
include('../Session/variable.php');
include('../config/configsql.php');
include('../templates/headerAdmin.php');

//page de modification de services-editservice.php
$services = getservice($adminpdo);

foreach ($services as $service){?>  
        <form action="../Session/editservice.php" method="POST">
            <h2 name="">Modification de services N°: <?php echo $service['id'] ?></h2> 
            <input type="hidden" value="<?= $service['id']; ?>" name="id"/>
            <div class="formulaire">
                <!--<div enctype="multipart/form-data" class="form-group">
                    <label for="image" >Image</label>
                    <input class="form-control" type="file" name="image" id="exampleFormControlInput1" >
                </div>-->
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
        <?php include '../templates/footer.php' ?>
</html>
    
