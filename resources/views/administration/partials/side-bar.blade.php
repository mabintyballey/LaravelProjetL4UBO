<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="dark">
        <a href="{{ route('administration.dashboard') }}" class="logo">
          <img
            src="{{ asset('administration/assets/img/ubo_logo.jpg') }}"
            alt="navbar brand"
            class="navbar-brand"
            height="50"
          />
        </a>

        <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
            <i class="gg-menu-right"></i>
          </button>
          <button class="btn btn-toggle sidenav-toggler">
            <i class="gg-menu-left"></i>
          </button>
        </div>

        <button class="topbar-toggler more">
          <i class="gg-more-vertical-alt"></i>
        </button>
      </div>
      <!-- End Logo Header -->
    </div>

    <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
        <ul class="nav nav-secondary">
          <li class="nav-item {{ Route::is('administration.dashboard') ? 'active' : '' }}">
            <a href="{{ route('administration.dashboard') }}">
              <i class="fas fa-home"></i>
              <p>Tableau de bord</p>
            </a>
          </li>

          <li class="nav-section">
            <span class="sidebar-mini-icon">
              <i class="fa fa-ellipsis-h"></i>
            </span>
            <h4 class="text-section">Menu</h4>
          </li>

          <li class="nav-item {{ Route::is('proffesseur.list') ? 'active' : '' }}">
            <a href="{{ route('professeur.list') }}">
              <i class="icon-briefcase"></i>
              <p>Professeurs</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('personnel.list') }}">
                <i class="icon-user"></i>
                <p>Personnels</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('etudiant.list') }}">
              <i class="icon-graduation"></i>
              <p>Etudiants</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('roles.index')}}">
              <i class="icon-book-open"></i>
              <p>Roles</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="">
              <i class="icon-folder-alt"></i>
              <p>Départements</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('classes.index') }}">
              <i class="icon-grid"></i>
              <p>Classes</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('matieres.index') }}">
              <i class="icon-calendar"></i>
              <p>Matières</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="">
              <i class="icon-note"></i>
              <p>Notes</p>
            </a>
          </li>
          <div class="divider"></div>
          <li class="nav-item">
            <a href="">
              <i class="icon-information"></i>
              <p>Mon profile</p>
            </a>
          </li>
          <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">
                  <i class="icon-logout"></i>
                  <p class="btn btn-danger text-light">Se deconnecter</p>
                </button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- End Sidebar -->
