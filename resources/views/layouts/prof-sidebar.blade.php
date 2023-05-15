<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
     
      <div class="sidebar-brand-text mx-3">Prof Panel</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('prof.dashboard.index') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
    </li>



    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->


  
    <li class="nav-item">
        <a class="nav-link" href="{{ route('prof.eleves.index') }}">
            <i class="fas fa-graduation-cap"></i>
          <span>Étudiants</span></a>
      </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('prof.clubes.index') }}">
            <i class="fas fa-cubes"></i>
          <span>Clubs</span></a>
      </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('prof.activetes.index') }}">
            <i class="fas fa-cube"></i>
          <span>Activetes</span></a>
      </li>

  </ul>
