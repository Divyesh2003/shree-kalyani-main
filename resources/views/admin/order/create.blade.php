@section('title', 'Order')
@section('meta_description', "Order")
@section('meta_keywords', "Order")
@extends('admin.layouts.app')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
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
          Your Category Create
        </div>
      </div>
      @endif
      @if (session('error'))
      <div class="alert alert-danger">
          {{ session('error') }}
      </div>
  @endif
              <div class="col-lg-12 mb-4 order-0">
                  <div class="card mb-4">
                      <div class="row">
                          <div class="col-sm-6">
                            <h5 class="card-header">Order Create</h5> 
                          </div>
                          <div class="card-body m-3"> 
                              <form class="row g-3 needs-validation" id="inquiry" method="POST" action="{{ route('admin.order.store') }}" novalidate>
                                  @csrf()
                                  @method('POST')
                                  <div class="mt-2 mb-3 col-6">
                                      <label for="party_id" class="form-label">Party name</label>
                                      <select name="party_id" class="form-control" id="party_id" required>
                                        @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                      </select>
                                      <div class="invalid-feedback">
                                          Please Select Order.
                                        </div> 
                                  </div>
                                  <div class="mt-2 mb-3 col-6">
                                      <label for="title" class="form-label">Title</label>
                                      <input id="title" name="title" class="form-control form-control-lg" type="text" placeholder="Enter Title" required>
                                      <div class="invalid-feedback">
                                          Please Enter Title.
                                        </div> 
                                  </div>
                                  <div class="mt-2 mb-3 col-6">
                                      <label for="description" class="form-label">Description</label>
                                      <textarea name="description" class="form-control" id="description" cols="" rows="4"></textarea>
                                      <div class="invalid-feedback">
                                          Please Enter description.
                                        </div> 
                                  </div>

                                  <div class="mt-2 mb-3 col-6">
                                      <label for="date" class="form-label">Date</label>
                                      <input id="date" name="date" class="form-control form-control-lg" type="date" placeholder="Enter Inquiry Message" required>
                                      <div class="invalid-feedback">
                                          Please Enter Inquiry Message.
                                        </div> 
                                  </div>
                                  <div class="mt-2 mb-3 col-6">
                                    <label for="shipment_mode" class="form-label">Shipment Mode</label>
                                    <input id="shipment_mode" name="shipment_mode" class="form-control form-control-lg" type="text" placeholder="Enter Inquiry Message" required>
                                    <div class="invalid-feedback">
                                        Please Enter Inquiry Message.
                                      </div> 
                                </div>
                                <div class="mt-2 mb-3 col-6">
                                  <label for="shipment_note" class="form-label">Shipment Note</label>
                                  <input id="shipment_note" name="shipment_note" class="form-control form-control-lg" type="text" placeholder="Enter Inquiry Message" required>
                                  <div class="invalid-feedback">
                                      Please Enter Inquiry Message.
                                    </div> 
                              </div>
                              <div class="mt-2 mb-3 col-6">
                                <label for="shipment_note" class="form-label">shipment Status</label>
                                <select name="party_id" class="form-control" id="party_id">
                                
                                  <option value="Approved">Approved</option>
                                  <option value="Pending">Pending</option>
                                  <option value="Canceled">Canceled</option>
                                 
                                </select>
                                <div class="invalid-feedback">
                                    Please Enter Shipmemnt Status.
                                  </div> 
                            </div>
                            <div class="mt-2 mb-3 col-6">
                              <label for="season" class="form-label">Season</label>
                              <input id="season" name="season" class="form-control form-control-lg" type="text" placeholder="Enter Inquiry Message" required>
                              <div class="invalid-feedback">
                                  Please Enter Seasons.
                                </div> 
                          </div>
                          <div class="mt-2 mb-3 col-6">
                            <label for="payment_terms" class="form-label">Payment Terms</label>
                            <input id="payment_terms" name="payment_terms" class="form-control form-control-lg" type="text" placeholder="Enter Payment Terms" required>
                            <div class="invalid-feedback">
                                Please Enter Payment Terms.
                              </div> 
                        </div>
                        <div class="mt-2 mb-3 col-6">
                          <label for="payment_terms" class="form-label">Year</label>
                          <input id="year" name="year" class="form-control form-control-lg" type="text" placeholder="Enter Payment Year" required>
                          <div class="invalid-feedback">
                              Please Enter Payment Terms.
                            </div> 
                      </div>
                      <div class="mt-2 mb-3 col-6">
                        <label for="payment_terms" class="form-label">Status</label>
                        <select name="party_id" class="form-control" id="party_id">
                          <option value="Approved">Approved</option>
                          <option value="Pending">Pending</option>
                          <option value="Canceled">Canceled</option>
                        </select>
                        <div class="invalid-feedback">
                            Please Enter  Status.
                          </div> 
                    </div>
                    <hr class="mx-n4">
                    <h4>Order Items</h4>
                    {{-- <form class="source-item py-sm-3"> --}}
                      <div class="mb-3 item-add" data-repeater-list="group-a">
                        <div class="repeater-wrapper pt-0 pt-md-4" data-repeater-item="">
                          <div class="d-flex border rounded position-relative pe-0">
                            <div class="row w-100 m-0 p-3 single-row">
                              <div class="col-md-6 col-12 mb-md-0 mb-3 ps-md-0">
                                <p class="mb-2 repeater-title">Item</p>
                                <select class="form-select item-details mb-2" name="category_id[0]">
                                  <option selected="" >Select Item</option>
                                  @foreach ($products as $product )
                                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                                  @endforeach
                                </select>
                                <textarea class="form-control" rows="2" placeholder="Item Information" name="info[0]"></textarea>
                              </div>
                              <div class="col-md-3 col-12 mb-md-0 mb-3">
                                <p class="mb-2 repeater-title">Cost</p>
                                <input type="text" class="form-control invoice-item-price mb-2 price" name="cost[0]" onkeyup="getInput()" value="" placeholder="00" min="12">
                                
                              </div>
                              <div class="col-md-2 col-12 mb-md-0 mb-3">
                                <p class="mb-2 repeater-title qty">Qty</p>
                                <input type="text" class="form-control invoice-item-qty qty" name="qty[0]" onkeyup="getInput()" placeholder="1" min="1" max="50">
                              </div>
                              <div class="col-md-1 col-12 pe-0">
                                <p class="mb-2 repeater-title">Price</p>
                                <p class="mb-0 amount">$24.00</p>
                                <input type="hidden" class="form-control invoice-item-price mb-2 sub_total" name="sub_total[0]" value="">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <button type="button" class="btn btn-primary"  id="add-item-btn" data-repeater-create="" fdprocessedid="9ywbe">Add Item</button>
                        </div>
                      </div>
                    {{-- </form> --}}
                    <hr class="my-4 mx-n4">
                  <div class="row py-sm-3">
                    <div class="col-md-6 mb-md-0 mb-3">
                      <div class="d-flex align-items-center mb-3">
                        <label for="salesperson" class="form-label me-5 fw-medium">Salesperson:</label>
                        <input type="text" class="form-control" id="salesperson" placeholder="Edward Crowley" fdprocessedid="6paek">
                      </div>
                      <input type="text" class="form-control" id="invoiceMsg" placeholder="Thanks for your business" fdprocessedid="e4rhpr">
                    </div>
                    <div class="col-md-6 d-flex justify-content-end">
                      <div class="invoice-calculations">
                        <div class="d-flex justify-content-between mb-2">
                          <span class="w-px-100">Subtotal:</span>
                          <span class="fw-medium" id="total">$00.00</span>
                          <input type="hidden" name="sub_totals" class="form-control invoice-item-price mb-2 " id="sub_totals" value="">

                        </div>
                        {{-- <div class="d-flex justify-content-between mb-2">
                          <span class="w-px-100">Discount:</span>
                          <span class="fw-medium">$00.00</span>
                        </div> --}}
                        <div class="d-flex justify-content-between mb-2">
                          <span class="w-px-100">Tax:</span>
                          <input type="number" name="tax" onkeyup="getInput()" name="tax" class="form-control invoice-item-price mb-2 " id="tax" value="0">

                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                          <span class="w-px-100">Total:</span>
                          <span class="fw-medium total_a" id="total_A">$00.00</span>
                          <input type="hidden" value="" id="total_a" name="total">
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr class="my-4">
                                  <div class="col-12 mt-2">
                                    <button class="btn btn-primary" type="submit">Submit Order</button>
                                    <button class="btn btn-primary" type="reset">Form Reset</button>
                                    <a href="{{ route('admin.order.index')}}" class="btn btn-primary" type="submit">Back</a>
                                  </div>
                                </form>
                            </div>
                        </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
       <!-- Toast -->
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
  <script>
    $(document).ready(function() {
      var num = 1;
  $('#add-item-btn').click(function() {
  var newItem = `<div class="repeater-wrapper pt-0 pt-md-4" data-repeater-item="">
                        <div class="d-flex border rounded position-relative pe-0 single-row">
                          <div class="row w-100 m-0 p-3">
                            <div class="col-md-6 col-12 mb-md-0 mb-3 ps-md-0">
                              <p class="mb-2 repeater-title">Item</p>
                              <select class="form-select item-details mb-2" name="category_id[`+num+`]">
                                <option selected="">Select Item</option>
                                @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                              </select>
                              <textarea class="form-control" rows="2" name="info[`+ num +`]" placeholder="Item Information"></textarea>
                            </div>
                            <div class="col-md-3 col-12 mb-md-0 mb-3">
                              <p class="mb-2 repeater-title">Cost</p>
                              <input type="text" class="form-control invoice-item-price mb-2 price" name="cost[`+num+`]" id="price" onkeyup="getInput()" value="" placeholder="00" min="12">
                            </div>
                            <div class="col-md-2 col-12 mb-md-0 mb-3">
                              <p class="mb-2 repeater-title qty">Qty</p>
                              <input type="text" class="form-control invoice-item-qty" id="invoice-item-qty" name="qty[`+ num +`]" value="" onkeyup="getInput()" placeholder="1" min="1" max="50">
                            </div>
                            <div class="col-md-1 col-12 pe-0">
                              <p class="mb-2 repeater-title">Price</p>
                              <p class="mb-0 amount">$24.00</p>
                              <input type="hidden" class="form-control invoice-item-price mb-2 sub_total" value="" name="sub_total[`+num+`]">
                            </div>
                          </div>
                        </div>
                      </div>`;
    $('.item-add').append(newItem);
    ++num;
  });
});
  </script>
  <script>
function getInput() {
    $('.single-row').each(function() {
        var qty = $(this).find('.invoice-item-qty').val();
        var price = $(this).find('.invoice-item-price').val();
        var amount = qty * price;
        $(this).find('.sub_total').val(amount.toFixed(2));
        $(this).find('.amount').text('$' + amount.toFixed(2));
        overallSum();
    });
}

function overallSum() {
    var total = 0;
    $('.single-row').each(function() {
        var amount = parseFloat($(this).find('.sub_total').val());
        if (!isNaN(amount)) {
            total += amount;
        }
    });
    $('#total').text('$' + total.toFixed(2));

    $('#sub_totals').val(total.toFixed(2));
    var totalsa = $('#tax').val();
    $(this).find('#tax').val(total.toFixed(2));
    var tax = $('#tax').val();
    var tax_total = (total * tax) /100;
    var total_a = tax_total + total;
    // $(this).find('.total_a').val(amount.toFixed(2));
        $('#total_A').text('$' + total_a.toFixed(2));
        $('#total_a').val(total_a.toFixed(2));
}
</script>
@endpush