<header>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark p-md-3">
        <div class="container">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <div class="mx-auto"></div>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?= generateLink('index.php') ?>">Accueil</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= generateLink('carte.php') ?>">Carte & Menu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= generateLink('reservation.php') ?>">Réserver</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="<?= generateLink('login.php') ?>"><i class="bi bi-person-circle"></i></a>
              </li>
              
            </ul>
          </div>
        </div>
      </nav>
</header>