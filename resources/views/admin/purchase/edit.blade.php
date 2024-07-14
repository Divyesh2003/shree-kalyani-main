@section('title', 'Purchase')
@section('meta_description', "Purchase")
@section('meta_keywords', "Purchase")
@extends('admin.layouts.app')
@section('content')
    <!-- Content wrapper -->
    @if(session('success'))
    <div class="bs-toast toast fade show bg-success" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <i class="bx bx-bell me-2"></i>
        <div class="me-auto fw-medium">Sucessfully!</div>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        Your Purchase Create
      </div>
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y" style="position: relative;">
          <form action="{{ route('admin.purchase.update',$purchase->id) }}" method="post">
          <div class="row invoice-add">
            <div class="col-lg-9 col-12 mb-lg-0 mb-4">
                @csrf
                @method("PUT")
              <div class="card invoice-preview-card">
                <div class="card-body">
                  <div class="row p-sm-3 p-0">
                    <div class="col-md-6 mb-md-0 mb-4">
                      <div class="d-flex svg-illustration mb-4 gap-2">
                        <span class="app-brand-logo demo">
          <svg width="25" viewBox="0 0 25 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <defs>
              <path d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z" id="path-1"></path>
              <path d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z" id="path-3"></path>
              <path d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z" id="path-4"></path>
              <path d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z" id="path-5"></path>
            </defs>
            <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
              <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                <g id="Icon" transform="translate(27.000000, 15.000000)">
                  <g id="Mask" transform="translate(0.000000, 8.000000)">
                    <mask id="mask-2" fill="white">
                      <use xlink:href="#path-1"></use>
                    </mask>
                    <use fill="#696cff" xlink:href="#path-1"></use>
                    <g id="Path-3" mask="url(#mask-2)">
                      <use fill="#696cff" xlink:href="#path-3"></use>
                      <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                    </g>
                    <g id="Path-4" mask="url(#mask-2)">
                      <use fill="#696cff" xlink:href="#path-4"></use>
                      <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                    </g>
                  </g>
                  <g id="Triangle" transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) ">
                    <use fill="#696cff" xlink:href="#path-5"></use>
                    <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                  </g>
                </g>
              </g>
            </g>
          </svg>
          </span>
                        <span class="app-brand-text demo text-body fw-bold">Sneat</span>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <dl class="row mb-2">
                        <dt class="col-sm-6 mb-2 mb-sm-0 text-md-end">
                          <span class="h4 text-capitalize mb-0 text-nowrap">Invoice #</span>
                        </dt>
                        <dd class="col-sm-6 d-flex justify-content-md-end">
                          <div class="w-px-150">
                            <input type="number" class="form-control" placeholder="3905" disabled value="{{ $purchase->id }}" id="invoiceId" fdprocessedid="3br3p">
                          </div>
                        </dd>
                        <dt class="col-sm-6 mb-2 mb-sm-0 text-md-end">
                          <span class="fw-normal">Date:</span>
                        </dt>
                        <dd class="col-sm-6 d-flex justify-content-md-end">
                          <div class="w-px-150">
                            <input type="date" class="form-control date-picker flatpickr-input" value="{{ $purchase->date }}" placeholder="YYYY-MM-DD" name="date">
                          </div>
                        </dd>
                        <dt class="col-sm-6 mb-2 mb-sm-0 text-md-end">
                          <span class="fw-normal">Due Date:</span>
                        </dt>
                        <dd class="col-sm-6 d-flex justify-content-md-end">
                          <div class="w-px-150">
                            <input type="date" class="form-control date-picker flatpickr-input" value="{{ $purchase->due_date }}" placeholder="YYYY-MM-DD" name="due_date">
                          </div>
                        </dd>
                      </dl>
                    </div>
                  </div>
                 
                  <hr class="my-4 mx-n4">
                  <div class="row p-sm-3 p-0">
                    <div class="col-md-6 col-sm-5 col-12 mb-sm-0 mb-4">
                      <h6 class="pb-2">Invoice To:</h6>
                      <p class="mb-1">
                        <input type="text" class="form-control mb-2" name="vendor_name" value="{{ $purchase->vendor_name }}" placeholder="Vendor Name">
                      </p>
                      <p class="mb-1">
                        <textarea class="form-control" rows="2" placeholder="Vendor Address" value="" name="vendor_address">{{ $purchase->vendor_address }}</textarea>
                      </p>
                      <p class="mb-1">
                        <input type="number" class="form-control mb-2" name="vendor_phone" value="{{ $purchase->vendor_phone }}" placeholder="Vendor Phone">
                      </p>
                      <p class="mb-0">
                        <input type="email" class="form-control mb-2" name="vendor_email" value="{{ $purchase->vendor_email }}" placeholder="Vendor Email">
                      </p>
                    </div>
                  </div>
                  <hr class="mx-n4">
                  <form class="source-item py-sm-3">
                    @php $num = null @endphp
                    <div class="mb-3 item-add" data-repeater-list="group-a">
                      @foreach ($purchaseitems as $key => $item)
                      {{-- @dd($item) --}}
                      <input type="hidden" value="{{ $item->id }}" name="item[{{ $key }}]">
                      <div class="repeater-wrapper pt-0 pt-md-4" data-repeater-item="">
                        <div class="d-flex border rounded position-relative pe-0">
                          <div class="row w-100 m-0 p-3 single-row">
                            <div class="col-md-6 col-12 mb-md-0 mb-3 ps-md-0">
                              <p class="mb-2 repeater-title">Item</p>
                              <select class="form-select item-details mb-2" name="category_id[{{$key}}]">
                                <option selected="" >Select Item</option>
                                @foreach ($categories as $category) 
                                <option value="{{ $category->id }}" @if($item->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                              </select>
                              <textarea class="form-control" rows="2" placeholder="Item Information" name="info[{{$key}}]">{{ $item->info }}</textarea>
                            </div>
                            <div class="col-md-3 col-12 mb-md-0 mb-3">
                              <p class="mb-2 repeater-title">Cost</p>
                              <input type="text" class="form-control invoice-item-price mb-2 price" name="cost[{{$key}}]" onkeyup="getInput()" value="{{ $item->cost }}" placeholder="00" min="12">
                              
                            </div>
                            <div class="col-md-2 col-12 mb-md-0 mb-3">
                              <p class="mb-2 repeater-title qty">Qty</p>
                              <input type="text" class="form-control invoice-item-qty qty" name="qty[{{$key}}]" onkeyup="getInput()" value="{{ $item->qty}}" placeholder="1" min="1" max="50">
                            </div>
                            <div class="col-md-1 col-12 pe-0">
                              <p class="mb-2 repeater-title">Price</p>
                              <p class="mb-0 amount">${{ $item->sub_total}}</p>
                              <input type="hidden" class="form-control invoice-item-price mb-2 sub_total" name="sub_total[{{$key}}]" value="{{ $item->sub_total}}">
                            </div>
                          </div>
                        </div>
                      </div>
                     @php  $num = $key @endphp
                      @endforeach
                    </div>
                
                    <div class="row">
                      <div class="col-12">
                        <button type="button" class="btn btn-primary"  id="add-item-btn" data-repeater-create="" fdprocessedid="9ywbe">Add Item</button>
                      </div>
                    </div>
                  </form>
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
                          <span class="fw-medium" id="total">₹{{ $purchase->sub_totals }}</span>
                          <input type="hidden" name="sub_totals" class="form-control invoice-item-price mb-2 " id="sub_totals" value="{{ $purchase->sub_totals }}">
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                          <span class="w-px-100">Tax:</span>
                          <input type="number" name="tax" onkeyup="getInput()" name="tax" class="form-control invoice-item-price mb-2 " value="{{ $purchase->tax }}" id="tax" value="0">
                        </div>
                        <hr>
                        <div class="d-flex justify-content-between">
                          <span class="w-px-100">Total:</span>
                          <span class="fw-medium total_a" id="total_A">₹ {{ $purchase->total }}</span>
                          <input type="hidden" id="total_a" name="total" value="{{ $purchase->total }}">
                        </div>
                      </div>
                    </div>
                  </div>
                  <hr class="my-4">
                  <div class="row">
                    <div class="col-12">
                      <div class="mb-3">
                        <label for="note" class="form-label fw-medium">Note:</label>
                        <textarea class="form-control" rows="2" id="note" placeholder="Invoice note"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /Invoice Add-->
            <!-- Invoice Actions -->
            <div class="col-lg-3 col-12 invoice-actions">
              <div class="card mb-4">
                <div class="card-body">
                  <button class="btn btn-primary d-grid w-100 mb-3" data-bs-toggle="offcanvas" data-bs-target="#sendInvoiceOffcanvas" fdprocessedid="dseoes">
                    <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="bx bx-paper-plane bx-xs me-1"></i>Send Invoice</span>
                  </button>
                  <a href="" class="btn btn-secondary d-grid w-100 mb-3">Preview</a>

                  <button type="submit" class="btn btn-secondary d-grid w-100" fdprocessedid="9dgm6t">Edit</button>
                </div>
              </div>
              <div>
                <p class="mb-2">Accept payments via</p>
                <select class="form-select mb-4" fdprocessedid="se15vu">
                  <option value="Bank Account">Bank Account</option>
                  <option value="Paypal">Paypal</option>
                  <option value="Card">Credit/Debit Card</option>
                  <option value="UPI Transfer">UPI Transfer</option>
                </select>
              </div>
            </div>
            <!-- /Invoice Actions -->
          </div>
        </form>
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
      var num = @json($num) + 1;
      $('#add-item-btn').click(function() {
    console.log(num)
  var newItem = `<div class="repeater-wrapper pt-0 pt-md-4" data-repeater-item="">
                        <div class="d-flex border rounded position-relative pe-0 single-row">
                          <div class="row w-100 m-0 p-3">
                            <div class="col-md-6 col-12 mb-md-0 mb-3 ps-md-0">
                              <p class="mb-2 repeater-title">Item</p>
                              <input type="hidden" value="" name="item[`+ num +`]">
                              <select class="form-select item-details mb-2" name="category_id[`+num+`]">
                                <option selected="">Select Item</option>
                                @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                              <p class="mb-0 amount">₹ 24.00</p>
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
        $(this).find('.amount').text('₹' + amount.toFixed(2));
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
    $('#total').text('₹' + total.toFixed(2));

    $('#sub_totals').val(total.toFixed(2));
    var totalsa = $('#tax').val();
    $(this).find('#tax').val(total.toFixed(2));
    var tax = $('#tax').val();
    var tax_total = (total * tax) /100;
    var total_a = tax_total + total;
    // $(this).find('.total_a').val(amount.toFixed(2));
        $('#total_A').text('₹' + total_a.toFixed(2));
        $('#total_a').val(total_a.toFixed(2));
}
</script>
@endpush