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
                          <h5 class="card-header">User Role Show</h5> 
                        </div>
                        <div class="col-sm-6"></div>
                      </div>
                        <div class="card-body"> 
                            <table class="table">
                                <thead>
                                  <tr>
                                    <th>Info</th>
                                    <th>Value</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>
                                      Name
                                    </td>
                                    <td>
                                    {{ $userRole->name }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      Permissions
                                    </td>
                                    <td>
                                    {{ $userRole->permissions }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                    Status
                                    </td>
                                    <td>
                                        <span class="badge bg-label-primary me-1">@if($userRole->status == "A") Active @else Deactive @endif</span>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                              <div class="row mt-3">
                                <div class="col-12">
                                    <a href="{{ route('admin.user.role.edit',$userRole->id)}}" class="btn btn-primary" type="submit">Edit</a>
                                    <a href="{{ route('admin.user.role.index')}}" class="btn btn-primary ms-3">Back</a>
                                    <form action="{{ route('admin.user.role.destroy', $userRole->id) }}" method="POST" class="delete m-0">
                                        @csrf()
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger float-end" style="">Delete</button>
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
  $(document).ready(function() {
    $(document).on('submit','.delete', function(e) {
e.preventDefault();
var form = $(this);
Swal.fire({
    title: "Are you sure?",
    text: "You will not be able to recover this imaginary file!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#696cff",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, confirm it!",
    cancelButtonText: "Cancel"
}).then((result) => {
    if (result.isConfirmed) {
        form.off('submit').submit();
    }
});
});
  });
  </script>
@endpush