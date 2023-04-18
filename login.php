<?php
require_once("config.php");
require_once _ROOT_ . '\templates\header.php';
require_once _ROOT_ . '\templates\navbar.php';

?>
<div class="container-fluid" id="banner-login">
        <div>
          <h1 class="pagetitle" >Se connecter</h1>
        </div>
</div>
</div>

<div class="container" id="connexionform" >
<h3 class="text-center mt-4">Se connecter</h3>
<div class="mb-3 mt-4">
  <label for="email" class="form-label">Adresse mail</label>
  <input type="email" name="email" class="form-control" id="email" placeholder="nom@example.com">
</div>
<div class="mb-3">
<label for="confirmedpassword" class="form-label">Mot de passe</label>
<input type="password" name="confirmedpassword" id="confirmedpassword" class="form-control">
</div>
<div class="mb-3">
<button type="submit" class="btn btnconnexion">Se connecter</button>
</div>
<hr>
<div class="mb-3">
<p>Pas encore inscrit ? <a href="<?= generateLink('register.php') ?>" class="btn btnCreate ">Créer un compte</a> </p>
</div>
</div>




<?php
require_once _ROOT_ . '\templates\footer.php';
?>