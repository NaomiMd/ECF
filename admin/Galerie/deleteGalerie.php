<?php
require_once("../../config.php");
require_once("../../config.php");
require_once _ROOT_ . '\templates\header.php';
require_once _ROOT_ . '\admin\navadmin.php';
require_once _ROOT_ . '\Controller\GalerieController.php';
if(!isset($_SESSION['admin']['email']))
{
    header('location: login.php');
}
$galerieController = new GalerieController();
$galerieController->deleteGalerie($_GET['id']);
echo"<script>window.location.href='./galerie.php'</script>";
?>