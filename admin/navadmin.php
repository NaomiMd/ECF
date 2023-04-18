<header>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= generateLink('admin/home.php') ?>">Quai Antique</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav" >
        <a class="nav-link" href="<?= generateLink('admin/galerie.php') ?>">Galerie</a>
        <a class="nav-link" href="<?= generateLink('admin/horaires.php') ?>">Horaires</a>
        <a class="nav-link" href="<?= generateLink('admin/carte_menu.php') ?>">Menu et Carte</a>
        <a class="nav-link" href="<?= generateLink('admin/reservation.php') ?>">Réservation</a>
<!-- renvoie à logout.php -->
    <a class="nav-link" aria-current="page" href="logout.php">Se deconnecter</a>
      </div>
    </div>
  </div>
</nav>
  
</header>
