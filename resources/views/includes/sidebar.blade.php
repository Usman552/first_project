 <!--begin::Sidebar-->
 <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
     <!--begin::Sidebar Brand-->
     <div class="sidebar-brand">
         <!--begin::Brand Link-->
         <a href="" class="brand-link">
             <!--begin::Brand Image-->
             <img src="/assets/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image opacity-75 shadow" />
             <!--end::Brand Image-->
             <!--begin::Brand Text-->
             <span class="brand-text fw-light">E_Commerce</span>
             <!--end::Brand Text-->
         </a>
         <!--end::Brand Link-->
     </div>
     <!--end::Sidebar Brand-->
     <!--begin::Sidebar Wrapper-->
     <div class="sidebar-wrapper">
         <nav class="mt-2">
             <!--begin::Sidebar Menu-->
             <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="navigation"
                 aria-label="Main navigation" data-accordion="false" id="navigation">
                 <li class="nav-item {{ request()->routeIs('dashboard') ? 'menu-open' : '' }}">
                     {{-- <a href="{{ route('dashboard') }}" class="nav-link"> --}}
                         <i class="nav-icon bi bi-speedometer"></i>
                         <p>Dashboard</p>
                     </a>
                 </li>

                 <li class="nav-item {{ request()->routeIs('products*') ? 'menu-open .nav-link.active ' : '' }}">
                     <a href="{{ route('products.product') }}" class="nav-link">
                         <i class="nav-icon bi bi-boxes"></i>
                         <p>Products</p>
                     </a>
                 </li>

                 <li class="nav-item menu-open">
                     <a href="{{ Route('category') }}" class="nav-link ">
                         <i class="nav-icon bi bi-tags"></i>
                         <p>
                             Categories
                         </p>
                     </a>
                 </li>
             </ul>
             <!--end::Sidebar Menu-->
         </nav>
     </div>
     <!--end::Sidebar Wrapper-->
 </aside>
 <!--end::Sidebar-->
