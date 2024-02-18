<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
<footer>
    <div class="footer">
        <div class="footerMail">
            <img src="../assets/logo/footer/Vector_email.svg">
            <p>garageparrot@gmail.com</p>
        </div>
        <div class="footerPhone">
            <img src="../assets/logo/footer/Vector-3.svg">
            <p>09.56.12.34.56</p>
        </div>
        <nav class="navFooter">
            <ul>
            <li class="nav-item"><a href="index.php" >Accueil</a></li>
            <li class="nav-item"><a href="nos_services.php" >Nos services</a></li>
            <li class="nav-item"><a href="nos_occasions.php" >Nos occasions</a></li>
            <li class="nav-item"><a href="contact.php" >Contact</a></li>
            </ul>
        </nav>
        <div class="localisation">
            <img src="../assets/logo/footer/Vector.svg">
            <p>Avenue Mirambeau <br>
                31000 Toulouse</p>
        </div>
        <div class="horaires ">
        <table border="1">
      <tbody>
      <?php $horaires = getHoraire($adminpdo);
        foreach ($horaires as $horaire){?> 
              <tr>
                  <td><?php echo($horaire['day']) ?></td>                  
                  <td><?php echo($horaire['heure_debut_am']) ?></td>
                  <td><?php echo($horaire['heure_fin_am']) ?></td>
                  <td><?php echo($horaire['heure_debut_pm']) ?></td>
                  <td><?php echo($horaire['heure_fin_pm']) ?></td>
              </tr>
          <?php
         } ?>
      </tbody>
  </table>
        </div>
    </div>

          <!--essai footer-->
          <div class="container-fluid">
            <div class="row text-center footer full-widht">
					<div class="col">
						<ul class="">
							<li class="footerMail">
                                <img src="../assets/logo/footer/Vector_email.svg">
                                <p>garageparrot@gmail.com</p>
							</li>
						</ul>
					</div>
					<div class="col">
						<ul class="">
							<li class="footerMail">
                                <img src="../assets/logo/footer/Vector.svg">
                                <p>Avenue Mirambeau <br>
                                31000 Toulouse</p>
							</li>
						</ul>
					</div>
					<div class="col">
						<ul class="" >
							<li class="footerPhone">
                                <img src="../assets/logo/footer/Vector-3.svg">
                                <p>09.56.12.34.56</p>
							</li>
						</ul>
					</div>
            </div>
            <div class="row text-start footer full-widht">
                <nav class="col navFooter">
                    <ul class="">
                        <li class="nav-item"><a href="index.php" >Accueil</a></li>
                        <li class="nav-item"><a href="nos_services.php" >Nos services</a></li>
                        <li class="nav-item"><a href="nos_occasions.php" >Nos occasions</a></li>
                        <li class="nav-item"><a href="contact.php" >Contact</a></li>
                    </ul>
                </nav>
                <div class="col servicesFooter">
                <p>Nos services:</p>
						<ul class="list ">
							<li class="">Mécanique générale</li>
							<li class="">Vente Véhicules d’Occasion</li>
							<li class="">Entretien avec remise à zéro</li>
							<li class="">Diagnostique Technique</li>
							<li class="">Pneumatiques</li>
							<li class="">Dépannage et remorquage</li>
						</ul>
                </div>	
				<div class="col horaires">
                    <p>Horaires d’ouverture:</p>
                    <?php $horaires = getHoraire($adminpdo);
                    foreach ($horaires as $horaire){?>
                    <ul class="no-bullets"> 
                        <li class="text-left"><span><?php echo($horaire['day']) ?></span>              
                        <?php echo($horaire['heure_debut_am']).' -' ?>            
                        <?php echo($horaire['heure_fin_am']).' -' ?>
                        <?php echo($horaire['heure_debut_pm']).' -' ?>
                        <?php echo($horaire['heure_fin_pm']) ?><br>
                        <?php } ?>
                        <span>Dimanche:</span>Fermé</li>
                    </ul>
				</div>
            </div>
		</div>
    </footer>
    </html>
