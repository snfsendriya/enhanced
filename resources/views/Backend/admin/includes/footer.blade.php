
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

    <script src="{{asset('admin_assets/ckeditor/ckeditor.js')}}"></script>

    <script src="{{asset('admin_assets/ckfinder/ckfinder.js')}}"></script>

    <script>

      let product_attr_id = 0;

      @if(isset($product_attr_id))

            product_attr_id = {{ $product_attr_id }}

      @endif

      function add_product_attr()
      {

        $("#product_attr_body").append(`<div class="input-group mb-3" id="product_attr_${product_attr_id}">
                                <input type="number" min="1" class="form-control" name="weight[]" placeholder="Enter Weight" required>
                                <select class="form-control" name="unit[]" required>
                                    <option value="">Select Unit</option>
                                    <option value="kg">kg</option>
                                    <option value="gm">gm</option>
                                </select>
                                <input type="number" min="1" class="form-control" name="price[]" placeholder="Enter Price" required>
                                <input type="number" min="0" class="form-control" name="stock[]" placeholder="Enter Stock" required>
                                <a href="javascript:void(0);" class="btn btn-danger" onClick="remove_product_attr(0,${product_attr_id})">X</a>
                                <input type="hidden" name="product_image_id[]" value="0">
                            </div>
        `);

        product_attr_id++;

      }

      function remove_product_attr(product_attr_id,id)
      {
          let con = confirm('Are you sure to delete this attribute ?');

          if(!con)
          {
            return false;
          }
          
          if(product_attr_id !== 0)
          { 
            
              $.ajax({
                  url : "{{url('admin/delete-product-attr')}}",
                  type : 'post',
                  data : { 
                    "_token": "{{ csrf_token() }}",
                    id : product_attr_id 
                  },
                  success : function(data){

                      Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.message,
                        timer : 3000
                      });

                      $(`#product_attr_${id}`).remove();
                 
                  },
                  error : function(data){

                      Swal.fire({
                        icon: 'warning',
                        title: 'Warning',
                        text: data.message,
                        timer : 3000
                      });

                  }
              });
            
          }

          $(`#product_attr_${id}`).remove();
          
      }

      function remove_product_image(id)
      {
          let con = confirm('Are you sure to delete this image ?');
          if(con === true)
          {
              $.ajax({
                  url : "{{url('admin/delete-product-image')}}",
                  type : 'post',
                  data : { 
                    "_token": "{{ csrf_token() }}",
                    id : id 
                  },
                  success : function(data){

                      Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.message,
                        timer : 3000
                      });

                      $(`#product_image_${id}`).remove();
                 
                  },
                  error : function(data){

                      Swal.fire({
                        icon: 'warning',
                        title: 'Warning',
                        text: data.message,
                        timer : 3000
                      });

                  }
              });
          }
      }
      
      let video_link_id = 0;

            @if(isset($video_link_id))
    
                video_link_id = {{ $video_link_id }}
    
            @endif
      
      function add_video_link()
      {
            
            $("#video_link_body").append(`<div class="input-group mb-3" id="video_${video_link_id}">
                                        <input type="text" class="form-control" name="video_link[]" placeholder="Enter Video Link" required>
                                        <a href="javascript:void(0);" class="btn btn-danger" onClick="remove_video_link(0,${video_link_id})">X</a>
                                        <input type="hidden" name="video_id[]" value="0">
                                    </div>`);
                                    
            video_link_id++;
                                    
      }
      
     function remove_video_link(video_link_id,id)
     {
          let con = confirm('Are you sure to delete this video link ?');

          if(!con)
          {
            return false;
          }
          
          $(`#video_${id}`).remove();
          
      }
      
    $('#upload_file').change(function () {
        
        var ext = $('.upload-file').val().split('.').pop().toLowerCase();
            if($.inArray(ext, ['png','jpg','jpeg','pdf']) == -1) {
                alert('Image must be jpg, jpeg, png or pdf file!');
                $('.upload-file').val('');
        }
        
    });
    
    function copyToClipboard(copyText)
    {
      navigator.clipboard.writeText(copyText).then(function() {
      alert('Copying to clipboard was successful!');
      }, function(err) {
       alert('Could not copy text: ', err);
      });
    }
    </script>

  </body>
</html>
