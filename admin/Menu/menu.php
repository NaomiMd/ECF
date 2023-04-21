<?php
require_once("../../config.php");
require_once _ROOT_ . '\templates\header.php';
require_once _ROOT_ . '\admin\navadmin.php';
require_once _ROOT_ . '\Controller\FormuleController.php';
require_once _ROOT_ . '\Controller\MenuController.php';


$FormuleController = new FormuleController();
$formules = $FormuleController->getAll();

$MenuController = new MenuController();


$error = null;
?>
<div class="text-center mt-5">
  <h3>Menu</h3>
</div>
<div class="underline"></div>
<div class="container cardCarte ">
<?php
    foreach($formules as $formule) :
        $menu = $MenuController->getIdMenu($formule->getMenu_Id());
?>   
<div class="card border-dark  mb-3" style="width: 18rem;">
  <div class="card-body">
     <div class="text-center p-2">
        <h5><?= $menu->getTitle(); ?></h5>
        <hr>
        <p><?= $formule->getDescription(); ?></p>
        <p><?= $formule->getPrice(); ?>€</p>
        <a href="updateMenu.php?id=<?= $formule->getId(); ?>" class="btn btnCard" >Modifier</a>
        <a href="deleteMenu.php?id=<?= $formule->getId(); ?>" class="btn btnCard" >Supprimer</a>

     </div>
  </div>
</div>
<?php endforeach; ?>
</div>
<div class="container text-center mt-4">
<a href="addMenu.php" class="btn btnCard" >Ajouter une formule</a>
</div>
<?php 
require_once _ROOT_ . '\admin\footer.php';
?>