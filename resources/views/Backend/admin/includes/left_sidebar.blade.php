<body>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo" align="center">
              <a href="{{url('/')}}" class="app-brand-link" target="_blank">
                <img src="{{asset('admin_assets/img/images/logo.png')}}" width="200"> 
              </a>
            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <!--<div class="menu-inner-shadow"></div>-->

          <ul class="menu-inner py-1">
              <!-- Dashboard -->
              <li class="menu-item {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
                <a href="{{url('admin/dashboard')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-home-circle"></i>
                  <div data-i18n="Analytics">Dashboard</div>
                </a>
              </li>
              <!-- Dashboard -->
              <li class="menu-item {{ (request()->is('admin/*banner*')) ? 'active' : '' }}">
                <a href="{{url('admin/all-banner')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-images"></i>
                  <div data-i18n="Analytics">Banner</div>
                </a>
              </li>
              <!-- Dashboard -->
              <li class="menu-item {{ (request()->is('admin/all-user')) ? 'active' : '' }}">
                <a href="{{url('admin/all-user')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx bxs-user"></i>
                  <div data-i18n="Analytics">User</div>
                </a>
              </li>
              <!-- Product -->
              <li class="menu-item {{ (request()->is('admin/*product*')) ? 'active' : '' }}">
                <a href="{{url('admin/all-product')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bxl-product-hunt"></i>
                  <div data-i18n="Analytics">Product</div>
                </a>
              </li>
              <!-- Order -->
              <li class="menu-item {{ (request()->is('admin/*order*')) ? 'active' : '' }}">
                <a href="{{url('admin/all-order')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-purchase-tag-alt"></i>
                  <div data-i18n="Analytics">Order</div>
                </a>
              </li>
               <!-- News -->
               <li class="menu-item {{ (request()->is('admin/*news*')) ? 'active' : '' }}">
                <a href="{{url('admin/all-news')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-news"></i>
                  <div data-i18n="Analytics">News</div>
                </a>
              </li>
              <!-- Blog -->
              <li class="menu-item {{ (request()->is('admin/*blog*')) ? 'active' : '' }}">
                <a href="{{url('admin/all-blog')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bxl-blogger"></i>
                  <div data-i18n="Analytics">Blog</div>
                </a>
              </li>
              <!-- Donation -->
              <li class="menu-item {{ (request()->is('admin/*donation*')) ? 'active' : '' }}">
                <a href="{{url('admin/all-donation')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-donate-heart"></i>
                  <div data-i18n="Analytics">Donation</div>
                </a>
              </li>
               <!-- Account -->
              <li class="menu-item {{ (request()->is('admin/*contact*')) ? 'active' : '' }}">
                <a href="{{url('admin/contact')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-contact"></i>
                  <div data-i18n="Analytics">Contact</div>
                </a>
              </li>
               <!-- Media -->
              <li class="menu-item {{ (request()->is('admin/*media*')) ? 'active' : '' }}">
                <a href="{{url('admin/all-media')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-file"></i>
                  <div data-i18n="Analytics">Media</div>
                </a>
              </li>
               <!-- Account -->
              <li class="menu-item {{ (request()->is('admin/*account*')) ? 'active' : '' }}">
                <a href="{{url('admin/account')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-user-account"></i>
                  <div data-i18n="Analytics">Account</div>
                </a>
              </li>
          </ul>

        </aside>
        <!-- / Menu -->