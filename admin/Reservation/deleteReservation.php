<?php
require_once("../../config.php");
require_once("../../config.php");
require_once _ROOT_ . '\templates\header.php';
require_once _ROOT_ . '\admin\navadmin.php';
require_once _ROOT_ . '\Controller\ReservationController.php';

if(!isset($_SESSION['admin']))
{
    header('location: index.php');
}

$reservationController = new ReservationController();
$reservations = $reservationController->deleteReservation($_GET['id']);

echo"<script>window.location.href='./reservation.php'</script>";

?>