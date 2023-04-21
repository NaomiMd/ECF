<?php
require_once("../../config.php");
require_once("../../config.php");
require_once _ROOT_ . '\Controller\DishController.php';

$dishController = new DishController();
$dishController->deleteDish($_GET['id']);

echo"<script>window.location.href='./carte.php'</script>";

?>