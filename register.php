<?php
require_once("config.php");
require_once _ROOT_ . '\templates\header.php';
require_once _ROOT_ . '\templates\navbar.php';

?>
<div class="container-fluid" id="banner-login">
        <div>
          <h1 class="pagetitle">S'inscrire</h1>
        </div>
</div>
</div>

<div class="container" id="connexionform">
    <h3 class="text-center mt-4">S'inscrire</h3>
<div class="mb-3 mt-4">
  <label for="email" class="form-label">Adresse mail</label>
  <input type="email" name="email" class="form-control" id="email" placeholder="nom@example.com" required >
</div>
<div class="mb-3">
<label for="password" class="form-label">Mot de passe</label>
<input type="password" name="password" id="password" class="form-control" required >
</div>
<div class="mb-3">
<label for="password" class="form-label">Confirmer votre mot de passe</label>
<input type="password" name="password" id="password" class="form-control" required>
</div>
<div class="mb-3  ">
<label for="convives">Nombre de convives</label>
<select class="form-select" name="convives" aria-label="Default select example" required>
  <option selected>Selectionner</option>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
</select>
</div>
<div class="mb-3 mt-4">
    <label for="alergy">Mention des allergies</label>
    <textarea class="form-control" name="alergy" id="alergy" cols="10" rows="5"></textarea>
</div>
<div class="mb-3">
<button type="submit" class="btn btnconnexion">S'inscrire</button>
</div>
</div>


<?php
require_once _ROOT_ . '\templates\footer.php';
?>