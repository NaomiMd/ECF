<?php
require_once("../../config.php");
require_once _ROOT_ . '\templates\header.php';
require_once _ROOT_ . '\admin\navadmin.php';
require_once _ROOT_ . '\Controller\GalerieController.php';

if(!isset($_SESSION['admin']))
{
    header('location: login.php');
}

$galerieController = new GalerieController();
$galeries = $galerieController->getAll();


?>
<div class="text-center mt-5">
  <h3>Galerie</h3>
</div>
<div class="underline"></div>


<div class="container mt-5">
  <div class="table-responsive">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Titre</th>
          <th>Url de l'image</th>
          <th>Visuel de l'image</th>
          <th>Opérations</th>
        </tr>
      </thead>
      <?php
      foreach($galeries as $galerie) :
      ?>
      <tbody>
        <tr>
          <th><?= $galerie->getTitle();?></th>
          <th><?=  $galerie->getImage();?></th>
          <th><img src="<?=  $galerie->getImage();?>" alt="<?= $galerie->getTitle();?>"  width="200"></th>
          <th>    
          <a href="updateGalerie.php?id=<?=$galerie->getId() ;?>" class="btn btnCard">Modifier</a>
          <a href="deleteGalerie.php?id=<?=$galerie->getId();?>" class="btn btnCard">Supprimer</a>
        </th>
        </tr>
      </tbody>
      <?php endforeach; ?>
    </table>
  </div>
</div>

</div>
<div class="container text-center mb-5 py-5">
  <a href="addGalerie.php" class="btn btnCard">Ajouter une image</a>
</div>

<?php 
require_once _ROOT_ . '\admin\footer.php';
?>