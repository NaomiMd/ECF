<?php
require_once _ROOT_ . '\Controller\CategoryController.php';
require_once _ROOT_ . '\Controller\FormuleController.php';
require_once _ROOT_ . '\Controller\DishController.php';
require_once _ROOT_ . '\Controller\MenuController.php';

$CategoryController = new CategoryController();
$categories = $CategoryController->getAll();

$DishController = new DishController();
$dishes = $DishController->getAll();

$FormuleController = new FormuleController();
$formules = $FormuleController->getAll();

$MenuController = new MenuController();

?>
<div class="container-fluid" id="banner-carte">
        <div>
          <h1 class="pagetitle" >Carte & Menus</h1>
        </div>
</div>

<div class="container-fluid menus">
<h3 class="text-center mt-4" id="titlemenu">Les Menus</h3>
<div class="underline"></div>
<?php
foreach($formules as $formule) :
  $menu = $MenuController->getIdMenu($formule->getMenu_Id());
?>
<div class="block">
<div class="container text-center mt-5">
    <h5 class="menuTitle">Menu <?= $menu->getTitle(); ?></h5>
    <div class="line"></div>
    <div class="menu mt-4">
        <p><?= $formule->getDescription(); ?></p>
        <p class="italic" ><?= $formule->getPrice(); ?>€</p>
    </div>
</div>
</div>
<?php endforeach ; ?>
</div>

<div class="line mt-5"></div>
<div class="container mb-5">
    <h3 class="text-center mt-5" id="titlecarte">La Carte</h3>
    <div class="underline"></div>
        
    <?php 
    foreach($categories as $category) :
    $category->getTitle();
    ?>

<div class="block">
<div class="container text-center" id="carteShow" >
    <h5 class="menuTitle"><?= $category->getTitle(); ?></h5>
    <div class="line"></div>
    <?php foreach($dishes as $dish) : ?>
    <div class="carteBox">
        <?php
         if($dish->getCategory_Id() == $category->getId()) : ?>
        <h5 class="mt-3" ><?= $dish->getTitle(); ?></h5>
        <p><?= $dish->getDescription() ?> - <?= $dish->getPrice(); ?> €</p>
        <hr class="separateur">
        <?php endif ?>
    </div>
    <?php endforeach; ?>
</div>

</div>
<?php endforeach; ?>
</div>
