 <div class="main-sidebar sidebar-style-2">
   <aside id="sidebar-wrapper">
     <div class="sidebar-brand">
       <img src="{{ url('') }}/img/logo-1.png" alt="Aisyiyah Surakarta" width="182">
     </div>
     <div class="sidebar-brand sidebar-brand-sm">
       <img src="{{ url('') }}/img/logo-2.png" class="mt-4" alt="Aisyiyah Surakarta" width="54">
     </div>
     <ul class="sidebar-menu mt-5">
       <hr class="mb-2">
       <li class="menu-header">Dashboard</li>
       <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
         <a href="/" class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a>
       </li>
       <hr class="my-2">
       <li class="menu-header">Admin</li>
       <li class="nav-item {{ Request::is('profile/kader') ? 'active' : '' }}">
         <a href="/profile/kader" class="nav-link"><i class="fas fa-users"></i><span>Profil Kader</span></a>
       </li>
       <li class="nav-item {{ Request::is('data/jabatan') ? 'active' : '' }}">
         <a href="/data/jabatan" class="nav-link"><i class="fas fa-th"></i><span>Data Jabatan</span></a>
       </li>
       <li
         class="nav-item dropdown {{ Request::is('data/daerah') || Request::is('data/cabang') || Request::is('data/ranting') ? 'active' : '' }}">
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
       <li class="nav-item {{ Request::is('settings') ? 'active' : '' }}">
         <a href="/settings" class="nav-link"><i class="fas fa-cogs"></i></i><span>Setting</span></a>
       </li>
     </ul>
   </aside>
 </div>
