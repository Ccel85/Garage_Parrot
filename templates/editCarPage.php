<?php  
include('../Session/variable.php');
include('../config/configsql.php');
include('../templates/header.php');

//page de modification de services-editservice.php
$cars = getCarbyId($adminpdo);

foreach ($cars as $car){?>  
        <form action="../Session/editCars.php" method="POST">
            <h2 name="">Modification d'annonce N°: <?php echo $car['id'] ?></h2> 
            <input type="hidden" value="<?= $car['id']; ?>" name="id"/>
            <div class="formulaire">
                <!--<div enctype="multipart/form-data" class="form-group">
                    <label for="image" >Image</label>
                    <input class="form-control" type="file" name="image" id="exampleFormControlInput1" >
                </div>-->
                <div class="form-group">
                    <label for="modele" >Modele</label>
                    <input class="form-control" type="text" name="modele" value=<?php echo ($car['modele']);?>>
                </div>
                <div class="form-group">
                    <label for="energy">Energie</label>
                    <textarea rows="10" class="form-control" type="text" name="energy" id="exampleFormControlInput1" ><?php echo htmlentities($service['servicesContent']);?></textarea>
                </div>
                <div class="form-group">
                    <label for="km">Km</label>
                    <input class="form-control" type="text" name="km" value=<?php echo ($car['km']);?>>
                </div>
                <div class="form-group">
                    <label for="year">Year</label>
                    <input class="form-control" type="text" name="year" value=<?php echo ($car['year']);?>>
                </div>
                <div class="form-group">
                    <label for="carContent">Description</label>
                    <textarea rows="10" class="form-control" type="text" name="carContent" id="exampleFormControlInput1" ><?php echo htmlentities($car['carContent']);?></textarea>
                </div>
                <div class="form-group">
                    <label for="price">Prix</label>
                    <input class="form-control" type="text" name="price" value=<?php echo ($car['price']);?>>
                </div>
                <div class="form-group">
                <button type="submit" name="modifierAnnonce">Valider la modification</button>
                <button  type="submit" name="supprimerAnnonce">Supprimer l'annonce</button>
                </div>
            </div>
        </form>        
        <?php } ?>
        <form  action="../templates/newVehicule.php" method="POST" style="display:flex; justify-content:center">
            <button  type="submit" name="creerAnnonce">Créer une annonce</button>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
    
