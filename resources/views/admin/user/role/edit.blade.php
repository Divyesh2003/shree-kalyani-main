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
                          <h5 class="card-header">User Role Edit</h5> 
                        </div>
                        <div class="col-sm-6"></div>
                      </div>
                        <div class="card-body"> 
                              <div class="row mt-3">
                                <div class="col-12">
                                    <form class="row g-3 needs-validation" id="userRole" method="POST" action="{{ route('admin.user.role.update',$userRole->id) }}"   enctype="multipart/form-data" novalidate>
                                        @csrf()
                                        @method('PUT')
                                          <div class="mt-2 mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input id="largeInput" name="name" class="form-control form-control-lg" value="{{ $userRole->name}}" type="text" placeholder="Enter Product Name" required>
                                            <div class="invalid-feedback">
                                                Please Enter Product Name.
                                              </div> 
                                        </div>
                                        {{-- @dd($userRole->permissions) --}}
                                        <div class="mt-2 mb-3">
                                          <label for="largeSelect" class="form-label">Permission</label>
                                              {{-- @dd($userRole->permissions) --}}
                                          <table class="table">
                                            <thead>
                                              <tr>
                                                <th scope="col">permission name</th>
                                                <th scope="col">Index</th>
                                                <th scope="col">create</th>
                                                <th scope="col">Edit</th>
                                                <th scope="col">Delete</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <th scope="row">Category</th>
                                                <td><input class="form-check-input" type="checkbox" value="5" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '5') checked @endif  @endforeach id="inquiry"></td>
                                                <td><input class="form-check-input" type="checkbox" value="6" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '6') checked @endif  @endforeach id=""></td>
                                                <td><input class="form-check-input" type="checkbox" value="7" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '7') checked @endif  @endforeach id=""></td>
                                                <td><input class="form-check-input" type="checkbox" value="8" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '8') checked @endif  @endforeach id=""></td>
                                              </tr>
                                              <tr>
                                                <th scope="row">Product</th>
                                                <td><input class="form-check-input" type="checkbox" value="9"  name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '9') checked @endif  @endforeach id="inquiry"></td>
                                                <td><input class="form-check-input" type="checkbox" value="10" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '10') checked @endif  @endforeach id=""></td>
                                                <td><input class="form-check-input" type="checkbox" value="11" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '11') checked @endif  @endforeach id=""></td>
                                                <td><input class="form-check-input" type="checkbox" value="12" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '12') checked @endif  @endforeach id=""></td>
                                              </tr>
                                              <tr>
                                                <th scope="row">Blog Category</th>
                                                <td><input class="form-check-input" type="checkbox" value="13" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '13') checked @endif  @endforeach id="inquiry"></td>
                                                <td><input class="form-check-input" type="checkbox" value="14" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '14') checked @endif  @endforeach id=""></td>
                                                <td><input class="form-check-input" type="checkbox" value="15" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '15') checked @endif  @endforeach id=""></td>
                                                <td><input class="form-check-input" type="checkbox" value="16" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '16') checked @endif  @endforeach id=""></td>
                                              </tr>
                                              <tr>
                                                <th scope="row">Blog</th>
                                                <td><input class="form-check-input" type="checkbox" value="17" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '17') checked @endif  @endforeach id="inquiry"></td>
                                                <td><input class="form-check-input" type="checkbox" value="18" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '18') checked @endif  @endforeach id=""></td>
                                                <td><input class="form-check-input" type="checkbox" value="19" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '19') checked @endif  @endforeach id=""></td>
                                                <td><input class="form-check-input" type="checkbox" value="20" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '20') checked @endif  @endforeach id=""></td>
                                              </tr>
                                              <tr>
                                                <th scope="row">User</th>
                                                <td><input class="form-check-input" type="checkbox" value="56" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '56') checked @endif  @endforeach id="inquiry"></td>
                                                <td><input class="form-check-input" type="checkbox" value="57" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '57') checked @endif  @endforeach id=""></td>
                                                <td><input class="form-check-input" type="checkbox" value="58" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '58') checked @endif  @endforeach id=""></td>
                                                <td><input class="form-check-input" type="checkbox" value="59" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '59') checked @endif  @endforeach id=""></td>
                                              </tr>
                                              <tr>
                                                <th scope="row">User Role</th>
                                                <td><input class="form-check-input" type="checkbox" value="64" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '64') checked @endif  @endforeach id="inquiry"></td>
                                                <td><input class="form-check-input" type="checkbox" value="65" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '65') checked @endif  @endforeach id=""></td>
                                                <td><input class="form-check-input" type="checkbox" value="66" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '66') checked @endif  @endforeach id=""></td>
                                                <td><input class="form-check-input" type="checkbox" value="67" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '67') checked @endif  @endforeach id=""></td>
                                              </tr>
                                              <tr>
                                                <th scope="row">Role Permission</th>
                                                <td><input class="form-check-input" type="checkbox" value="60" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '60') checked @endif  @endforeach id="inquiry"></td>
                                                <td><input class="form-check-input" type="checkbox" value="61" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '61') checked @endif  @endforeach id=""></td>
                                                <td><input class="form-check-input" type="checkbox" value="62" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '62') checked @endif  @endforeach id=""></td>
                                                <td><input class="form-check-input" type="checkbox" value="63" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '63') checked @endif  @endforeach id=""></td>
                                              </tr>
                                              <tr>
                                                <th scope="row">Expense</th>
                                                <td><input class="form-check-input" type="checkbox" value="31" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '31') checked @endif  @endforeach id="inquiry"></td>
                                                <td><input class="form-check-input" type="checkbox" value="32" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '32') checked @endif  @endforeach id=""></td>
                                                <td><input class="form-check-input" type="checkbox" value="33" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '33') checked @endif  @endforeach id=""></td>
                                                <td><input class="form-check-input" type="checkbox" value="34" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '34') checked @endif  @endforeach id=""></td>
                                              </tr>
                                              {{-- <tr>
                                                <th scope="row">Calculator</th>
                                                <td><input class="form-check-input" type="checkbox" value="" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '59') checked @endif  @endforeach id="inquiry"></td>
                                                <td><input class="form-check-input" type="checkbox" value="" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '59') checked @endif  @endforeach id=""></td>
                                                <td><input class="form-check-input" type="checkbox" value="" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '59') checked @endif  @endforeach id=""></td>
                                                <td><input class="form-check-input" type="checkbox" value="" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '59') checked @endif  @endforeach id=""></td>
                                              </tr> --}}
                                              <tr>
                                                <th scope="row">Inquiry</th>
                                                <td><input class="form-check-input" type="checkbox" value="1" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '1') checked @endif  @endforeach id="inquiry"></td>
                                                <td><input class="form-check-input" type="checkbox" value="2" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '2') checked @endif  @endforeach id=""></td>
                                                <td><input class="form-check-input" type="checkbox" value="3" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '3') checked @endif  @endforeach id=""></td>
                                                <td><input class="form-check-input" type="checkbox" value="4" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '4') checked @endif  @endforeach id=""></td>
                                              </tr>
                                              <tr>
                                                <th scope="row">Purchase</th>
                                                <td><input class="form-check-input" type="checkbox" value="44" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '44') checked @endif  @endforeach id="inquiry"></td>
                                                <td><input class="form-check-input" type="checkbox" value="45" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '45') checked @endif  @endforeach id=""></td>
                                                <td><input class="form-check-input" type="checkbox" value="46" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '46') checked @endif  @endforeach id=""></td>
                                                <td><input class="form-check-input" type="checkbox" value="47" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '47') checked @endif  @endforeach id=""></td>
                                              </tr>
                                              <tr>
                                                <th scope="row">Order</th>
                                                <td><input class="form-check-input" type="checkbox" value="35" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '35') checked @endif  @endforeach id="inquiry"></td>
                                                <td><input class="form-check-input" type="checkbox" value="36" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '36') checked @endif  @endforeach id=""></td>
                                                <td><input class="form-check-input" type="checkbox" value="37" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '37') checked @endif  @endforeach id=""></td>
                                                <td><input class="form-check-input" type="checkbox" value="38" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '38') checked @endif  @endforeach id=""></td>
                                              </tr>
                                              {{-- <tr>
                                                <th scope="row">Profile</th>
                                                <td><input class="form-check-input" type="checkbox" value="" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '59') checked @endif  @endforeach id="inquiry"></td>
                                                <td><input class="form-check-input" type="checkbox" value="" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '59') checked @endif  @endforeach id=""></td>
                                                <td><input class="form-check-input" type="checkbox" value="" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '59') checked @endif  @endforeach id=""></td>
                                                <td><input class="form-check-input" type="checkbox" value="" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '59') checked @endif  @endforeach id=""></td>
                                              </tr> --}}
                                              <tr>
                                                <th scope="row">Country</th>
                                                <td><input class="form-check-input" type="checkbox" value="27" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '27') checked @endif  @endforeach id="inquiry"></td>
                                                <td><input class="form-check-input" type="checkbox" value="28" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '28') checked @endif  @endforeach id=""></td>
                                                <td><input class="form-check-input" type="checkbox" value="29" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '29') checked @endif  @endforeach id=""></td>
                                                <td><input class="form-check-input" type="checkbox" value="30" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '30') checked @endif  @endforeach id=""></td>
                                              </tr>
                                              <tr>
                                                <th scope="row">State</th>
                                                <td><input class="form-check-input" type="checkbox" value="48" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '48') checked @endif  @endforeach id="inquiry"></td>
                                                <td><input class="form-check-input" type="checkbox" value="49" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '49') checked @endif  @endforeach id=""></td>
                                                <td><input class="form-check-input" type="checkbox" value="50" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '50') checked @endif  @endforeach id=""></td>
                                                <td><input class="form-check-input" type="checkbox" value="51" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '51') checked @endif  @endforeach id=""></td>
                                              </tr>
                                              <tr>
                                                <th scope="row">Suscribe </th>
                                                <td><input class="form-check-input" type="checkbox" value="52" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '52') checked @endif  @endforeach id="inquiry"></td>
                                                <td><input class="form-check-input" type="checkbox" value="53" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '53') checked @endif  @endforeach id=""></td>
                                                <td><input class="form-check-input" type="checkbox" value="54" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '54') checked @endif  @endforeach id=""></td>
                                                <td><input class="form-check-input" type="checkbox" value="55" name="permissions[]" @foreach($userRole->permissions as $permit) @if($permit->id == '55') checked @endif  @endforeach id=""></td>
                                              </tr>
                                            </tbody>
                                          </table>
                                          {{-- <select id="largeSelect" name="permissions[]" class="form-select form-select-lg" multiple>
                                            <option value="">Select Permission Type</option>
                                            @foreach ($permissions as $permission)
                                                <option value="{{ $permission->id}}" @foreach ($userRole->permissions as $permit) @if($permit->id == $permission->id) selected @endif  @endforeach>{{ $permission->name }}</option>
                                            @endforeach
                                          </select> --}}
                                        </div>
                                        <div class="form-check form-switch mb-2 ms-1">
                                          <input class="form-check-input" type="checkbox" name="status" value="A" id="status" @if( $userRole->status == "A")checked @endif>
                                          <label class="form-check-label" for="status"> Status (Active/Deactive)</label>
                                        </div>
                                          
                                        <div class="col-12">
                                          <button class="btn btn-primary" type="submit">Submit Role</button>
                                          <button class="btn btn-primary" type="reset">Form Reset</button>
                                          <a href="{{ route('admin.user.role.index')}}" class="btn btn-primary" type="submit">Back</a>
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