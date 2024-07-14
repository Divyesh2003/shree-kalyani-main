@section('title', 'State Edit')
@section('meta_description', "State Edit")
@section('meta_keywords', "State Edit")
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
                <div class="col-lg-12 mb-4 order-0">
                    <div class="card mb-4">
                      <div class="row">
                        <div class="col-sm-6">
                          <h5 class="card-header">State Edit</h5> 
                        </div>
                        <div class="col-sm-6"></div>
                      </div>
                        <div class="card-body"> 
                              <div class="row mt-3">
                                <div class="col-12">
                                    <form class="row g-3 needs-validation" id="expense" method="POST" action="{{ route('admin.state.update',$state->id) }}" novalidate>
                                        @csrf()
                                        @method('PUT')
                                        <div class="mt-2 mb-3">
                                            <label for="country" class="form-label">Country</label>
                                            <select id="country" name="country_id" class="form-select form-select-lg">
                                              <option value="">Select Country</option>
                                              @foreach ($countries as $country)
                                                  <option value="{{ $country->id}}" @if($country->id == $state->country_id) selected @endif>{{ $country->name }}</option>
                                              @endforeach
                                            </select>
                                          </div>
                                        <div class="mt-2 mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input id="name" name="name" class="form-control form-control-lg" type="text" placeholder="Enter State Title" value="{{ $state->name }}" required>
                                            <div class="invalid-feedback">
                                                Please Enter State Name.
                                              </div> 
                                        </div>
                                          <div class="mt-2 mb-3">
                                            <label for="code" class="form-label">Code</label>
                                            <input id="code" name="code" class="form-control form-control-lg" type="text" placeholder="Enter State Code" value="{{ $state->code }}" required>
                                            <div class="invalid-feedback">
                                                Please Enter State Code.
                                              </div>   
                                        </div>
                                        <div class="form-check form-switch mb-2 ms-1">
                                            <input class="form-check-input" type="checkbox" name="status" value="A" id="status" @if($state->status == 'A') checked @endif>
                                            <label class="form-check-label" for="status"> Status (Active/Deactive)</label>
                                          </div>
                                        <div class="col-12">
                                          <button class="btn btn-primary" type="submit">Submit State</button>
                                          <button class="btn btn-primary" type="reset">Form Reset</button>
                                          <a href="{{ route('admin.state.index')}}" class="btn btn-primary" type="submit">Back</a>
                                        </div>
                                      </form>   
                                  </div>
                              </div>
                        </div>
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
@endpush