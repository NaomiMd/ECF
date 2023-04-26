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
$categories = $CategoryController->getAll();

$DishController = new DishController();

if($_POST)
{
    $newDish = new Dish($_POST);
    $DishController->createDish($newDish);
    echo"<script>window.location.href='./carte.php'</script>";
}

?>


<h3 class="text-center mt-5">Ajouter un plat</h3>
<div class="container d-flex justify-content-center mt-5">
<form method="post">

    <label for="title" class="form-label mt-4">Titre du plat</label>
    <input type="text" name="title" class="form-control" value="" required >

    <label class="form-label mt-4" for="description">Description</label>
    <textarea class="form-control" name="description" cols="30" rows="10" required></textarea>

    <label class="form-label mt-4" for="price">Prix</label>
    <input type="text" name="price" class="form-control" value="" required>

    <label for="category_id" class="form-label mt-4">Changer la catégorie</label>
    <select class="form-select" aria-label="Default select example" name="category_id" required >
    <option selected>-- Selectionnez --</option>
    <?php foreach($categories as $categorie) : ?>
    <option value="<?= $categorie->getId(); ?>"><?= $categorie->getTitle(); ?></option>
   <?php endforeach ; ?>
</select>

<div class="container text-center mt-4">
    <button type="submit" class="btn btnCard">Ajouter</button>
</div>
</form>

</div>


<?php 
require_once _ROOT_ . '\admin\footer.php';
?>