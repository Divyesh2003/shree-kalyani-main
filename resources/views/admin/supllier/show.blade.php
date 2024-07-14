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
                          <h5 class="card-header">Supllier Show</h5> 
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
                                  First Name
                                </td>
                                <td>
                                {{ $supplier->firstname }}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  Last Name
                                </td>
                                <td>
                                {{ $supplier->lastname }}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  Mobile Number
                                </td>
                                <td>
                                {{ $supplier->mobile }}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  Bank Details
                                </td>
                                <td>
                                {{ $supplier->bank_details }}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  Gst
                                </td>
                                <td>
                                {{ $supplier->gst }}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  Pan
                                </td>
                                <td>
                                {{ $supplier->pan }}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  Aadhar
                                </td>
                                <td>
                                {{ $supplier->aadhar }}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  State
                                </td>
                                <td>
                                {{ $supplier->state }}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                  City
                                </td>
                                <td>
                                {{ $supplier->city }}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                    Addaress
                                </td>
                                <td>
                                {{ $supplier->addaress }}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                    Company
                                </td>
                                <td>
                                {{ $supplier->company }}
                                </td>
                              </tr>
                              <tr>
                                <td>
                                Status
                                </td>
                                <td>
                                    <span class="badge bg-label-primary me-1">@if($supplier->status == "A") Active @else Deactive @endif</span>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <div class="row mt-3">
                            <div class="col-12">
                                <a href="{{ route('admin.supllier.edit',$supplier->id)}}" class="btn btn-primary" type="submit">Edit</a>
                                <a href="{{ route('admin.supllier.index')}}" class="btn btn-primary ms-3">Back</a>
                                <form action="{{ route('admin.supllier.destroy', $supplier->id) }}" method="POST" class="delete m-0">
                                    @csrf()
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger float-end" style="">Delete</button>
                                  </form>
                              </div>
                          </div>
                     
                          <div class="row">
                            <div class="col-sm-12">
                              <h5>Product </h5>
                              <table class="table">
                                <thead>
                                  <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Price</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($supplier->products as $product)
                                  <tr>
                                    <th>{{ $product->id}}</th>
                                    <th><img alt="" class="img-fluid rounded-circle" src="{{ asset($product->image)}}" style="width: 40px;height: 40px;"></th>
                                    <th>{{$product->category->name}}</th>
                                    <th>{{ $product->name }}</th>
                                    <th>{{ $product->price }}</th>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
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

@endpush