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
    </footer>
    </html>
