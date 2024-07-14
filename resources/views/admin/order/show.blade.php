@section('title', 'Order')
@section('meta_description', "Order")
@section('meta_keywords', "Order")
@extends('admin.layouts.app')
@section('content')
@if (session('sucess'))
<div class="alert alert-primary">
    {{ session('sucess') }}
</div>
@endif
@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
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
                <div class="col-lg-8 mb-4 order-0">
                    <div class="card mb-4">
                      <div class="row">
                        <div class="col-sm-6">
                          <h5 class="card-header">Order Show</h5> 
                        </div>
                        <div class="col-sm-6"></div>
                      </div>
                        <div class="card-body"> 
                          All item
                          <table class="w-100">
                            @foreach ($order->items as $orderItem)
                            <tr>
                              <td>
                                <div class="row mt-3">
                                  <div class="col-sm-3">
                                    <img src="{{ asset($orderItem->product->image) }}" alt="" width="50px" height="50px">
                                  </div>
                                  <div class="col-sm-9">
                                    <div class="ms-2" style="font-size: 12px">product name</div>
                                    <span class="ms-2"> {{ $orderItem->product->name }}</span>
                                  </div>
                                </div>
                              </td>
                              <td>
                                {{ $orderItem->qty}}
                              </td>
                              <td>{{ $orderItem->cost }}</td>
                            </tr>
                            @endforeach
                          </table>
                        </div>
                    </div>
                    <div class="card mb-4">
                      <div class="row">
                        <div class="col-sm-6">
                          <h5 class="card-header">Cart Totals</h5> 
                        </div>
                        <div class="col-sm-6"></div>
                      </div>
                        <div class="card-body"> 
                          All item
                          <table class="w-100 mt-4">
                            <tr>
                              <td>
                                Cart Totals 
                              </td>
                              <td>
                                price
                              </td>
                            </tr>
                            <tr class="mt-3">
                              <td>
                                Total Quntity :-
                              </td>
                              <td>
                                {{ $order->total_qty }}
                              </td>
                            </tr>
                            <tr class="mt-3">
                              <td>Sub Totals:-</td>
                              <td>{{ $order->total_value }}</td>
                            </tr>
                          </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mb-4 order-0">
                  <div class="card mb-4">
                    <div class="card-body"> 
                   <h6>Status</h6>
                   <form action="{{ route('admin.tracking.status')}}" method="post">
                    @csrf
                    @method('post')
                    <input type="hidden" name="id" value="{{ $order->id }}">
                    <select class="form-control mb-3" name="status" id="status">
                      <option value="">Selected Status</option>
                      <option value="Approved" @if($order->status == 'Approved') selected @endif>Approved </option>
                      <option value="Pending" @if($order->status == 'Pending') selected @endif>Pending</option>
                      <option value="Canceled" @if($order->status == 'Canceled') selected @endif>Canceled</option>
                    </select>
                    <button class="btn btn-primary">save</button>
                   </form>
                      
                  </div>
                </div>
                  <div class="card mb-4">
                      <div class="card-body"> 
                        <div>
                          <h6>Summary</h6>
                        </div>
                        <div>
                          <span>Order ID </span>
                            <span class="ms-3">
                              #{{ $order->id }}
                            </span>
                          </div>
                          <div>
                            <span>Date</span>
                            <span class="ms-3">{{ $order->created_at }}</span>
                          </div>
                          <div>
                            <span class="me-3">Status</span>
                            @if ($order->status == "Approved")
                            <span class="badge bg-label-primary me-1"> Approved </span>
                              @elseif($order->status == "Pending")
                              <span class="badge bg-label-warning me-1"> Pending </span>
                              @else
                              <span class="badge bg-label-danger me-1"> Canceled </span>
                            @endif
                          </div>
                      </div>
                  </div>
                  <div class="card mb-4">
                    <div class="card-body"> 
                      <div>
                        <h6>Shipping Address</h6>
                      </div>
                      <div>
                          <span class="ms-3">
                            @if($order->shipping_address_1 != null)
                                {{ $order->shipping_address_1 }}
                            @else
                            {{ $order->address_1 }},
                            {{ $order->city}},
                            {{ $order->states->name}},
                            {{ $order->country_name->name }} - 
                            {{ $order->pincode }}
                            @endif
                          </span>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                  <div class="card-body"> 
                    <div>
                      <h6>Payment Method</h6>
                    </div>
                    <div>
                        <span class="">
                          Pay on Delivery (Cash/Card). Cash on delivery (COD) available. Card/Net banking acceptance subject to device availability.
                        </span>
                      </div>
                  </div>
              </div>
              <div class="card mb-4">
                <div class="card-body"> 
                  <div>
                    <h6>Expected Date Of Delivery</h6>
                  </div>
                  <div>
                      <span class="">
                       {{ $order->date}}
                      </span>
                  </div>
                  <div>
                    <a class="btn btn-primary" href="{{ route('admin.tracking.order',$order->id) }}">Track Order</a>
                  </div>
                </div>
            </div>
              </div>
            </div>
        </div>
    </div>
@endsection