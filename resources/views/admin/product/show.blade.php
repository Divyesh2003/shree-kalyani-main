@section('title', 'Product')
@section('meta_description', "Product")
@section('meta_keywords', "Product")
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
                <div class="col-lg-8 mb-4 order-0">
                    <div class="card mb-4">
                      <div class="row">
                        <div class="col-sm-6">
                          <h5 class="card-header">Product Show</h5> 
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
                                       Item Type
                                    </td>
                                    <td>
                                    @if($product->item_type!= null) {{ $product->category->name }} @endif
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                        Product Name
                                    </td>
                                    <td>
                                    {{ $product->name  }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      Product Slug
                                    </td>
                                    <td>
                                    {{ $product->slug}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                    Description
                                    </td>
                                    <td>
                                    {{ $product->description}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                    Price
                                    </td>
                                    <td>
                                    {{ $product->price}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                        Supplier Code
                                    </td>
                                    <td>
                                    {{ $product->supplier_code}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                    Item Code
                                    </td>
                                    <td>
                                    {{ $product->item_code}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                    HSN Code
                                    </td>
                                    <td>
                                    {{ $product->hsn_code}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                   Image Code
                                    </td>
                                    <td>
                                    {{ $product->image_code}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                    Design Code
                                    </td>
                                    <td>
                                    {{ $product->design_code}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                   Fabric
                                    </td>
                                    <td>
                                    {{ $product->febric}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                    Base Color
                                    </td>
                                    <td>
                                    {{ $product->base_color}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                    Composition Color
                                    </td>
                                    <td>
                                    {{ $product->compitation_color}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                    Material Composition
                                    </td>
                                    <td>
                                    {{ $product->material_composition}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                    Length
                                    </td>
                                    <td>
                                    {{ $product->length}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                    Blouse
                                    </td>
                                    <td>
                                    {{ $product->blouse}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                    Blouse Color
                                    </td>
                                    <td>
                                    {{ $product->blouse_color}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                   Blouse Material
                                    </td>
                                    <td>
                                    {{ $product->blouse_material}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                   Blouse Work
                                    </td>
                                    <td>
                                    {{ $product->blouse_work}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                   Chuni
                                    </td>
                                    <td>
                                    {{ $product->chuni}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                   Chuni Color
                                    </td>
                                    <td>
                                    {{ $product->chuni_color}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                  Chuni Material
                                    </td>
                                    <td>
                                    {{ $product->chuni_material}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                  Chuni Work
                                    </td>
                                    <td>
                                    {{ $product->chuni_work}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                  Decoration 
                                    </td>
                                    <td>
                                    {{ $product->decdoration}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                  Extra Work
                                    </td>
                                    <td>
                                    {{ $product->extra_work}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                  IRate
                                    </td>
                                    <td>
                                    {{ $product->irate}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                  Rate 
                                    </td>
                                    <td>
                                    {{ $product->rate}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                  Discount 
                                    </td>
                                    <td>
                                    {{ $product->discount}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                  Patterns
                                    </td>
                                    <td>
                                    {{ $product->patterns}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                  Occasion  TYpe
                                    </td>
                                    <td>
                                    {{ $product->occasion_type}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                        Washing Instraction
                                    </td>
                                    <td>
                                    {{ $product->washing_instruction}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                        Item Weight
                                    </td>
                                    <td>
                                    {{ $product->item_weight}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                       Weave Type
                                    </td>
                                    <td>
                                    {{ $product->weave_type}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                       Meta Title
                                    </td>
                                    <td>
                                    {{ $product->meta_title}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                       Meta Description
                                    </td>
                                    <td>
                                    {{ $product->meta_descipriton}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                        Meta Keywords
                                    </td>
                                    <td>
                                    {{ $product->meta_keyword}}
                                    </td>
                                  </tr>

                                  <tr>
                                    <td>
                                    Status
                                    </td>
                                    <td>
                                        <span class="badge bg-label-primary me-1">@if($product->status == "A") Active @else Deactive @endif</span>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                              <div class="row mt-3">
                                <div class="col-12">
                                    <a href="{{ route('admin.product.edit',$product->id)}}" class="btn btn-primary" type="submit">Edit</a>
                                    <a href="{{ route('admin.product.index')}}" class="btn btn-primary ms-3">Back</a>
                                    <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST" class="m-0">
                                        @csrf()
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger float-end" style="">Delete</button>
                                      </form>
                                    
                                  </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-12">
                                  <h5>Supllier</h5>
                                  @if($product->supplier_id != null)
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
                                       {{ $product->supplier->firstname}}
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>
                                          Last Name
                                        </td>
                                        <td>
                                       {{ $product->supplier->lastname}}
                                        </td>
                                      </tr>
                                      <tr>
                                        <td>
                                          Mobile
                                        </td>
                                        <td>
                                       {{ $product->supplier->mobile}}
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                @endif
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
                  <div class="col-4">
                    <div class="mt-3">
                      <h5>Video</h5>
                      <video width="320" height="240" autoplay muted>
                        <source src="{{ asset($product->video)}}" type="video/mp4">
                      </video>
                    </div>
                    <div class="mt-3"> 
                      <h5>Image</h5>

                      <img src="{{ asset($product->image)}}" alt="" width="200px" height="200px">
                    </div>
                    <div class="mt-3">
                      <h5>Gallery</h5>
                      @foreach (json_decode($product->gallery) as $image)
                      <img src="{{ asset($image)}}" alt="" class="mt-2" width="200px" height="200px"> 
                      @endforeach
                    </div>
                  </div>
            </div>
        </div>
    </div>
@endsection