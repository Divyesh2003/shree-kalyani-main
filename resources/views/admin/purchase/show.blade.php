@section('title', 'Purchase')
@section('meta_description', "Purchase")
@section('meta_keywords', "Purchase")
@extends('admin.layouts.app')
@section('content')
    <div class="content-wrapper">
        <div class="container-xxl flex-grow-1 container-p-y" style="position: relative;">
            <div class="row invoice-add">
                <!-- Invoice Add-->
                <div class="col-lg-9 col-12 mb-lg-0 mb-4 invoice-add">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    Shree Kalyani
                                </div>
                                <div class="col-sm-6 d-flex justify-content-end">
                                    <div class="mb-4">
                                        <h6 class="font-weight-medium text-xl"> Invoice #{{ $purchase->id }}</h6>
                                        <p class="my-3"><span>Date Issued: </span><span>{{ $purchase->date }}</span></p>
                                        <p><span>Due Date: </span><span>{{ $purchase->due_date }}</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="row border-top">
                                <div class="p-4">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="my-4 ms-4">
                                                <h6 class="text-sm font-weight-semibold mb-3"> Invoice To: </h6>
                                                <p class="mb-1">Andrew Burns</p>
                                                <p class="mb-1">Richardson and Sons LLC</p>
                                                <p class="mb-1">78083 Laura Pines, Bhutan</p>
                                                <p class="mb-1">(687) 660-2473</p>
                                                <p class="mb-0">pwillis@cross.org</p>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 d-flex justify-content-end">

                                            <div class="ma-4">
                                                <h6 class="text-sm font-weight-semibold mb-3"> Bill To: </h6>
                                                <table>
                                                    <tr>
                                                        <td class="pe-4"> Total Due: </td>
                                                        <td>$12,110.55</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-4"> Bank Name: </td>
                                                        <td>American Bank</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-4"> Country: </td>
                                                        <td>United States</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-4"> IBAN: </td>
                                                        <td>ETD95476213874685</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="pe-4"> SWIFT Code: </td>
                                                        <td>BR91905</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="">
                                <table class="table">
                                    <thead>

                                        <tr>
                                            <th scope="col"> ITEM </th>
                                            <th scope="col"> DESCRIPTION </th>
                                            <th scope="col" class="text-center"> Price </th>
                                            <th scope="col" class="text-center"> QTY </th>
                                            <th scope="col" class="text-center"> TOTAL </th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        @foreach ($purchaseitems as $item)
                                            {{-- @dd($item) --}}
                                            <tr>
                                                <td class="text-no-wrap">{{ $item->category->name }}</td>
                                                <td class="text-no-wrap">{{ $item->info }}</td>
                                                <td class="text-center">{{ $item->cost }}</td>
                                                <td class="text-center">{{ $item->qty }}</td>
                                                <td class="text-center"> {{ $item->sub_total }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row mt-4">
                                <div class="mb-2 col-sm-6">
                                    <div class="d-flex align-center mb-1">
                                        <h6 class="text-sm font-weight-semibold me-1"> Salesperson: </h6><span>Jenny
                                            Parker</span>
                                    </div>
                                    <p>Thanks for your business</p>
                                </div>
                                <div class="col-sm-6">
                                    <table class="w-100">
                                        <tr>
                                            <td class="pe-16"> Subtotal: </td>
                                            <td class="text-end">
                                                <h6 class="text-sm"> ${{ $purchase->sub_totals }} </h6>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="pe-16"> Tax: </td>
                                            <td class="text-end">
                                                <h6 class="text-sm"> {{ $purchase->tax }}% </h6>
                                            </td>
                                        </tr>
                                    </table>
                                    <hr class="v-divider v-theme--light mt-4 mb-3" aria-orientation="horizontal"
                                        role="separator">
                                    <table class="w-100">
                                        <tr>
                                            <td class="pe-16"> Total: </td>
                                            <td class="text-end">
                                                <h6 class="text-sm"> ${{ $purchase->total }} </h6>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <hr>
                            <div class="v-card-text">
                                <div class="d-flex">
                                    <h6 class="text-sm font-weight-semibold me-1"> Note: </h6><span>It was a pleasure
                                        working with you and your team. We hope you will keep us in mind for future
                                        freelance projects. Thank You!</span>
                                </div>
                             <div class="row">
                                <div class="col-sm-6">
                                    <div class="row">
                                        <div class="col-sm-12 d-flex">
                                            <a href="{{ route('admin.purchase.edit',$purchase->id)}}" class="btn btn-primary" type="submit">Edit</a>
                                            <a href="{{ route('admin.purchase.index')}}" class="btn btn-primary ms-3">Back</a>
                                            <form action="{{ route('admin.purchase.destroy', $purchase->id) }}" method="POST" class="ms-2">
                                                @csrf()
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger float-end" style="">Delete</button>
                                              </form>
                                        </div>
                                    </div>
                                       
                                </div>
                                <div class="col-sm-6 d-flex justify-content-end">
                                    <button type="button" class="btn btn-primary" onclick="window.print()"> Print </button>
                                    <a type="button" class="btn btn-success ms-3" href="{{ route('admin.download',$purchase->id) }}"> Download </a>
                                </div>
                             </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Invoice Add-->
                <!-- Invoice Actions -->
                <div class="col-lg-3 col-12 invoice-actions">
                    <div class="card">

                    </div>
                </div>
                <!-- /Invoice Actions -->
            </div>
        </div>
    </div>
@endsection
@push('scripts')
@endpush
