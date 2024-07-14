@section('title', 'Blog')
@section('meta_description', "Blog")
@section('meta_keywords', "Blog")
@extends('admin.layouts.app')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->
        <style>
                .toast {
                position: absolute;
                top: -62px;
                right: 185px;
                border-radius: 12px;
                background: #fff;
                padding: 20px 35px 20px 25px;
                box-shadow: 0 6px 20px -5px rgba(0, 0, 0, 0.1);
                overflow: hidden;
                transform: translateX(calc(100% + 30px));
                transition: all 0.5s cubic-bezier(0.68, -0.55, 0.265, 1.35);
                }
        </style>
        {{-- @dd($category) --}}
        <div class="container-xxl flex-grow-1 container-p-y" style="position: relative;">
            <div class="row">
                <div class="col-lg-8 mb-4 order-0">
                    <div class="card mb-4">
                      <div class="row">
                        <div class="col-sm-6">
                          <h5 class="card-header">Blog Category Edit</h5> 
                        </div>
                        <div class="col-sm-6"></div>
                      </div>
                        <div class="card-body"> 
                              <div class="row mt-3">
                                <div class="col-12">
                                    <form class="row g-3 needs-validation" id="blog" method="POST" action="{{ route('admin.blog.update',$blog->id) }}"   enctype="multipart/form-data" novalidate>
                                        @csrf()
                                        @method('PUT')
                                        <div class="mt-2 mb-3">
                                            <label for="item_type" class="form-label">Item Type</label>
                                            <select id="item_type" name="item_type" class="form-select form-select-lg">
                                              <option value="">Select Item Type</option>
                                              @foreach ($blogCategory as $category)
                                                  <option value="{{ $category->id}}" @if($category->id == $blog->item_type) selected @endif>{{ $blog->name }}</option>
                                              @endforeach
                                            </select>
                                          </div>
                                          <div class="mt-2 mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input id="name" name="name" class="form-control form-control-lg" value="{{ $blog->name}}" type="text" placeholder="Enter Blog Name" required>
                                            <div class="invalid-feedback">
                                                Please Enter Blog Catrgory Name.
                                              </div> 
                                        </div>
                                          <div class="mt-2 mb-3">
                                            <label for="slug" class="form-label">Slug</label>
                                            <input id="slug" name="slug" class="form-control form-control-lg" value="{{ $blog->slug }}" type="text" placeholder="Enter Blog Slug" required>
                                            <div class="invalid-feedback">
                                                Please Enter Blog Catrgory Slug.
                                              </div>   
                                        </div>
                                          <div class="mt-2 mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            {{-- <input id="description" name="description" class="form-control form-control-lg" type="text" placeholder="Enter Category Description"> --}}
                                            <textarea name="description" id="description"  class="form-control form-control-lg" cols="30" rows="5">{{ $blog->description }}</textarea>
                                            <div class="invalid-feedback">
                                                Please Enter Category Description.
                                              </div>  
                                        </div>
                                        <div class="mt-2 mb-3">
                                          <label for="image" class="form-label">Image</label>
                                          <input id="image" name="image" class="form-control form-control-lg" type="file" >
                                          <div class="invalid-feedback">
                                              Please Enter Category Price.
                                            </div>    
                                      </div>
                                        {{-- //////////////////////////////////////////////////////////// --}}
                                        <div class="mt-2 mb-3">
                                            <label for="meta_title" class="form-label">Meta Title</label>
                                            <input id="meta_title" name="meta_title" value="{{ $blog->meta_title }}" class="form-control form-control-lg" type="text" placeholder="Enter Product Description">
                                            <div class="invalid-feedback">
                                                Please Enter Blog Meta Title.
                                              </div>   
                                        </div>
                                        <div class="mt-2 mb-3">
                                            <label for="meta_description" class="form-label">Meta Description</label>
                                            <input id="meta_description" name="meta_description" value="{{ $blog->meta_description }}" class="form-control form-control-lg" type="text" placeholder="Enter Product Description">
                                            <div class="invalid-feedback">
                                                Please Enter Blog Meta Description.
                                              </div>   
                                        </div>
                                          <div class="mt-2 mb-3">
                                            <label for="meta_keyword" class="form-label">Meta Keywords</label>
                                            <input id="meta_keyword" name="meta_keyword" value="{{ $blog->meta_keyword }}" class="form-control form-control-lg" type="text" placeholder="Enter Blog Description">
                                            <div class="invalid-feedback">
                                                Please Enter Blog Meta Keywords.
                                              </div>   
                                        </div>
                                        <div class="form-check form-switch mb-2 ms-1">
                                            <input class="form-check-input" type="checkbox" name="status" value="A" id="flexSwitchCheckChecked" @if($blog->status == "A") checked @endif>
                                            <label class="form-check-label" for="flexSwitchCheckChecked"> Status (Active/Deactive)</label>
                                          </div>
                                        <div class="col-12">
                                          <button class="btn btn-primary" type="submit">Submit Blog</button>
                                          <button class="btn btn-primary" type="reset">Form Reset</button>
                                          <a href="{{ route('admin.blog.index')}}" class="btn btn-primary" type="submit">Back</a>
                                        </div>
                                      </form> 
                                  </div>
                              </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                  
                  <div class="mt-3"> 
                    <h5>Image</h5>

                    <img src="{{ asset($blog->image)}}" alt="" width="200px" height="200px">
                  </div>
                 
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script>
  $(function() {
      $('#category').submit(function (e) {
          e.preventDefault();
  
          // Validate the form
          var form = this;
          if (!form.checkValidity()) {
              e.stopPropagation();
              form.classList.add('was-validated');
              return;
          }
  
          // Show SweetAlert confirmation
          Swal.fire({
              title: "Are you sure?",
              text: "You will not be able to recover this imaginary file!",
              icon: "warning", // Changed from "primary" to "warning" for better semantics
              showCancelButton: true,
              confirmButtonColor: "#696cff",
              confirmButtonText: "Yes, confirm it!",
              cancelButtonText: "Cancel"
          }).then(function (result) {
              if (result.isConfirmed) {
                  form.submit();
              }
          });
      });
  
      // Custom Bootstrap validation styles
      (function () {
          'use strict'
          var forms = document.querySelectorAll('.needs-validation');
          Array.prototype.slice.call(forms).forEach(function (form) {
              form.addEventListener('submit', function (event) {
                  if (!form.checkValidity()) {
                      event.preventDefault();
                      event.stopPropagation();
                  }
                  form.classList.add('was-validated');
              }, false);
          });
      })();
  });
  </script>
    <script>
      $(document).ready(function() {
          $('#name').on('keyup', function() {
              var name = $(this).val();
              var slug = name.toLowerCase()
                             .replace(/[^a-z0-9\s-]/g, '')
                             .trim()
                             .replace(/\s+/g, '-')
                             .replace(/-+/g, '-');
              $('#slug').val(slug);
          });
      });
  </script>
@endpush