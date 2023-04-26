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
<div class="container cardCarte">
<?php
    foreach($dishes as $dish) :
    $category = $CategoryController->getCategoryById($dish->getCategory_Id());
?>   
<div class="card border-dark  mb-3" style="width: 18rem;">
  <div class="card-body">
     <div class="text-center p-2">
        <h5><?= $dish->getTitle(); ?></h5>
        <hr>
        <p><?= $dish->getDescription(); ?></p>
        <p><?= $dish->getPrice(); ?>€</p>
        <p><?= $category->getTitle(); ?></p>
        <a href="updateCarte.php?id=<?= $dish->getId(); ?>" class="btn btnCard">Modifier</a>
        <a href="deleteCarte.php?id=<?= $dish->getId(); ?>" class="btn btnCard">Supprimer</a>

     </div>
  </div>
</div>
<?php endforeach; ?>
</div>
<div class="container text-center mb-5 py-5">
  <a href="addCarte.php" class="btn btnCard">Ajouter un plat</a>
</div>

<?php 
require_once _ROOT_ . '\admin\footer.php';
?>