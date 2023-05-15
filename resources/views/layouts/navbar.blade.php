<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
 
   
   
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
   
      

      <!-- Nav Item - User Information -->
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggl" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                      {{ auth()->user()->name }}
          </span>
          <img class="img-profile rounded-circle" src="https://startbootstrap.github.io/startbootstrap-sb-admin-2/img/undraw_profile.svg">
        </a>
        <!-- Dropdown - User Information -->
       
      </li>
      <li class="nav-item dropdown no-arrow">

      <div class="nav-link ">  
        <form class="dropdown-item" method="POST" action="{{ route('logout') }}">
          @csrf
        <a class="dropdown-item p-0" href="{{ route('logout') }}">
          <button type="submit" class="bg-transparent border-0 mx-0 p-0">
          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          Logout
      </button>
        </a>
        </form>
      </div>
      </li>
    </ul>
   
  </nav>