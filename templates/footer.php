    </main>
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
                <p>Horaires d’ouverture:<br>
                <?php $horaires = getHoraire($adminpdo);
                foreach ($horaires as $horaire){
                $heure_debut_am = date("H:i", strtotime($horaire['heure_debut_am']));
                $heure_fin_am = date("H:i", strtotime($horaire['heure_fin_am']));
                $heure_debut_pm = date("H:i", strtotime($horaire['heure_debut_pm']));
                $heure_fin_pm = date("H:i", strtotime($horaire['heure_fin_pm']));?> 
                <?php echo($horaire['day']) ?>              
                <?php echo($heure_debut_am).' -' ?>            
                <?php echo($heure_fin_am).'-' ?>
                <?php echo($heure_debut_pm).' -' ?>
                <?php echo($heure_fin_pm) ?><br>
                <?php } ?>
                Dimanche:Fermé
                </p>
            </div>
        </div>
    </footer>
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../config/script.js"></script>
</html>
