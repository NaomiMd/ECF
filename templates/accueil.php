<?php
require_once _ROOT_ . '\Controller\GalerieController.php';

$galerieController = new GalerieController();
$galeries = $galerieController->getAll();

?>
<div class="container-fluid" id="banner-img">
        <div>
          <img class="logoheader" src="<?= generateLink('assets/img/logo.png') ?>" alt="logo">
        </div>
</div>
<div class="container-fluid text-center" id="presentation" >
    <h4>restaurant gastronomique à chambéry</h4>
    <h5>Distingué de 2 étoiles au Guide Michelin</h5>
    <div class="highlight" ></div>
</div>
<div class="container-fluid cuisine">
    <img src="<?= generateLink('assets/img/chef.jpg') ?>" alt="Le chef Arthur Michant" class="img-chef" >
  <div class="text">
    <h4>Le Chef</h4>
    <h2>Arthur Michant</h2>
    <div class="highlight"></div>
    <p>
    Le chef Arnaud Michant vous invite à découvrir une cuisine 
    remplie de saveur inspiré de la Savoie.<br>
    Sa passion pour la cuisine a commencé dès son plus jeune âge, 
    lorsqu'il aidait sa grand-mère à préparer des plats traditionnels 
    à base de produits frais et locaux. </p>
    <p></p>
    <p>
    Sa philosophie de cuisine est de mettre en valeur les ingrédients 
    locaux et de saison, en utilisant des techniques modernes pour créer des plats innovants et savoureux. <br/>
    Son talent et sa créativité ont été récompensés par de nombreux 
    prix prestigieux dans l'industrie culinaire.
    </p>
</div>
</div>

<div class="container text-center mb-5">
    <div class="verticalRight">
    <h4 class="carteTitle" >Découvrez la carte</h4>
    </div>
<div class="verticalLeft">
<p>Notre Chef vous convie à partager sa cuisine et ses nouvelles créations pour le déjeuner et dîner.</p>
<a href="<?= generateLink('carte.php')?>" class="carteBtn" >Carte & Menu</a>
</div>
<div class="horizontalLeft"></div>
</div>
<div class="container-fluid mt-5 cuisine">
    <div class="text">
    <h2>L'équipe</h2>
    <div class="highlight"></div>
    <p>
    Notre équipe est composée de passionnés de la gastronomie, qui travaillent ensemble pour vous offrir une expérience culinaire de classe mondiale. <br/>
    Chaque membre de notre équipe apporte une expertise unique, créant une atmosphère dynamique et collaborative dans notre restaurant. </p>
    <p>Notre personnel de service est également une partie essentielle de notre équipe, vous offrant un service attentionné et professionnel. <br/>
    Ils sont formés pour répondre à vos besoins et vos demandes spécifiques, pour vous offrir une expérience personnalisée et mémorable.
    </p>
</div>
    <img src="<?= generateLink('assets/img/equipe.jpg') ?>" alt="img" class="img-cuisine" >
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
<div class="container-fluid button d-flex justify-content-center">
    <a class="btn-reserver" href="<?= generateLink('reservation.php') ?>">Réserver</a>
</div>