<?php
require_once("../../config.php");
require_once("../../config.php");
require_once _ROOT_ . '\Controller\GalerieController.php';

$galerieController = new GalerieController();
$galerieController->deleteGalerie($_GET['id']);

echo"<script>window.location.href='./galerie.php'</script>";

?>