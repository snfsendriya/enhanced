
            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-center py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                Copyright ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script> 
                  <a href="{{url('/')}}" target="_blank">Save Nature Foundation</a> All Rights Reserved.
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

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
      $(document).ready( function () {
          $('#myTable').DataTable();
      } );

    </script>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{asset('admin_assets/vendor/libs/jquery/jquery.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/libs/popper/popper.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/js/bootstrap.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js')}}"></script>

    <script src="{{asset('admin_assets/vendor/js/menu.js')}}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{asset('admin_assets/vendor/libs/apex-charts/apexcharts.js')}}"></script>

    <!-- Main JS -->
    <script src="{{asset('admin_assets/js/main.js')}}"></script>

    <!-- Page JS -->
    <script src="{{asset('admin_assets/js/dashboards-analytics.js')}}"></script>

    <script src="{{asset('admin_assets/snackbar/snackbar.min.js')}}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  </body>
</html>
