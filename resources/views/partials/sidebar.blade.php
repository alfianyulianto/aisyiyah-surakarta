 <div class="main-sidebar sidebar-style-2">
   <aside id="sidebar-wrapper">
     <div class="sidebar-brand">
       <img src="{{ url('') }}/img/logo-1.png" alt="Aisyiyah Surakarta" width="182">
     </div>
     <div class="sidebar-brand sidebar-brand-sm">
       <img src="{{ url('') }}/img/logo-2.png" class="mt-4" alt="Aisyiyah Surakarta" width="54">
     </div>
     <ul class="sidebar-menu mt-5">
       {{-- Admin --}}
       <hr class="mb-2">
       <li class="menu-header">Dashboard</li>
       <li class="nav-item {{ Request::is('admin') ? 'active rounded-pill shadow-sm' : '' }}">
         <a href="/admin" class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a>
       </li>
       <li class="nav-item {{ Request::is('data/profil') ? 'active rounded-pill shadow-sm' : '' }}">
         <a href="/data/profil" class="nav-link"><i class="fas fa-user"></i><span>Data Pribadi</span></a>
       </li>
       <hr class="my-2">
       <li class="menu-header">Admin</li>
       <li class="nav-item {{ Request::is('profile/kader') ? 'active rounded-pill shadow-sm' : '' }}">
         <a href="/profile/kader" class="nav-link"><i class="fas fa-users"></i><span>Profil Kader</span></a>
       </li>
       <li class="nav-item {{ Request::is('data/jabatan') ? 'active rounded-pill shadow-sm' : '' }}">
         <a href="/data/jabatan" class="nav-link"><i class="fas fa-th"></i><span>Data Jabatan</span></a>
       </li>
       <li
         class="nav-item dropdown {{ Request::is('data/daerah') || Request::is('data/cabang') || Request::is('data/ranting') ? 'active rounded-pill shadow-sm' : '' }}">
         <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-server"></i></i>
           <span>Data Master</span></a>
         <ul class="dropdown-menu">
           <li class="{{ Request::is('data/daerah') ? 'active' : '' }}">
             <a class="nav-link" href="/data/daerah">DataDaerah</a>
           </li>
           <li class="{{ Request::is('data/cabang') ? 'active' : '' }}">
             <a class="nav-link" href="/data/cabang">Data Cabang</a>
           </li>
           <li class="{{ Request::is('data/ranting') ? 'active' : '' }}">
             <a class="nav-link" href="/data/ranting">Data Ranting</a>
           </li>
         </ul>
       </li>
       <li
         class="nav-item dropdown {{ Request::is('tambah/admin/daerah') || Request::is('tambah/admin/cabang') || Request::is('tambah/admin/ranting') ? 'active rounded-pill shadow-sm' : '' }}">
         <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-user-cog"></i>
           <span>Tambah Admin</span></a>
         <ul class="dropdown-menu">
           <li class="{{ Request::is('tambah/admin/daerah') ? 'active' : '' }}">
             <a class="nav-link" href="/tambah/admin/daerah">Admin Daerah</a>
           </li>
           <li class="{{ Request::is('tambah/admin/cabang') ? 'active' : '' }}">
             <a class="nav-link" href="/tambah/admin/cabang">Admin Cabang</a>
           </li>
           <li class="{{ Request::is('tambah/admin/ranting') ? 'active' : '' }}">
             <a class="nav-link" href="/tambah/admin/ranting">Admin Ranting</a>
           </li>
         </ul>
       </li>
       <li class="nav-item {{ Request::is('settings') ? 'active' : '' }}">
         <a href="/settings" class="nav-link"><i class="fas fa-cogs"></i></i><span>Setting</span></a>
       </li>

       {{-- Anggota Aisyiyah --}}
       <hr class="mb-2">
       <li class="menu-header">Dashboard Kader</li>
       <li class="nav-item {{ Request::is('kader') ? 'active rounded-pill shadow-sm' : '' }}">
         <a href="/kader" class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a>
       </li>
       <hr class="mb-2">
       <li class="menu-header">Kader Aisyiyah</li>
       <li class="nav-item {{ Request::is('profil') ? 'active rounded-pill shadow-sm' : '' }}">
         <a href="/profil" class="nav-link"><i class="fas fa-user"></i><span>Profil</span></a>
       </li>
       <li class="nav-item {{ Request::is('ortom') ? 'active rounded-pill shadow-sm' : '' }}">
         <a href="/kader/ortom" class="nav-link"><i class="fas fa-layer-group"></i><span>Daftar Ortom</span></a>
       </li>
       <li class="nav-item {{ Request::is('potensi') ? 'active rounded-pill shadow-sm' : '' }}">
         <a href="/kader/potensi" class="nav-link"><i class="fas fa-medal"></i><span>Potensi Kader</span></a>
       </li>
     </ul>
     <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
       <form action="/logout" method="post">
         @csrf
         <button class="btn btn-primary btn-lg btn-block btn-icon-split logout"><i
             class="fas fa-sign-out-alt"></i>Logout</button>
       </form>
     </div>
   </aside>
 </div>
