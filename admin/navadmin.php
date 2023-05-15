<header>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" data-bs-theme="dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= generateLink('index.php') ?>">Quai Antique</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav" >
      <a class="nav-link" href="<?= generateLink('admin/home.php') ?>">Accueil</a>
        <a class="nav-link" href="<?= generateLink('admin/Galerie/galerie.php') ?>">Galerie</a>
        <a class="nav-link" href="<?= generateLink('admin/Horaire/horaires.php') ?>">Horaires</a>
        <a class="nav-link" href="<?= generateLink('admin/Carte/carte.php') ?>">Carte</a>
        <a class="nav-link" href="<?= generateLink('admin/Menu/menu.php') ?>">Menu</a>
        <a class="nav-link" href="<?= generateLink('admin/Reservation/reservation.php') ?>">Réservation</a>
    <a class="nav-link" aria-current="page" href="<?= generateLink('logout.php') ?>">Se deconnecter</a>
      </div>
    </div>
  </div>
</nav>
</header>
