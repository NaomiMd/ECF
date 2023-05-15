<?php
require_once("config.php");
require_once _ROOT_ . '\templates\header.php';
require_once _ROOT_ . '\templates\navbar.php';
require_once _ROOT_ . '\Controller\UserController.php';

$userController = new UserController();
?>

<div class="container-fluid" id="banner-login">
        <div>
          <h1 class="pagetitle">S'inscrire</h1>
        </div>
</div>
</div>

<?php 

if(isset($_POST['login']))
{
  if($_POST['password'] === $_POST['confirmPassword'])
  {
    unset($_POST['confirmPassword']);
    $_POST['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $newUser = new User($_POST);
    $userController->createUser($newUser);
    $_SESSION['user']['email'] = $_POST['email'];
    echo"<script>window.location.href='index.php'</script>";
  }else{
    echo"<h5 class='text-center'>Le mot de passe ne correspond pas à celui entré</h5>";
  }
}

?>

<div class="container connexionform">
    <h3 class="text-center mt-4">S'inscrire</h3>

<form method="post">
<div class="mb-3 mt-4">
  <label for="email" class="form-label">Adresse mail</label>
  <input type="email" name="email" class="form-control" id="email" placeholder="nom@example.com" required >
</div>
<div class="mb-3">
<label for="password" class="form-label">Mot de passe</label>
<input type="password" name="password" id="password" class="form-control" required >
</div>
<div class="mb-3">
<label for="confirmPassword" class="form-label">Confirmez votre mot de passe</label>
<input type="password" name="confirmPassword" id="password" class="form-control" required>
</div>
<div class="mb-3  ">
<label for="number_of_guest">Nombre de convives</label>
<select class="form-select" name="number_of_guest" aria-label="Default select example" required>
  <option selected>Selectionner</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
</select>
</div>
<div class="mb-3 mt-4">
    <label for="allergy">Mention des allergies</label>
    <textarea class="form-control" placeholder="exemples: poissons, arachides, gluten..." name="allergy" id="allergy" cols="10" rows="5"></textarea>
</div>


<div class="mb-3">
<button type="submit" name="login" class="btn btnconnexion">S'inscrire</button>
</div>
</form>
</div>


<?php
require_once _ROOT_ . '\templates\footer.php';
?>