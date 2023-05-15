<?php
require_once("../../config.php");
require_once _ROOT_ . '\templates\header.php';
require_once _ROOT_ . '\admin\navadmin.php';
require_once _ROOT_ . '\Controller\CategoryController.php';
require_once _ROOT_ . '\Controller\DishController.php';
if(!isset($_SESSION['admin']['email']))
{
    header('location: login.php');
}
$CategoryController = new CategoryController();
$categories = $CategoryController->getAll();
$DishController = new DishController();
$dish = $DishController->getIdDish($_GET['id']);
if($_POST)
{
    $dish->hydrate($_POST);
    $DishController->updateDish($dish);
    echo"<script>window.location.href='./carte.php'</script>";
}
?>
<h3 class="text-center mt-5">Modifier la carte</h3>
<div class="container d-flex justify-content-center mt-5">
<form method="post">
    <label for="title" class="form-label mt-4">Titre du plat</label>
    <input type="text" name="title" class="form-control" value="<?= $dish->getTitle(); ?>" >
    <label class="form-label mt-4" for="description">Description</label>
    <textarea class="form-control" name="description" cols="30" rows="10" required ><?= $dish->getDescription();  ?></textarea>
    <label class="form-label mt-4" for="price">Prix</label>
    <input type="text" name="price" class="form-control" value="<?= $dish->getPrice(); ?>" required>
    <label for="category_id" class="form-label mt-4">Changer la catégorie</label>
    <select class="form-select" aria-label="Default select example" name="category_id" required >
    <option selected>-- Selectionnez --</option>
    <?php foreach($categories as $categorie) : ?>
    <option <?= $categorie->getId() === $dish->getCategory_Id() ? "selected" : "" ?> value="<?= $categorie->getId(); ?>"><?= $categorie->getTitle(); ?></option>
   <?php endforeach ; ?>
</select>
<div class="container text-center mt-3 mb-5">
    <button type="submit" class="btn btnCard">Modifier</button>
</div>
</form>
</div>
<?php 
require_once _ROOT_ . '\admin\footer.php';
?>