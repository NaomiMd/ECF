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
<div class="mb-3 mt-4">
  <label for="email" class="form-label">Adresse mail</label>
  <input type="email" name="email" class="form-control" id="email" placeholder="nom@example.com">
</div>
<div class="mb-3">
<label for="password" class="form-label">Password</label>
<input type="password" name="password" id="password" class="form-control">
</div>
<div class="mb-3">
<button type="submit" class="btn mb-3 mt-2" id="btnconnexion" >Se connecter</button>
</div>
</div>




<?php
require_once _ROOT_ . '\templates\footer.php';

?>