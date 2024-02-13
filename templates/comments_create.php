
<form action="comments_post_create.php" method="POST">
<h3>Laissez nous un avis:</h3>
<div class="mb-3">
      <label for="pseudo" class="form-label">Votre nom ou pseudo</label>
      <textarea class="form-control" name="pseudo" id="pseudo"></textarea>
  </div>
  <div class="mb-3">
      <label for="comment" class="form-label">Postez un commentaire</label>
      <textarea class="form-control" name="comments" placeholder="Soyez respectueux/se, nous sommes humain(e)s." id="comment"></textarea>
  </div>
  <div class="mb-3">
      <label for="rating" class="form-label">Laissez nous une note (de 1 à 5) </label>
      <input type="number" class="form-control" id="rating" name="rating" min="1" max="5" step="1" />
  </div>
  <button type="submit" class="button">Envoyer</button>
</form>