<?php  
include('../Session/variable.php');
include('../config/configsql.php');
include('../templates/header.php');

//page d'edition de cars-editCars.php
$cars = getCarbyId($adminpdo);

foreach ($cars as $car){?>  
        <form action="../Session/editCars.php" method="POST" enctype="multipart/form-data">
            <h2 name="">Modification d'annonce N°: <?php echo $car['id'] ?></h2> 
            <input type="hidden" value="<?= $car['id']; ?>" name="id"/>
            <div class="formulaire">
                <!--<div enctype="multipart/form-data" class="form-group">
                    <label for="image" >Image</label>
                    <input class="form-control" type="file" name="image" id="exampleFormControlInput1" >
                </div>-->
                <div class="form-group">
                    <label for="modele" >Modele</label>
                    <textarea rows="1" class="form-control" type="text" name="modele"><?php echo htmlentities($car['modele']);?></textarea>
                </div>
                <div class="form-group">
                    <label for="energy">Energie</label>
                    <select class="form-control" name="energy" id="exampleFormControlInput1" value=<?php echo ($car['energy']);?>>
                        <option value=<?php echo ($car['energy']);?>><?php echo ($car['energy']);?></option>
                        <option value="Gasoil">Gasoil</option>
                        <option value="Electric">Electric</option>
                        <option value="Hybride">Hybride</option>
                        <option value="Essence">Essence</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="km" >Km</label>
                    <input class="form-control" type="text" name="km" value=<?php echo ($car['km']);?>>
                </div>
                <div class="form-group">
                    <label for="year">Année</label>
                    <input class="form-control" type="text" name="year" value=<?php echo ($car['year']);?>>
                </div>
                <div class="form-group">
                    <label for="carContent">Descriptif court</label>
                    <textarea rows="3" class="form-control" type="text" name="carContent" id="carContent"><?php echo htmlentities($car['carContent']);?></textarea>
                </div>
                <div class="form-group">
                    <label for="carColor">Couleur</label>
                    <textarea  rows="1"class="form-control" type="text" name="carColor" id="carColor" ><?php echo htmlentities($car['color']);?></textarea>
                </div>
                <div class="form-group">
                    <label for="carBoite">Boite de vitesse</label>
                    <select class="form-control" name="carBoite" id="exampleFormControlInput1" value=<?php echo ($car['carBoite']);?>>
                        <option value=<?php echo ($car['carBoite']);?>><?php echo ($car['carBoite']);?></option>
                        <option value="manuelle">Manuelle</option>
                        <option value="automatic">Automatique</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="carDoor" >Nombre de portes</label>
                    <input class="form-control" type="integer" name="carDoor" value=<?php echo ($car['carDoor']);?>>
                </div>
                <div class="form-group">
                    <label for="puissanceFiscale" >Puissance fiscale</label>
                    <input class="form-control" type="integer" name="puissanceFiscale" value=<?php echo ($car['puissanceFiscale']);?>>
                </div>
                <div class="form-group">
                    <label for="puissance" >Puissance (DIN)</label>
                    <input class="form-control" type="integer" name="puissance" value=<?php echo ($car['Puissance']);?>>
                </div>
                <div class="form-group">
                    <label for="price">Prix</label>
                    <input class="form-control" id="price" type="text" name="price" value=<?php echo ($car['price']);?>>
                </div>      
                <div class="form-group">
                    <label for="guarantie" >Garantie</label>
                    <input class="form-control" type="integer" name="guarantie" value=<?php echo ($car['guarantie']);?>>
                </div>          
                <div class="form-group">
                <button type="submit" name="modifierAnnonce">Valider la modification</button>
                <button  type="submit" name="supprimerAnnonce">Supprimer l'annonce</button>
                </div>
            </div>
        </form>
        <?php } ?>
        <form  action="../templates/adminVehicule.php" method="POST" style="display:flex; justify-content:center">
            <button  type="submit" name="creerAnnonce">Créer une annonce</button>
        </form>
        <?php include '../templates/footer.php' ?>

    
