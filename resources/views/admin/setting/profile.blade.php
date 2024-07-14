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
            Your Profile Update
          </div>
        </div>
        @endif
                <div class="col-lg-8 mb-4 order-0">
                    <div class="card mb-4">
                        <h5 class="card-header">{{ auth()->guard('admin')->user()->name }} Profile</h5>
                        <div class="card-body"> 
                            <form class="needs-validation"  enctype="multipart/form-data" novalidate="" action="{{ route('admin.setting.profile.store')}}" method="POST">
                                @csrf()
                                @method('POST')
                                <input type="hidden" name="id" value="{{ auth()->guard('admin')->user()->id }}">
                                {{-- @dd($profile) --}}
                                <div class="mb-3">
                                  <label class="form-label" for="bs-validation-name">First Name</label>
                                  <input type="text" class="form-control" id="bs-validation-name" placeholder="John Doe" name="firstname" value="{{ $profile->firstname}}" required="">
                                  <div class="valid-feedback"> Looks good! </div>
                                  <div class="invalid-feedback"> Please enter your name. </div>
                                </div>
                                <div class="mb-3">
                                  <label class="form-label" for="bs-validation-name">Last Name</label>
                                  <input type="text" class="form-control" id="bs-validation-name" placeholder="John Doe" name="lastname" value="{{ $profile->lastname}}" required="">
                                  <div class="valid-feedback"> Looks good! </div>
                                  <div class="invalid-feedback"> Please enter your name. </div>
                                </div>
                                <div class="mb-3">
                                  <label class="form-label" for="bs-validation-name">Mobile Number</label>
                                  <input type="text" class="form-control" id="bs-validation-name" placeholder="John Doe" name="mobile" value="{{ $profile->mobile}}" required="">
                                  <div class="valid-feedback"> Looks good! </div>
                                  <div class="invalid-feedback"> Please enter your name. </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="bs-validation-email">Email</label>
                                    <input type="email" class="form-control" id="bs-validation-email" name="email" placeholder="admin@mail.com" value="{{ $profile->email }}" required="">
                                    <div class="valid-feedback"> Looks good! </div>
                                    <div class="invalid-feedback"> Please enter your email. </div>
                                  </div>
                                  <div class="mb-3">
                                    <label class="form-label" for="bs-validation-name">Bank details</label>
                                    <input type="text" class="form-control" id="bs-validation-name" placeholder="John Doe" name="bank_details" value="{{ $profile->bank_details}}" required="">
                                    <div class="valid-feedback"> Looks good! </div>
                                    <div class="invalid-feedback"> Please enter your name. </div>
                                  </div>

                                  <div class="mb-3">
                                    <label class="form-label" for="bs-validation-password">Password</label>
                                    <input type="password" class="form-control" id="bs-validation-password" name="password" placeholder="" value="" required="">
                                    <div class="valid-feedback"> Looks good! </div>
                                    <div class="invalid-feedback"> Please enter your Password. </div>
                                  </div>
                                  <div class="mb-3">
                                    <label class="form-label" for="bs-validation-upload-file">Profile pic</label>
                                    <input type="file" class="form-control" id="bs-validation-upload-file" name="image">
                                  </div>
                                <div class="row">
                                  <div class="col-12">
                                    <button type="submit" class="btn btn-primary" fdprocessedid="rf23r">Submit</button>
                                  </div>
                                </div>
                              </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 h-100">
                    <div class="card mb-4">
                        @if (auth()->guard('admin')->user()->image != null)
                        <img src="{{ asset(auth()->guard('admin')->user()->image) }}" alt=""
                        class=" h-auto rounded-circle">
                        @else 
                        <img src="{{ asset('admin/assets/img/avatars/icon.jpg') }}" alt=""
                        class=" h-auto rounded-circle">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
      const button = document.querySelector("button"),
  toast = document.querySelector(".toast");
(closeIcon = document.querySelector(".close")),
  (progress = document.querySelector(".progress"));

let timer1, timer2;

button.addEventListener("click", () => {
  toast.classList.add("active");
  progress.classList.add("active");

  timer1 = setTimeout(() => {
    toast.classList.remove("active");
  }, 5000); //1s = 1000 milliseconds

  timer2 = setTimeout(() => {
    progress.classList.remove("active");
  }, 5300);
});

closeIcon.addEventListener("click", () => {
  toast.classList.remove("active");

  setTimeout(() => {
    progress.classList.remove("active");
  }, 300);

  clearTimeout(timer1);
  clearTimeout(timer2);
});

    </script>
@endsection
