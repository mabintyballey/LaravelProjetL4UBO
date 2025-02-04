<header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">GestEtudiant</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Acceuil</a></li>
          <li><a href="#about">A propos</a></li>
          <li><a href="#services">Nos departements</a></li>
          <li><a href="#team">Nos professeurs</a></li>
          <li><a href="#contact">Contactez-nous</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    @guest
        @if (Route::has('register'))
            <a class="btn-getstarted" href="{{ route('register') }}">Nous rejoindre</a>
        @endif
    @endguest

    </div>
  </header>
