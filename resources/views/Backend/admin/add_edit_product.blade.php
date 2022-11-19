@extends('Backend/admin/includes/layout')

@section('title')
    @if($id > 0)
        <title>Edit Product</title>
    @else
        <title>Add Product</title>
    @endif
@stop

@section('main-content')

<!-- Content wrapper -->
<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-12">
                        <div class="card-body">
                        <div class="breadcrumb-body">
                            <h5 class="card-title text-primary">
                                @if($id > 0)
                                    Edit Product
                                @else
                                    Add Product
                                @endif
                            </h5>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{url('admin/all-product')}}">All Product</a></li>
                                    <li class="breadcrumb-item active">
                                        @if($id > 0)
                                            Edit Product
                                        @else
                                            Add Product
                                        @endif
                                    </li>
                                </ol>
                            </nav>
                        </div>

                        <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h6 class="mb-0 text-danger">* Marks are mandatory</h6>
                    </div>
                    <div class="card-body">
                      <form action="{{route('admin.product_add_edit')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="title"><span class="text-danger">*</span>Title</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Product Title" 
                            value="{{ $title ? $title : old('title') }}"  required/>
                          </div>
                        </div>
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="sub_title"><span class="text-danger">*</span>Sub Title</label>
                          <div class="col-sm-10">
                            <input
                              type="text"
                              class="form-control"
                              name="sub_title"
                              id="sub_title"
                              placeholder="Enter Product Sub Title"
                              value="{{ $sub_title ? $sub_title : old('sub_title') }}" 
                              required
                            />
                          </div>
                        </div>
                        @error('sub_title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="slug"><span class="text-danger">*</span>Slug</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <input
                                type="text"
                                name="slug"
                                id="slug"
                                class="form-control"
                                placeholder="Enter Product Slug"
                                aria-label="Enter Product Slug"
                                value="{{ $slug ? $slug : old('slug') }}" 
                                required
                              />
                            </div>
                          </div>
                        </div>
                        @error('slug')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="sub_title"><?php if($id == 0) { ?><span class="text-danger">*</span><?php } ?>Featured Image</label>
                          <div class="col-sm-10">
                            <input class="form-control" type="file" name="featured_image" id="featured_image" <?php if($id == 0) { ?> required <?php } ?>>
                          </div>
                        </div>
                        @error('featured_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @if($featured_image != '')
                          <div class="row mb-3">
                              <div class="col-sm-2"></div>
                              <div class="col-sm-10">
                                
                                    <img src="{{ url('storage/uploads/Product/'.$featured_image) }}" width="200" height="200" class="rounded">
                              
                              </div>
                          </div>
                        @endif
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="short_desc"><span class="text-danger">*</span>Short Description</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <textarea class="form-control" name="short_desc" id="short_desc" required>
                                    {{ $short_desc ? $short_desc : old('short_desc') }}
                                </textarea>
                            </div>
                          </div>
                        </div>
                        @error('short_desc')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="short_desc"><span class="text-danger">*</span>Long Description</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <textarea class="form-control" name="long_desc" id="long_desc" required>
                                    {{ $long_desc ? $long_desc : old('long_desc') }}
                                </textarea>
                            </div>
                          </div>
                        </div>
                        @error('long_desc')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @php
                            $product_attr_id = 1
                        @endphp
                        <div class="row mb-3">
                            <a href="javascript:void(0);" class="btn btn-success w-15" onclick="add_product_attr()"><i class='bx bxs-plus-circle'></i>&nbsp;Add</a>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="short_desc"><span class="text-danger">*</span>Product Attributes</label>
                          <div class="col-sm-10" id="product_attr_body">
                            @if($id == 0)
                                <div class="input-group mb-3" id="product_attr_{{ $product_attr_id++ }}">
                                    <input type="number" min="1" class="form-control" name="weight[]" placeholder="Enter Weight" required>
                                    <select class="form-control" name="unit[]" required>
                                        <option value="">Select Unit</option>
                                        <option value="kg">kg</option>
                                        <option value="gm">gm</option>
                                    </select>
                                    <input type="number" min="1" class="form-control" name="price[]" placeholder="Enter Price" required>
                                    <input type="number" min="0" class="form-control" name="stock[]" placeholder="Enter Stock" required>
                                    <input type="hidden" name="product_image_id[]" value="0">
                                </div>
                            @else
                                @foreach($all_product->product_attr as $key=>$row)
                                  <div class="input-group mb-3" id="product_attr_{{ $product_attr_id }}">
                                      <input type="number" min="1" class="form-control" name="weight[]" placeholder="Enter Weight" value="{{ $row->weight }}" required>
                                      <select class="form-control" name="unit[]" required>
                                          <option value="">Select Unit</option>
                                          <option value="kg" <?php if($row->unit == "kg"){ echo "selected"; } ?>>kg</option>
                                          <option value="gm" <?php if($row->unit == "gm"){ echo "selected"; } ?>>gm</option>
                                      </select>
                                      <input type="number" min="1" class="form-control" name="price[]" value="{{ $row->price }}" placeholder="Enter Price" required>
                                      <input type="number" min="0" class="form-control" name="stock[]" value="{{ $row->stock }}" placeholder="Enter Stock" required>
                                      @if($key > 0)
                                          <a href="javascript:void(0);" class="btn btn-danger" onClick="remove_product_attr({{ $row->id }},{{ $product_attr_id++ }})">X</a>
                                      @else
                                          @php
                                            $product_attr_id++
                                          @endphp
                                      @endif
                                      <input type="hidden" name="product_image_id[]" value="{{ $row->id }}">
                                  </div>
                                @endforeach
                            @endif
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="short_desc"><span class="text-danger">*</span>Product Availability</label>
                          <div class="col-sm-10">
                                <input type="checkbox" name="is_available" id="is_available" <?php if($is_available){ echo 'checked'; }?>>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="organic_percentage"><span class="text-danger">*</span>Organic Percentage</label>
                          <div class="col-sm-10">
                                <select name="organic_percentage" class="form-control">
                                  <option value="0%" <?php if($organic_percentage == '0%'){ echo 'selected'; } ?>>0%</option>
                                  <option value="25%" <?php if($organic_percentage == '25%'){ echo 'selected'; } ?>>25%</option>
                                  <option value="50%" <?php if($organic_percentage == '50%'){ echo 'selected'; } ?>>50%</option>
                                  <option value="75%" <?php if($organic_percentage == '75%'){ echo 'selected'; } ?>>75%</option>
                                  <option value="100%" <?php if($organic_percentage == '100%'){ echo 'selected'; } ?>>100%</option>
                                </select>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="sub_title">Product Images</label>
                          <div class="col-sm-10">
                            <input class="form-control" type="file" name="product_images[]" multiple>
                          </div>
                        </div>
                        @if(isset($all_product->product_images[0]))
                          <div class="row mb-3">
                          @foreach($all_product->product_images as $key=>$row)
                            <div class="col-md-3 mb-3" id="product_image_{{ $row->id }}">
                                <img src="{{ url('storage/uploads/Product/'.$row->image) }}" width="150" height="150" class="rounded">
                                <a href="javascript:void(0);" class="btn btn-danger mt-2" onclick="remove_product_image({{ $row->id }})">X</a>
                            </div>
                          @endforeach
                          </div>
                        @endif
                        <input type="hidden" name="product_id" value="{{ $id }}">
                        <div class="row">
                          <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <div class="content-backdrop fade"></div>
          </div>

                        </div>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <script>
                $(document).ready( function () {
                
                    CKEDITOR.replace('short_desc');
                    CKEDITOR.replace('long_desc');

                } );

                </script>

@stop