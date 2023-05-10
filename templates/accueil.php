<?php
require_once _ROOT_ . '\Controller\GalerieController.php';

$galerieController = new GalerieController();
$galeries = $galerieController->getAll();

?>
<div class="container-fluid" id="banner-img">
        <div>
          <img class="logoheader" src="<?= generateLink('assets/img/logo.svg') ?>" alt="logo">
        </div>
</div>


<div class="container-fluid text-center" id="presentation" >
    <h2>restaurant gastronomique à chambéry</h2>
    <h4>Distingué de 2 étoiles au Guide Michelin</h4>
    <div class="highlight" ></div>
</div>
<!-- présentation du chef -->

<div class="container-fluid cuisine">
<div>
    <img src="<?= generateLink('assets/img/chef.jpg') ?>" alt="Le chef Arthur Michant" class="img-chef" >
  </div>
  <div class="text">
    <h2>Le Chef</h2>
    <h4>Arthur Michant</h4>
    <div class="highlight"></div>
    <p>
    Le chef Arnaud Michant vous invite à découvrir une cuisine 
    remplie de saveur inspiré de la Savoie.<br>
    Sa passion pour la cuisine a commencé dès son plus jeune âge, 
    lorsqu'il aidait sa grand-mère à préparer des plats traditionnels 
    à base de produits frais et locaux. <br/>
    Sa philosophie de cuisine est de mettre en valeur les ingrédients 
    locaux et de saison, en utilisant des techniques modernes pour créer des plats innovants et savoureux. <br/>
    Son talent et sa créativité ont été récompensés par de nombreux 
    prix prestigieux dans l'industrie culinaire.
    </p>
</div>
</div>

<div class="container text-center">
    <div class="verticalRight">
    <h3 class="carteTitle" >Découvrez la carte</h3>
    </div>
<div class="verticalLeft">
<p>Notre Chef vous convie à partager sa cuisine et ses nouvelles créations pour le déjeuner et dîner.</p>
<a href="<?= generateLink('carte.php')?>" class="carteBtn" >Carte & Menu</a>
</div>
<div class="horizontalLeft"></div>
</div>



<div class="container-fluid cuisine" id="team">
    <div class="text">
    <h4 >L'équipe</h4>
    <div class="highlight"></div>
    <p>
    Notre équipe est composée de passionnés de la gastronomie, qui travaillent ensemble pour offrir une expérience culinaire de classe mondiale à nos clients. <br/>
    Chaque membre de notre équipe apporte une expertise unique, créant une atmosphère dynamique et collaborative dans notre restaurant. <br/>
    Notre personnel de service est également une partie essentielle de notre équipe, offrant un service attentionné et professionnel à nos clients. <br/>
    Ils sont formés pour répondre aux besoins et aux demandes spécifiques de nos clients, offrant une expérience personnalisée et mémorable.
</p>
</div>
<div class="restaurant">
    <img src="<?= generateLink('assets/img/equipe.jpg') ?>" alt="img" class="img-cuisine" >
  </div>
</div>

<!-- GALERIE -->

<div class="container text-center" id="galerie" >
    <h3>Galerie</h3>
</div>

<div id="grid">
    
    <?php
    foreach($galeries as $galerie) : 
    ?>
    <div class="grid-item">
        <img src="<?=  $galerie->getImage(); ?>" alt="galerie" class="grid-img">
        <span class="img-title"><?= $galerie->getTitle(); ?></span>
    </div>
    <?php endforeach ; ?>
</div>

<!-- RESERVER -->

<div class="container-fluid button d-flex justify-content-center">
    <a class="btn-reserver" href="<?= generateLink('reservation.php') ?>">Réserver</a>
</div>