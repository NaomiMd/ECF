<?php
require_once("../../config.php");
require_once _ROOT_ . '\templates\header.php';
require_once _ROOT_ . '\admin\navadmin.php';
require_once _ROOT_ . '\Controller\FormuleController.php';
require_once _ROOT_ . '\Controller\MenuController.php';

$MenuController= new MenuController();
$menus = $MenuController->getAll();

$FormuleController = new FormuleController();

if($_POST)
{
    $newFormule = new Formule($_POST);
    $FormuleController->createFormule($newFormule);
    echo"<script>window.location.href='./menu.php'</script>";
}

?>


<h3 class="text-center mt-5">Ajouter une formule</h3>
<div class="container d-flex justify-content-center mt-5">
<form method="post">

    <label class="form-label mt-4" for="description">Description</label>
    <textarea class="form-control" name="description" cols="30" rows="10" placeholder="Description de la formule" required></textarea>

    <label class="form-label mt-4" for="price">Prix</label>
    <input type="text" name="price" class="form-control p-2" value="" required>

    <label for="menu_id" class="form-label mt-4">Selectionner le menu correspondant</label>
    <select class="form-select" aria-label="Default select example" name="menu_id" required >
    <option selected>-- Selectionnez --</option>
    <?php foreach($menus as $menu) : ?>
    <option value="<?= $menu->getId(); ?>"><?= $menu->getTitle(); ?></option>
   <?php endforeach ; ?>
</select>

<div class="container text-center mt-3">
    <button type="submit" class="btn btnCard">Ajouter</button>
</div>
</form>

</div>


<?php 
require_once _ROOT_ . '\admin\footer.php';
?>