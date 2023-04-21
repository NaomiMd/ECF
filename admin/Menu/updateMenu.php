<?php
require_once("../../config.php");
require_once _ROOT_ . '\templates\header.php';
require_once _ROOT_ . '\admin\navadmin.php';
require_once _ROOT_ . '\Controller\FormuleController.php';
require_once _ROOT_ . '\Controller\MenuController.php';

$FormuleController = new FormuleController();
$formule = $FormuleController->getIdFormule($_GET['id']);

$MenuController = new MenuController();
$menus = $MenuController->getAll();

if($_POST)
{
    $formule->hydrate($_POST);
    $FormuleController->updateFormule($formule);
    echo"<script>window.location.href='./menu.php'</script>";
}

?>


<h3 class="text-center mt-5">Modifier le menu </h3>
<div class="container d-flex justify-content-center mt-5">
<form method="post">

    <label class="form-label mt-4" for="description">Description</label>
    <textarea class="form-control" name="description" cols="30" rows="10" required ><?= $formule->getDescription();  ?></textarea>

    <label class="form-label mt-4" for="price">Prix</label>
    <input type="text" name="price" class="form-control p-2" value="<?= $formule->getPrice(); ?>" required>

    <label for="menu_id" class="form-label mt-4">Changer le menu</label>
    <select class="form-select" aria-label="Default select example" name="menu_id" required >
    <option selected>-- Selectionnez --</option>
    <?php foreach($menus as $menu) : ?>
    <option <?= $menu->getId() === $formule->getMenu_id() ? "selected" : "" ?> value="<?= $menu->getId(); ?>"><?= $menu->getTitle(); ?></option>
   <?php endforeach ; ?>
</select>

<div class="container text-center mt-3">
    <button type="submit" class="btn btnCard">Modifier</button>
</div>
</form>

</div>


<?php 
require_once _ROOT_ . '\admin\footer.php';
?>