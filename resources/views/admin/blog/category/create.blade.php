@section('title', 'Blog Catgeory')
@section('meta_description', "Blog Catgeory")
@section('meta_keywords', "Blog Catgeory")
@extends('admin.layouts.app')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y" style="position: relative;">
            <div class="row">
              @if(session('success'))
        <div class="bs-toast toast fade show bg-success" role="alert" aria-live="assertive" aria-atomic="true">
          <div class="toast-header">
            <i class="bx bx-bell me-2"></i>
            <div class="me-auto fw-medium">Sucessfully!</div>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body">
            Your Category Create
          </div>
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
                <div class="col-lg-12 mb-4 order-0">
                    <div class="card mb-4">
                        <div class="row">
                            <div class="col-sm-6">
                              <h5 class="card-header">Blog Category Create</h5> 
                            </div>
                            {{-- <div class="col-sm-6">
                              <a href="{{ route('admin.category.create')}}" class="btn btn-primary float-end mt-3 me-3">Create</a>
                            </div> --}}
                            <div class="card-body m-3"> 
                                <form class="row g-3 needs-validation" id="category" method="POST" action="{{ route('admin.blog.category.store') }}"   enctype="multipart/form-data" novalidate>
                                    @csrf()
                                    @method('POST')
                                    <div class="mt-2 mb-3">
                                        <label for="item_type" class="form-label">Category</label>
                                        <select id="item_type" name="item_type" class="form-select form-select-lg">
                                          <option value="">Select Category</option>
                                          @foreach ($categories as $category)
                                              <option value="{{ $category->id}}">{{ $category->name }}</option>
                                          @endforeach
                                        </select>

                                      </div>
                                      <div class="mt-2 mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input id="name" name="name" class="form-control form-control-lg" type="text" placeholder="Enter Product Name" required>
                                        <div class="invalid-feedback">
                                            Please Enter Product Name.
                                          </div> 
                                    </div>
                                      <div class="mt-2 mb-3">
                                        <label for="slug" class="form-label">Slug</label>
                                        <input id="slug" name="slug" class="form-control form-control-lg" type="text" placeholder="Enter Product Slug" required>
                                        <div class="invalid-feedback">
                                            Please Enter Product Slug.
                                          </div>   
                                    </div>
                                      <div class="mt-2 mb-3">
                                        <label for="description" class="form-label">Description</label>
                                        {{-- <input id="description" name="description" class="form-control form-control-lg" type="text" placeholder="Enter Category Description"> --}}
                                        <textarea name="description" id="description" class="form-control form-control-lg" cols="30" rows="5"></textarea>
                                        <div class="invalid-feedback">
                                            Please Enter Category Description.
                                          </div>  
                                    </div>
                                    {{-- //////////////////////////////////////////////////////////// --}}
                                    <div class="mt-2 mb-3">
                                        <label for="meta_title" class="form-label">Meta Title</label>
                                        <input id="meta_title" name="meta_title" class="form-control form-control-lg" type="text" placeholder="Enter Product Description">
                                        <div class="invalid-feedback">
                                            Please Enter Catrgory Meta Title.
                                          </div>   
                                    </div>
                                    <div class="mt-2 mb-3">
                                        <label for="meta_description" class="form-label">Meta Description</label>
                                        <input id="meta_description" name="meta_description" class="form-control form-control-lg" type="text" placeholder="Enter Category Description">
                                        <div class="invalid-feedback">
                                            Please Enter Category Meta Description.
                                          </div>   
                                    </div>
                                      <div class="mt-2 mb-3">
                                        <label for="meta_keyword" class="form-label">Meta Keywords</label>
                                        <input id="meta_keyword" name="meta_keyword" class="form-control form-control-lg" type="text" placeholder="Enter Category Description">
                                        <div class="invalid-feedback">
                                            Please Enter Category Meta Keywords.
                                          </div>   
                                    </div>
                                    <div class="form-check form-switch mb-2 ms-1">
                                        <input class="form-check-input" type="checkbox" name="status" value="A" id="flexSwitchCheckChecked" checked="">
                                        <label class="form-check-label" for="flexSwitchCheckChecked"> Status (Active/Deactive)</label>
                                      </div>
                                    <div class="col-12">
                                      <button class="btn btn-primary" type="submit">Submit Blog</button>
                                      <button class="btn btn-primary" type="reset">Form Reset</button>
                                      <a href="{{ route('admin.blog.category.index')}}" class="btn btn-primary" type="submit">Back</a>
                                    </div>
                                  </form>
                              </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
         <!-- Toast -->
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
@endsection
@push('scripts')
<script>
  $(document).ready(function() {
    $('#category').submit(function (e) {
    e.preventDefault();

    var form = $(this);
    
    Swal.fire({
        title: "Are you sure?",
        text: "You will not be able to recover this imaginary file!",
        icon: "primary",
        showCancelButton: true,
        confirmButtonColor: "#696cff",
        confirmButtonText: "Yes,confirm it!", 
        closeOnConfirm: false
    }).then(function (result) {
        if (result.isConfirmed) {
            form.off('submit').submit();
        }
    });

    return false;
});
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