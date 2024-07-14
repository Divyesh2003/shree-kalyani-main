@section('title', 'Supllier')
@section('meta_description', "Supllier")
@section('meta_keywords', "Supllier")
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
                          <h5 class="card-header">Supllier Edit</h5> 
                        </div>
                        <div class="col-sm-6"></div>
                      </div>
                        <div class="card-body"> 
                              <div class="row mt-3">
                                <div class="col-12">
                                    <form class="row g-3 needs-validation" id="supllier" method="POST" action="{{ route('admin.supllier.update',$supplier->id) }}" novalidate>
                                        @csrf()
                                        @method('PUT')
                                        <div class="mt-2 mb-3">
                                          <label for="firstname" class="form-label">First Name</label>
                                          <input id="largeInput" name="firstname" class="form-control form-control-lg" value="{{ $supplier->firstname }}"
                                              type="text" placeholder="Enter First Name" required>
                                          <div class="invalid-feedback">
                                              Please Enter First Name.
                                          </div>
                                      </div>
                                      <div class="mt-2 mb-3">
                                          <label for="lastname" class="form-label">Last Name</label>
                                          <input id="largeInput" name="lastname" class="form-control form-control-lg" value="{{ $supplier->lastname }}"
                                              type="text" placeholder="Enter Last Name" required>
                                          <div class="invalid-feedback">
                                              Please Enter Last Name.
                                          </div>
                                      </div>
                                      <div class="mt-2 mb-3">
                                          <label for="mobile" class="form-label">Phone Number</label>
                                          <input type="tel" name="mobile" class="form-control" placeholder="8888888888" value="{{ $supplier->mobile }}"
                                              pattern="[0-9]{3}[0-9]{3}[0-9]{4}" maxlength="10" title="Ten digits code"
                                              required />
                                          <div class="invalid-feedback">
                                              Please Enter Phone Number.
                                          </div>
                                      </div>
                                      <div class="mt-2 mb-3">
                                          <label for="email" class="form-label">Email</label>
                                          <input id="largeInput" name="email" class="form-control form-control-lg" value="{{ $supplier->email }}"
                                              type="email" placeholder="Enter Email">
                                          <div class="invalid-feedback">
                                              Please Enter Email.
                                          </div>
                                      </div>
                                      <div class="mt-2 mb-3">
                                        <label for="bank_details" class="form-label">Bank Details</label>
                                        <input id="largeInput" name="bank_details" class="form-control form-control-lg" value="{{ $supplier->bank_details }}"
                                            type="text" placeholder="Enter Bank Details" >
                                        <div class="invalid-feedback">
                                            Please Enter Bank Details.
                                        </div>
                                    </div>
                                      <div class="mt-2 mb-3">
                                          <label for="gst" class="form-label">Gst Number</label>
                                          <input id="largeInput" name="gst" class="form-control form-control-lg" value="{{ $supplier->gst }}"
                                              type="text" placeholder="Enter Gst Number" >
                                          <div class="invalid-feedback">
                                              Please Enter Gst Number.
                                          </div>
                                      </div>
                                      <div class="mt-2 mb-3">
                                        <label for="company" class="form-label">Company</label>
                                        <input id="company" name="company" class="form-control form-control-lg" value="{{ $supplier->company }}"
                                            type="text" placeholder="Enter Company">
                                        <div class="invalid-feedback">
                                            Please Enter Company.
                                        </div>
                                    </div>
                                      <div class="mt-2 mb-3">
                                          <label for="pan" class="form-label">Pan Number</label>
                                          <input id="largeInput" name="pan" class="form-control form-control-lg" value="{{ $supplier->pan }}"
                                              type="text" placeholder="Enter Pan Number" >
                                          <div class="invalid-feedback">
                                              Please Enter Pan Number.
                                          </div>
                                      </div>
                                      <div class="mt-2 mb-3">
                                          <label for="aadhar" class="form-label">Aadhar</label>
                                          <input id="largeInput" name="aadhar" class="form-control form-control-lg" value="{{ $supplier->aadhar }}"
                                              type="text" placeholder="Enter Aadhar" >
                                          <div class="invalid-feedback">
                                              Please Enter Aadhar.
                                          </div>
                                      </div>
                                      <div class="mt-2 mb-3">
                                          <label for="state" class="form-label">State</label>
                                          <input id="largeInput" name="state" class="form-control form-control-lg" value="{{ $supplier->state }}"
                                              type="text" placeholder="Enter State" required>
                                          <div class="invalid-feedback">
                                              Please Enter Aadhar.
                                          </div>
                                      </div>
                                      <div class="mt-2 mb-3">
                                          <label for="city" class="form-label">City</label>
                                          <input id="largeInput" name="city" class="form-control form-control-lg" value="{{ $supplier->city }}"
                                              type="text" placeholder="Enter City" required>
                                          <div class="invalid-feedback">
                                              Please Enter City.
                                          </div>
                                      </div>
                                      <div class="mt-2 mb-3">
                                          <label for="address" class="form-label">Address</label>
                                          <input id="address" name="address" class="form-control form-control-lg" value="{{ $supplier->addaress }}"
                                              type="text" placeholder="Enter Address" required>
                                          <div class="invalid-feedback">
                                              Please Enter Address.
                                          </div>
                                      </div>
                                      <div class="mt-2 mb-3">
                                          <label for="pincode" class="form-label">Pincode</label>
                                          <input id="pincode" name="pincode" class="form-control form-control-lg" value="{{ $supplier->pincode }}"
                                              type="text" placeholder="Enter Pincode">
                                          <div class="invalid-feedback">
                                              Please Enter Pincode.
                                          </div>
                                      </div>
                                        <div class="col-12">
                                          <button class="btn btn-primary" type="submit">Submit Supllier</button>
                                          <button class="btn btn-primary" type="reset">Form Reset</button>
                                          <a href="{{ route('admin.supllier.index')}}" class="btn btn-primary" type="submit">Back</a>
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