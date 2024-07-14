@extends('admin.layouts.app')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
      <!-- Content -->
      <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
          <div class="col-lg-12 mb-4 order-0">
            <div class="row">
             
              <div class="col-4">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                        <img
                          src="{{ asset('admin/assets/img/icons/unicons/chart-success.png') }}"
                          alt="chart success"
                          class="rounded" />
                      </div>
                    
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <span class="fw-medium d-block mb-1">Blog Category</span>
                      </div>
                      <div class="col-6 ">
                        <h3 class="card-title mb-2 text-end">{{ $total_blog_category_count }}</h3>
                      </div>
                      <div class="col-6">
                        <span class="fw-medium d-block mb-1">Total Blog</span>
                      </div>
                      <div class="col-6">
                        <h3 class="card-title mb-2  text-end">{{ $total_blog_count }}</h3>
                      </div>
                      <div class="col-6">
                        <span class="fw-medium d-block mb-1">Inquiry</span>
                      </div>
                      <div class="col-6">
                        <h3 class="card-title mb-2  text-end">{{ $inquiry }}</h3>
                      </div>
                    </div>
                   
                    {{-- <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +72.80%</small> --}}
                  </div>
                </div>
              </div>
              <div class="col-4">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                        <img
                          src="{{ asset('admin/assets/img/icons/unicons/chart-success.png') }}"
                          alt="chart success"
                          class="rounded" />
                      </div>
                    
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <span class="fw-medium d-block mb-1">Total Category</span>
                      </div>
                      <div class="col-6 ">
                        <h3 class="card-title mb-2 text-end">{{ $total_category_count }}</h3>
                      </div>
                      <div class="col-6">
                        <span class="fw-medium d-block mb-1">Total Product</span>
                      </div>
                      <div class="col-6">
                        <h3 class="card-title mb-2  text-end">{{ $total_product_count }}</h3>
                      </div>
                      <div class="col-6">
                        <span class="fw-medium d-block mb-1">Expense</span>
                      </div>
                      <div class="col-6">
                        <h3 class="card-title mb-2  text-end">{{ $expense }}</h3>
                      </div>
                    </div>
                   
                    {{-- <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +72.80%</small> --}}
                  </div>
                </div>
              </div>
              <div class="col-4">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                        <img
                          src="{{ asset('admin/assets/img/icons/unicons/chart-success.png') }}"
                          alt="chart success"
                          class="rounded" />
                      </div>
                    
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <span class="fw-medium d-block mb-1">Total User</span>
                      </div>
                      <div class="col-6 ">
                        <h3 class="card-title mb-2 text-end">{{ $total_user }}</h3>
                      </div>
                      <div class="col-6">
                        <span class="fw-medium d-block mb-1">Total User Active</span>
                      </div>
                      <div class="col-6">
                        <h3 class="card-title mb-2  text-end">{{ $total_active_user }}</h3>
                      </div>
                      <div class="col-6">
                        <span class="fw-medium d-block mb-1">Total User Dactive</span>
                      </div>
                      <div class="col-6">
                        <h3 class="card-title mb-2  text-end">{{ $deactive_total }}</h3>
                      </div>
                     
                    </div>
                   
                    {{-- <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +72.80%</small> --}}
                  </div>
                </div>
              </div>
              <div class="col-4 mt-3">
                <div class="card">
                  <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                      <div class="avatar flex-shrink-0">
                        <img
                          src="{{ asset('admin/assets/img/icons/unicons/chart-success.png') }}"
                          alt="chart success"
                          class="rounded" />
                      </div>
                      {{-- <div class="dropdown">
                        <button
                          class="btn p-0"
                          type="button"
                          id="cardOpt3"
                          data-bs-toggle="dropdown"
                          aria-haspopup="true"
                          aria-expanded="false">
                          <i class="bx bx-dots-vertical-rounded"></i>
                        </button>
                      </div> --}}
                    </div>
                    <div class="row">
                      <div class="col-6">
                        <span class="fw-medium d-block mb-1">Total Pending Order</span>
                      </div>
                      <div class="col-6 ">
                        <h3 class="card-title mb-2 text-end">{{ $total_pending_order }}</h3>
                      </div>
                      <div class="col-6">
                        <span class="fw-medium d-block mb-1">Total Approved Order</span>
                      </div>
                      <div class="col-6">
                        <h3 class="card-title mb-2  text-end">{{ $total_approved_order }}</h3>
                      </div>
                      <div class="col-6">
                        <span class="fw-medium d-block mb-1">Total Canceled Order</span>
                      </div>
                      <div class="col-6">
                        <h3 class="card-title mb-2  text-end">{{ $total_canceled_order }}</h3>
                      </div>
                      <div class="col-6">
                        <span class="fw-medium d-block mb-1">Total Order</span>
                      </div>
                      <div class="col-6">
                        <h3 class="card-title mb-2  text-end">{{ $total_order }}</h3>
                      </div>
                      <div class="col-6"></div>
                    </div>
                   
                    {{-- <small class="text-success fw-medium"><i class="bx bx-up-arrow-alt"></i> +72.80%</small> --}}
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
      <!-- / Content -->
      <!-- Footer -->
      <footer class="content-footer footer bg-footer-theme">
        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
          <div class="mb-2 mb-md-0">
            ©
            <script>
              document.write(new Date().getFullYear());
            </script>
            , made with ❤️ by
            <a href="" target="_blank" class="footer-link fw-medium">KD Devloper</a>
          </div>
        </div>
      </footer>
      <!-- / Footer -->
      <div class="content-backdrop fade"></div>
    </div>
@endsection
