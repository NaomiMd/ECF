<?php
require_once("../../config.php");
require_once _ROOT_ . '\templates\header.php';
require_once _ROOT_ . '\admin\navadmin.php';
require_once _ROOT_ . '\Controller\CategoryController.php';
require_once _ROOT_ . '\Controller\DishController.php';

if(!isset($_SESSION['admin']))
{
    header('location: login.php');
}

$CategoryController = new CategoryController();
$DishController = new DishController();
$dishes = $DishController->getAll();


$error = null;
?>
<div class="text-center mt-5">
  <h3>Carte</h3>
</div>
<div class="underline"></div>

<div class="container mt-5">
<div class="table-responsive">
<table class="table table-bordered" width="100%" cellspacing="0">
<thead>
  <tr>
    <th>ID</th>
    <th>Titre</th>
    <th>Description</th>
    <th>Prix</th>
    <th>Catégorie</th>
    <th>Opération</th>

  </tr>
</thead>
<?php
    foreach($dishes as $dish) :
    $category = $CategoryController->getCategoryById($dish->getCategory_Id());
?>  
<tbody>
  <tr>
    <th><?= $dish->getId(); ?></th>
    <th><?= $dish->getTitle(); ?></th>
    <th><?= $dish->getDescription(); ?></th>
    <th><?= $dish->getPrice(); ?>€</th>
    <th><?= $category->getTitle(); ?></th>
    <th><a href="updateCarte.php?id=<?= $dish->getId(); ?>" class="btn btnCard">Modifier</a>
        <a href="deleteCarte.php?id=<?= $dish->getId(); ?>" class="btn btnCard">Supprimer</a></th>
  </tr>
</tbody>
<?php endforeach; ?>
</table>
</div>
</div>
<div class="container text-center mb-5 py-5">
  <a href="addCarte.php" class="btn btnCard">Ajouter un plat</a>
</div>

<?php 
require_once _ROOT_ . '\admin\footer.php';
?>