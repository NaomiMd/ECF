<?php
require_once("../config.php");
require_once _ROOT_ . '\templates\header.php';
require_once _ROOT_ . '\admin\navadmin.php';

if(!isset($_SESSION['admin']))
{
    header('location: login.php');
}

?>
<!-- isset(connexion) -->
<h1 class="text-center homeadmin" >Bienvenue dans l'administration du Quai Antique</h1>
<p class="text-center" >Vous pouvez ici gérer l'administration du quai antique</p>


<?php 
require_once _ROOT_ . '\admin\footer.php';
?>