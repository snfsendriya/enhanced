<!DOCTYPE html>
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Login Page | SAVE NATURE FOUNDATION ADMIN PANEL</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{asset('frontend_assets/images/favicon.ico')}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{asset('admin_assets/vendor/fonts/boxicons.css')}}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('admin_assets/vendor/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('admin_assets/vendor/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('admin_assets/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('admin_assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{asset('admin_assets/vendor/css/pages/page-auth.css')}}" />
    <!-- Helpers -->
    <script src="{{asset('admin_assets/vendor/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('admin_assets/js/config.js')}}"></script>

    <link rel="stylesheet" href="{{asset('admin_assets/dist/jquery.toast.min.css')}}">

    <script src="{{asset('admin_assets/dist/jquery.toast.min.js')}}"></script>

    <link rel="stylesheet" href="{{asset('admin_assets/snackbar/snackbar.min.css')}}" />

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.6/dist/sweetalert2.all.min.js"></script>
  </head>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <!-- Register -->
          <div class="card">
            <div class="card-body">
              <!-- Logo -->
              <div class="app-brand justify-content-center">
                <a href="{{url('/')}}" class="app-brand-link gap-2">
                    <img src="{{asset('admin_assets/img/images/logo.png')}}" width="200">
                </a>
              </div>
              <!-- /Logo -->
              <br>
              <h5 class="mb-2 text-center">SAVE NATURE FOUNDATION <br>ADMIN PANEL</h5>

              <form id="formAuthentication" class="mb-3" action="{{route('admin.auth')}}" method="POST" autocomplete="off">
                @csrf
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input
                    type="email"
                    class="form-control"
                    id="email"
                    name="email"
                    value="{{ isset($_COOKIE['login_email']) ? $_COOKIE['login_email'] : '' }}"
                    placeholder="Enter your email"
                    autofocus
                    required
                  />
                </div>
                <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Password</label>
                    <a href="{{url('forgot-password')}}">
                      <small>Forgot Password?</small>
                    </a>
                  </div>
                  <div class="input-group input-group-merge">
                    <input
                      type="password"
                      id="password"
                      class="form-control"
                      name="password"
                      value="{{ isset($_COOKIE['login_pwd']) ? $_COOKIE['login_pwd'] : '' }}"
                      placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                      aria-describedby="password"
                      required
                    />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="rememberme" name="rememberme" {{ isset($_COOKIE['login_email']) && isset($_COOKIE['login_pwd']) ? '' : 'checked' }}/>
                    <label class="form-check-label" for="rememberme"> Remember Me </label>
                  </div>
                </div>
                <div class="mb-3">
                  <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                </div>
              </form>

            </div>
          </div>
          <!-- /Register -->
        </div>
      </div>
    </div>

    @if($message = session('success'))

      <script>
          Swal.fire({
            icon: 'success',
            title: 'Success',
            text: "{{ $message }}",
            timer : 3000
          });
      </script>

    @endif

    @if($message = session('error'))

      <script>
          Swal.fire({
            icon: 'warning',
            title: 'Warning',
            text: "{{ $message }}",
            timer : 3000
          });
      </script>

    @endif

    <script>
        //Snackbar.show({text: 'Product added to the cart successfully.', pos: 'bottom-right', backgroundColor: '#8be000', duration: 2500, textColor: '#000', showAction: false, customClass: 'snackNotCusSty'});
    </script>



    <!-- / Content -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{asset('admin_assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{asset('admin_assets/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{asset('admin_assets/js/main.js')}}"></script>

    <!-- Page JS -->

    <script src="{{asset('admin_assets/snackbar/snackbar.min.js')}}"></script>

    <script src="{{asset('admin_assets/snackbar/init.js')}}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

  </body>
</html>