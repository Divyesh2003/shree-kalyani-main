@section('title', 'Purchase')
@section('meta_description', "Purchase")
@section('meta_keywords', "Purchase")
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
                <div class="col-lg-12 mb-4 order-0">
                    <div class="card mb-4">
                      <div class="row">
                        <div class="col-sm-6">
                          <h5 class="card-header">Purchase List</h5> 
                        </div>
                        <div class="col-sm-6">
                          <a href="{{ route('admin.purchase.create')}}" class="btn btn-primary float-end mt-3 me-3">Create</a>
                        </div>
                      </div>
                        <div class="card-body"> 
                          {{ $dataTable->table() }}
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush