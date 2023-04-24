<?php
require_once("../../config.php");
require_once _ROOT_ . '\templates\header.php';
require_once _ROOT_ . '\admin\navadmin.php';
require_once _ROOT_ . '\Controller\GalerieController.php';

$galerieController = new GalerieController();
$galeries = $galerieController->getAll();


?>
<div class="text-center mt-5">
  <h3>Galerie</h3>
</div>
<div class="underline"></div>

<div class="container cardCarte">
    <?php
    foreach($galeries as $galerie) :
    ?>
<div class="card border-dark  mb-3" style="width: 18rem;">
<img style="height: 25rem" src="<?=  $galerie->getImage(); ?>" class="card-img-top" id="imageCard" alt="<?= $galerie->getTitle(); ?>">
  <div class="card-body">
    <h5 class="card-title"></h5>
    <p><?= $galerie->getTitle(); ?></p>
    <a href="updateGalerie.php?id=<?=$galerie->getId() ;?>" class="btn btnCard">Modifier</a>
    <a href="deleteGalerie.php?id=<?=$galerie->getId();?>" class="btn btnCard">Supprimer</a>
  </div>
</div>
<?php endforeach; ?>
</div>
<div class="container text-center mb-5 py-5">
  <a href="addGalerie.php" class="btn btnCard">Ajouter une image</a>
</div>

<?php 
require_once _ROOT_ . '\admin\footer.php';
?>