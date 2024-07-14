@section('title', 'Order')
@section('meta_description', "Order")
@section('meta_keywords', "Order")
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
                          <h5 class="card-header">Category Edit</h5> 
                        </div>
                        <div class="col-sm-6"></div>
                      </div>
                        <div class="card-body"> 
                              <div class="row mt-3">
                                <div class="col-12">
                                    <form class="row g-3 needs-validation" id="category" method="POST" action="{{ route('admin.product.update',$product->id) }}"   enctype="multipart/form-data" novalidate>
                                        @csrf()
                                        @method('PUT')
                                        <div class="mt-2 mb-3">
                                            <label for="largeSelect" class="form-label">Item Type</label>
                                            <select id="largeSelect" name="item_type" class="form-select form-select-lg" required>
                                              <option value="">Select Item Type</option>
                                              @foreach ($categories as $category)
                                                  <option value="{{ $category->id}}" @if($category->id == $product->item_type) selected @endif>{{ $category->name }}</option>
                                              @endforeach
                                            </select>
                                          </div>
                                          <div class="mt-2 mb-3">
                                            <label for="name" class="form-label">Name</label>
                                            <input id="largeInput" name="name" class="form-control form-control-lg" value="{{ $product->name}}" type="text" placeholder="Enter Product Name" required>
                                            <div class="invalid-feedback">
                                                Please Enter Product Name.
                                              </div> 
                                        </div>
                                          <div class="mt-2 mb-3">
                                            <label for="slug" class="form-label">Slug</label>
                                            <input id="slug" name="slug" class="form-control form-control-lg" value="{{ $product->slug }}" type="text" placeholder="Enter Product Slug" required>
                                            <div class="invalid-feedback">
                                                Please Enter Product Slug.
                                              </div>   
                                        </div>
                                          <div class="mt-2 mb-3">
                                            <label for="description" class="form-label">Description</label>
                                            {{-- <input id="description" name="description" class="form-control form-control-lg" type="text" placeholder="Enter Category Description"> --}}
                                            <textarea name="description" id="description"  class="form-control form-control-lg" cols="30" rows="5">{{ $product->description }}</textarea>
                                            <div class="invalid-feedback">
                                                Please Enter Category Description.
                                              </div>  
                                        </div>
                                        <div class="mt-2 mb-3">
                                            <label for="price" class="form-label">Price</label>
                                            <input id="price" name="price" class="form-control form-control-lg" type="number" placeholder="Enter Price" value="{{ $product->price }}" >
                                            <div class="invalid-feedback">
                                                Please Enter Category Price.
                                              </div>    
                                        </div>
                                        <div class="mt-2 mb-3">
                                            <label for="image" class="form-label">Image</label>
                                            <input id="image" name="image" class="form-control form-control-lg" type="file" >
                                            <div class="invalid-feedback">
                                                Please Enter Category Price.
                                              </div>    
                                        </div>
                                        <div class="mt-2 mb-3">
                                            <label for="gallery" class="form-label">Gallery</label>
                                            <input type="file" id="gallery" class="form-control form-control-lg" name="gallery[]" multiple  max="5" >
                                            <div class="invalid-feedback">
                                                Please Enter Category Price.
                                              </div>    
                                        </div>
                                        <div class="mt-2 mb-3">
                                          <label for="image" class="form-label">Video</label>
                                          <input id="image" name="video" class="form-control form-control-lg" type="file" >
                                          <div class="invalid-feedback">
                                              Please Enter Category Price.
                                            </div>    
                                      </div>
                                        <div class="mt-2 mb-3">
                                            <label for="supplier_code" class="form-label">Supplier Code</label>
                                            <input id="supplier_code" name="supplier_code" class="form-control form-control-lg" value="{{ $product->supplier_code }}" type="text" placeholder="Enter Supplier Code" >
                                            <div class="invalid-feedback">
                                                Please Enter Supplier Code.
                                              </div>    
                                        </div>
                                        <div class="mt-2 mb-3">
                                            <label for="item_code" class="form-label">Item Code</label>
                                            <input id="item_code" name="item_code" class="form-control form-control-lg" value="{{ $product->item_code }}" type="text" placeholder="Enter Item Code" >
                                            <div class="invalid-feedback">
                                                Please Enter Item Code.
                                              </div>    
                                        </div>
                                          <div class="mt-2 mb-3">
                                            <label for="hsn_code" class="form-label">HSN Code</label>
                                            <input id="hsn_code" name="hsn_code" class="form-control form-control-lg" value="{{ $product->hsn_code }}"  type="text" placeholder="Enter HSN Code" >
                                            <div class="invalid-feedback">
                                                Please Enter Category HSN Code.
                                              </div>    
                                        </div>
                                        <div class="mt-2 mb-3">
                                            <label for="image_code" class="form-label">Image Code</label>
                                            <input id="image_code" name="image_code" class="form-control form-control-lg" value="{{ $product->image_code }}" type="text" placeholder="Enter Product Image Code" required>
                                            <div class="invalid-feedback">
                                                Please Enter Product Slug.
                                              </div>   
                                        </div>
                                        <div class="mt-2 mb-3">
                                            <label for="design_code" class="form-label">Design Code</label>
                                            <input id="design_code" name="design_code" class="form-control form-control-lg" value="{{ $product->design_code }}" type="text" placeholder="Enter Product Design Code" >
                                            <div class="invalid-feedback">
                                                Please Enter Product Meta Description.
                                              </div>  
                                        </div>
                                        <div class="mt-2 mb-3">
                                            <label for="febric" class="form-label">Fabric</label>
                                            <input id="febric" name="febric" class="form-control form-control-lg" type="text" value="{{ $product->design_code }}" placeholder="Enter Product Fabric" >
                                            <div class="invalid-feedback">
                                                Please Enter Product Fabric.
                                              </div>  
                                        </div>
                                        <div class="mt-2 mb-3">
                                            <label for="base_color" class="form-label">Base Color</label>
                                            <input id="base_color" name="base_color" class="form-control form-control-lg" value="{{ $product->base_color }}" type="text" placeholder="Enter Product Base Color" >
                                            <div class="invalid-feedback">
                                                Please Enter Product Base Color.
                                              </div>  
                                        </div>
                                        <div class="mt-2 mb-3">
                                            <label for="compitation_color" class="form-label"> Compition Color</label>
                                            <input id="compitation_color" name="compitation_color" class="form-control form-control-lg" value="{{ $product->compitation_color }}" type="text" placeholder="Enter Product Compition Color" >
                                            <div class="invalid-feedback">
                                                Please Enter Product Compition Color.
                                              </div>  
                                        </div>
                                        <div class="mt-2 mb-3">
                                            <label for="material_composition" class="form-label">Material Composition</label>
                                            <input id="material_composition" name="material_composition" class="form-control form-control-lg" value="{{ $product->material_composition }}" type="text" placeholder="Enter Product Material Composition" >
                                            <div class="invalid-feedback">
                                                Please Enter Product Material Composition.
                                              </div>  
                                        </div>
                                        <div class="mt-2 mb-3">
                                            <label for="length" class="form-label">Length</label>
                                            <input id="length" name="length" class="form-control form-control-lg" type="text" value="{{ $product->length }}" placeholder="Enter Product Material Length" >
                                            <div class="invalid-feedback">
                                                Please Enter Product length.
                                              </div>  
                                        </div>
                                        <div class="mt-2 mb-3">
                                            <label for="blouse" class="form-label">Blouse</label>
                                            <input id="blouse" name="blouse" class="form-control form-control-lg" type="text" value="{{ $product->blouse }}" placeholder="Enter Product Material Blouse" >
                                            <div class="invalid-feedback">
                                                Please Enter Product Blouse.
                                              </div>  
                                        </div>
                                        <div class="mt-2 mb-3">
                                            <label for="blouse_color" class="form-label">Blouse Color</label>
                                            <input id="blouse_color" name="blouse_color" class="form-control form-control-lg" value="{{ $product->blouse_color }}" type="text" placeholder="Enter Product Material Blouse Color" >
                                            <div class="invalid-feedback">
                                                Please Enter Product Blouse.
                                              </div>  
                                        </div>
                                        <div class="mt-2 mb-3">
                                            <label for="blouse_material" class="form-label">Blouse Material</label>
                                            <input id="blouse_material" name="blouse_material" class="form-control form-control-lg" value="{{ $product->blouse_material }}" type="text" placeholder="Enter Product Material Blouse Material" >
                                            <div class="invalid-feedback">
                                                Please Enter Product Blouse Material.
                                              </div>  
                                        </div>
                                        <div class="mt-2 mb-3">
                                            <label for="chuni" class="form-label">Chuni</label>
                                            <input id="chuni" name="chuni" class="form-control  form-control-lg" type="text" value="{{ $product->chuni }}" placeholder="Enter Product Chuni" >
                                            <div class="invalid-feedback">
                                                Please Enter Product Chuni.
                                              </div>  
                                        </div>
                                        <div class="mt-2 mb-3">
                                            <label for="chuni_color" class="form-label">Chuni Color</label>
                                            <input id="chuni_color" name="chuni_color" class="form-control form-control-lg" type="text" value="{{ $product->chuni_color }}" placeholder="Enter Product Chuni Color" >
                                            <div class="invalid-feedback">
                                                Please Enter Product Chuni Color.
                                              </div>  
                                        </div>
                                        <div class="mt-2 mb-3">
                                            <label for="chuni_material" class="form-label">Chuni Material</label>
                                            <input id="chuni_material" name="chuni_material" class="form-control form-control-lg" type="text" value="{{ $product->chuni_material }}" placeholder="Enter Product Chuni Material" >
                                            <div class="invalid-feedback">
                                                Please Enter Product Chuni Material.
                                              </div>  
                                        </div>
                                          <div class="mt-2 mb-3">
                                            <label for="chuni_work" class="form-label">Chuni Work</label>
                                            <input id="chuni_work" name="chuni_work" class="form-control form-control-lg" type="text" value="{{ $product->chuni_work }}" placeholder="Enter Product Description" >
                                            <div class="invalid-feedback">
                                                Please Enter Product Chuni Work.
                                              </div>  
                                        </div>
                                        <div class="mt-2 mb-3">
                                            <label for="decdoration" class="form-label">Decoration</label>
                                            <input id="decdoration" name="decdoration" class="form-control form-control-lg" value="{{ $product->decdoration }}" type="text" placeholder="Enter Decoration" >
                                            <div class="invalid-feedback">
                                                Please Enter Product Decoration.
                                              </div>  
                                        </div>
                                        
                                        <div class="mt-2 mb-3">
                                            <label for="extra_work" class="form-label">Extra Work</label>
                                            <input id="extra_work" name="extra_work" class="form-control form-control-lg" value="{{ $product->extra_work }}" type="text" placeholder="Enter Product Extra Work" >
                                            <div class="invalid-feedback">
                                                Please Enter Product Meta Extra Work.
                                              </div>  
                                        </div>
                                        <div class="mt-2 mb-3">
                                            <label for="irate" class="form-label">Irate</label>
                                            <input id="irate" name="irate" class="form-control form-control-lg" type="text" value="{{ $product->irate }}" placeholder="Enter Product Irate" >
                                            <div class="invalid-feedback">
                                                Please Enter Product Irate.
                                              </div>  
                                        </div>
                                        <div class="mt-2 mb-3">
                                            <label for="rate" class="form-label">Rate</label>
                                            <input id="rate" name="rate" class="form-control form-control-lg"  value="{{ $product->rate }}" type="text" placeholder="Enter Product Rate " >
                                            <div class="invalid-feedback">
                                                Please Enter Product Rate.
                                              </div>  
                                        </div>
                                        <div class="mt-2 mb-3">
                                            <label for="discount" class="form-label">Discount</label>
                                            <input id="discount" name="discount" class="form-control form-control-lg" value="{{ $product->rate }}" type="text" placeholder="Enter Product Discount" >
                                            <div class="invalid-feedback">
                                                Please Enter Product Discount.
                                              </div>  
                                        </div>
                                        <div class="mt-2 mb-3">
                                            <label for="patterns" class="form-label">Patterns</label>
                                            <input id="patterns" name="patterns" class="form-control form-control-lg" value="{{ $product->patterns }}" type="text" placeholder="Enter Product Patterns" >
                                            <div class="invalid-feedback">
                                                Please Enter Product Patterns.
                                              </div>  
                                        </div>
                                        <div class="mt-2 mb-3">
                                            <label for="occasion_type" class="form-label">Occasion Type</label>
                                            <input id="occasion_type" name="occasion_type" class="form-control form-control-lg" value="{{ $product->occasion_type }}" type="text" placeholder="Enter Product Occasion Type" >
                                            <div class="invalid-feedback">
                                                Please Enter Product Occasion Type.
                                              </div>  
                                        </div>
                                        <div class="mt-2 mb-3">
                                            <label for="washing_instruction" class="form-label">Washing Instruction</label>
                                            <input id="washing_instruction" name="washing_instruction"  value="{{ $product->washing_instruction }}"  class="form-control form-control-lg" type="text" placeholder="Enter Product Washing Instruction" >
                                            <div class="invalid-feedback">
                                                Please Enter Product Washing Instruction.
                                              </div>  
                                        </div>
                                        <div class="mt-2 mb-3">
                                            <label for="item_weight" class="form-label">Item Weight </label>
                                            <input id="item_weight" name="item_weight" value="{{ $product->item_weight }}" class="form-control form-control-lg" type="text" placeholder="Enter Product Irate" >
                                            <div class="invalid-feedback">
                                                Please Enter Product Irate.
                                              </div>  
                                        </div>
                                        <div class="mt-2 mb-3">
                                            <label for="weave_type" class="form-label">Wave Type</label>
                                            <input id="weave_type" name="weave_type" value="{{ $product->weave_type }}" class="form-control form-control-lg" type="text" placeholder="Enter Product Weave Type" >
                                            <div class="invalid-feedback">
                                                Please Enter Product Weave Type.
                                              </div>  
                                        </div>
                                        {{-- //////////////////////////////////////////////////////////// --}}
                                        <div class="mt-2 mb-3">
                                            <label for="meta_title" class="form-label">Meta Title</label>
                                            <input id="meta_title" name="meta_title" value="{{ $product->meta_title }}" class="form-control form-control-lg" type="text" placeholder="Enter Product Description">
                                            <div class="invalid-feedback">
                                                Please Enter Product Meta Title.
                                              </div>   
                                        </div>
                                        <div class="mt-2 mb-3">
                                            <label for="meta_description" class="form-label">Meta Description</label>
                                            <input id="meta_description" name="meta_description" value="{{ $product->meta_description }}" class="form-control form-control-lg" type="text" placeholder="Enter Product Description">
                                            <div class="invalid-feedback">
                                                Please Enter Product Meta Description.
                                              </div>   
                                        </div>
                                          <div class="mt-2 mb-3">
                                            <label for="meta_keyword" class="form-label">Meta Keywords</label>
                                            <input id="meta_keyword" name="meta_keyword" value="{{ $product->meta_keyword }}" class="form-control form-control-lg" type="text" placeholder="Enter Product Description">
                                            <div class="invalid-feedback">
                                                Please Enter Product Meta Keywords.
                                              </div>   
                                        </div>
                                        <div class="form-check form-switch mb-2 ms-1">
                                            <input class="form-check-input" type="checkbox" name="status" value="A" id="flexSwitchCheckChecked" @if($product->status == "A") checked @endif>
                                            <label class="form-check-label" for="flexSwitchCheckChecked"> Status (Active/Deactive)</label>
                                          </div>
                                        <div class="col-12">
                                          <button class="btn btn-primary" type="submit">Submit Order</button>
                                          <button class="btn btn-primary" type="reset">Form Reset</button>
                                          <a href="{{ route('admin.product.index')}}" class="btn btn-primary" type="submit">Back</a>
                                        </div>
                                      </form> 
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