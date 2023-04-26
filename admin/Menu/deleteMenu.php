<?php
require_once("../../config.php");
require_once _ROOT_ . '\templates\header.php';
require_once _ROOT_ . '\Controller\FormuleController.php';

if(!isset($_SESSION['admin']))
{
    header('location: login.php');
}

$formuleController = new FormuleController();
$formuleController->deleteFormule($_GET['id']);

echo"<script>window.location.href='./menu.php'</script>";