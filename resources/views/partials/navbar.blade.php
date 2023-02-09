<nav class="navbar navbar-expand-lg main-navbar">
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a>
      </li>
      <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a>
      </li>
    </ul>
  </form>
  <ul class="navbar-nav navbar-right">
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg">
        <figure class="avatar mr-2">
          <img alt="image"
            src="{{ asset('storage/' .DB::table('kader')->where('nik', Auth::user()->kader_nik)->first()->foto) }}"
            class="rounded-circle mr-1"> <i class="avatar-presence online"></i>
        </figure>
        <div class="d-sm-none d-lg-inline-block" style="font-size: 15px">
          <b>Hi, {{ DB::table('kader')->where('nik', Auth::user()->kader_nik)->first()->nama }}</b>
        </div>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <a href="/change/password" class="dropdown-item has-icon">
          <i class="fas fa-key"></i> Change Password
        </a>
        <div class="dropdown-divider"></div>
        <hr class="hr-width ">
        <form action="/logout" method="post">
          @csrf
          <button class="dropdown-item text-danger logout"><i class="fas fa-sign-out-alt"></i><span
              class="mx-2">Logout</span></button>
        </form>
      </div>
    </li>
  </ul>
</nav>
