@section('title', 'Order Tracking')
@section('meta_description', 'Order Tracking')
@section('meta_keywords', 'Order Tracking')
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
                            <div class="col-sm-12">
                                <h5 class="card-header">Order Tracking</h5> <span class="float-end me-4">{{ $order->status }}</span>
                            </div>
                        </div>
                        <div class="card-body"> 
                            <div class="row">
                                <div class="col-sm-12">
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
                                        <tr class="border-top  mt-2"> 
                                            <td></td>
                                            <td class="p-3">{{ $order->total_qty }}</td>
                                            <td>{{ $order->total_value }}</td>
                                        </tr>
                                      </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                        <div class="row">
                          <div class="col-sm-6">
                            <h5 class="card-header">Shipping details</h5> 
                          </div>
                          <div class="col-sm-6"></div>
                        </div>
                        <div class="card-body"> 
                        <div class="row">
                            <div class="col-sm-6">
                                <form action="{{ route('admin.order.shippment') }}" method="post">
                                    @csrf()
                                    @method('post')
                                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                                    <input type="text" name="details" class="form-control" placeholder="Enter Information" required>
                                    <input type="text" name="location" class="form-control mt-3" placeholder="Enter Location" required>
                                    <button type="submit" class="btn btn-primary mt-3">Save</button>
                                </form>
                            </div>
                            <div class="col-sm-6">
                                <table class="table">
                                    <thead>
                                      <tr>
                                        <th scope="col">Date</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Location</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($order->shipment as $shipment)
                                      <tr>
                                        <th scope="row">{{ $shipment->date }}</th>
                                        <td>{{ $shipment->time }}</td>
                                        <td>{{ $shipment->description }}</td>
                                        <td>{{ $shipment->location }}</td>
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
@endsection
