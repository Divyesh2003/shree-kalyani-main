@section('title', 'Inquiry')
@section('meta_description', "Inquiry")
@section('meta_keywords', "Inquiry")
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
                              <h5 class="card-header">Inquiry Create</h5> 
                            </div>
                            {{-- <div class="col-sm-6">
                              <a href="{{ route('admin.category.create')}}" class="btn btn-primary float-end mt-3 me-3">Create</a>
                            </div> --}}
                            <div class="card-body m-3"> 
                                <form class="row g-3 needs-validation" id="inquiry" method="POST" action="{{ route('admin.inquiry.store') }}" novalidate>
                                    @csrf()
                                    @method('POST')
                                    
                                    <div class="mt-2 mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input id="largeInput" name="name" class="form-control form-control-lg" type="text" placeholder="Enter Inquiry Name" required>
                                        <div class="invalid-feedback">
                                            Please Enter Inquiry Name.
                                          </div> 
                                    </div>
                                    <div class="mt-2 mb-3">
                                        <label for="name" class="form-label">Email</label>
                                        <input id="largeInput" name="email" class="form-control form-control-lg" type="email" placeholder="Enter Inquiry Email" required>
                                        <div class="invalid-feedback">
                                            Please Enter Inquiry Email.
                                          </div> 
                                    </div>
                                    <div class="mt-2 mb-3">
                                        <label for="name" class="form-label">Subject</label>
                                        <input id="largeInput" name="subject" class="form-control form-control-lg" type="text" placeholder="Enter Inquiry Subject" required>
                                        <div class="invalid-feedback">
                                            Please Enter Inquiry Subject.
                                          </div> 
                                    </div>
                                    <div class="mt-2 mb-3">
                                        <label for="name" class="form-label">Message</label>
                                        <input id="largeInput" name="message" class="form-control form-control-lg" type="text" placeholder="Enter Inquiry Message" required>
                                        <div class="invalid-feedback">
                                            Please Enter Inquiry Message.
                                          </div> 
                                    </div>
                                    <div class="form-check form-switch mb-2 ms-1">
                                        <input class="form-check-input" type="checkbox" name="status" value="A" id="flexSwitchCheckChecked" checked="">
                                        <label class="form-check-label" for="flexSwitchCheckChecked"> Status (Active/Deactive)</label>
                                      </div>
                                    <div class="col-12">
                                      <button class="btn btn-primary" type="submit">Submit Inquiry</button>
                                      <button class="btn btn-primary" type="reset">Form Reset</button>
                                      <a href="{{ route('admin.inquiry.index')}}" class="btn btn-primary" type="submit">Back</a>
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