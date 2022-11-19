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

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
              <li class="menu-item {{ (request()->is('user/dashboard')) ? 'active' : '' }}">
                <a href="{{url('user/dashboard')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bx-home-circle"></i>
                  <div data-i18n="Analytics">Dashboard</div>
                </a>
              </li>
               <!-- Order -->
               <li class="menu-item {{ (request()->is('user/*order*')) ? 'active' : '' }}">
                <a href="{{url('user/all-order')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-purchase-tag-alt"></i>
                  <div data-i18n="Analytics">Order</div>
                </a>
              </li>
               <!-- Account -->
              <li class="menu-item {{ (request()->is('user/*account*')) ? 'active' : '' }}">
                <a href="{{url('user/account')}}" class="menu-link">
                  <i class="menu-icon tf-icons bx bxs-user-account"></i>
                  <div data-i18n="Analytics">Account</div>
                </a>
              </li>
          </ul>

        </aside>
        <!-- / Menu -->