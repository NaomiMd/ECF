<?php
require_once("config.php");
require_once _ROOT_ . '\templates\header.php';
require_once _ROOT_ . '\templates\navbar.php';
require_once _ROOT_ . '\Controller\UserController.php';
require_once _ROOT_ . '\Controller\AdminController.php';

if(isset($_SESSION['user']))
{
  header('location: index.php');
}
if(isset($_SESSION['admin']))
{
  header('location: index.php');
}

$userController = new UserController();
$adminController = new AdminController();

?>

<div class="container-fluid" id="banner-login">
        <div>
          <h1 class="pagetitle">Se connecter</h1>
        </div>
</div>
</div>

<?php
if($_POST)
{
  $user = $userController->verifyLoginUser($_POST['email'], $_POST['password']);
  $admin = $adminController->verifyAdminLogin($_POST['email'], $_POST['password']);
  if($user)
  {
    $_SESSION['user'] = ['email' => $user['email']];
    header('location: index.php');
  }elseif($admin)
  {
    $_SESSION['admin'] = ['email' => $admin['email']];
    header('location: index.php');
  }else{
    echo '<h3 class="text-center mt-3" style="color:red" >Identifiants invalides</h3>';
  }
}
?>
<div class="container connexionform">
<h3 class="text-center mt-4">Se connecter</h3>
<form method="POST" enctype="multipart/form-data" >
<div class="mb-3 mt-4">
  <label for="email" class="form-label">Adresse mail</label>
  <input type="email" name="email" class="form-control" id="email" placeholder="nom@example.com" required >
</div>
<div class="mb-3">
<label for="password" class="form-label">Mot de passe</label>
<input type="password" name="password" placeholder="****" class="form-control" required >
</div>
<div class="mb-3">
<button type="submit" name="login" class="btn btnconnexion">Se connecter</button>
</div>
<hr>
<div class="mb-3">
<p>Pas encore inscrit ? <a href="<?= generateLink('register.php') ?>" class="btn btnCreate ">Créer un compte</a> </p>
</div>
</form>
</div>

<?php
require_once _ROOT_ . '\templates\footer.php';
?>