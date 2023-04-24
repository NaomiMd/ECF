<?php
require_once("../../config.php");
require_once _ROOT_ . '\templates\header.php';
require_once _ROOT_ . '\admin\navadmin.php';
require_once _ROOT_ . '\Controller\GalerieController.php';

$galerieController = new GalerieController();

if($_POST)
{
    $galerie = new Galerie($_POST);
    $galerieController->createGalerie($galerie);
    echo"<script>window.location.href='./galerie.php'</script>'";
}
?>

<h3 class="text-center mt-5">Ajouter une image</h3>
<div class="container d-flex justify-content-center mt-5">
<form method="post">

    <label for="title" class="form-label mt-4">Titre de l'image</label>
    <input type="text" name="title" class="form-control" value="" required >

    <label class="form-label mt-4" for="image">URL de l'image</label>
    <textarea name="image" class="form-control " id="" cols="30" rows="10" required></textarea>
    

<div class="container text-center mt-4">
    <button type="submit" class="btn btnCard">Ajouter</button>
</div>
</form>

</div>


<?php 
require_once _ROOT_ . '\admin\footer.php';
?>
