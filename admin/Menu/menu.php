<?php
require_once("../../config.php");
require_once _ROOT_ . '\templates\header.php';
require_once _ROOT_ . '\admin\navadmin.php';
require_once _ROOT_ . '\Controller\FormuleController.php';
require_once _ROOT_ . '\Controller\MenuController.php';

if(!isset($_SESSION['admin']))
{
    header('location: login.php');
}

$FormuleController = new FormuleController();
$formules = $FormuleController->getAll();

$MenuController = new MenuController();


$error = null;
?>
<div class="text-center mt-5">
  <h3>Menu</h3>
</div>
<div class="underline"></div>

<div class="container mt-5">
<div class="table-responsive">
  <table class="table table-bordered" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th>Titre du menu</th>
        <th>Description</th>
        <th>Prix</th>
        <th>Opérations</th>
      </tr>
    </thead>
  <?php
  foreach($formules as $formule) :
  $menu = $MenuController->getIdMenu($formule->getMenu_Id());
  ?> 
<tbody>
  <tr>
    <th><?= $menu->getTitle(); ?></th>
    <th><?= $formule->getDescription();?></th>
    <th><?= $formule->getPrice();?>€</th>
    <th>
      <a href="updateMenu.php?id=<?= $formule->getId(); ?>" class="btn btnCard">Modifier</a>
      <a href="deleteMenu.php?id=<?= $formule->getId(); ?>" class="btn btnCard">Supprimer</a>
    </th>
  </tr>
</tbody>
  <?php endforeach; ?>
  </table>
</div>
</div>

<div class="container text-center mt-4">
<a href="addMenu.php" class="btn btnCard" >Ajouter une formule</a>
</div>
<?php 
require_once _ROOT_ . '\admin\footer.php';
?>