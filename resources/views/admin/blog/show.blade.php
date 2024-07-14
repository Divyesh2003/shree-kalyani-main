@section('title', 'Blog')
@section('meta_description', "Blog")
@section('meta_keywords', "Blog")
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
                <div class="col-lg-8 mb-4 order-0">
                    <div class="card mb-4">
                      <div class="row">
                        <div class="col-sm-6">
                          <h5 class="card-header">Blog Category Show</h5> 
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
                                    @if($blog->item_type!= null) {{ $blog->parent->name }} @endif
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      Name
                                    </td>
                                    <td>
                                    {{ $blog->name  }}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                      Slug
                                    </td>
                                    <td>
                                    {{ $blog->slug}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                    Description
                                    </td>
                                    <td>
                                    {{ $blog->description}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                    Meta Title
                                    </td>
                                    <td>
                                    {{ $blog->meta_title}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                    Meta Title
                                    </td>
                                    <td>
                                    {{ $blog->meta_title}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                    Meta Description
                                    </td>
                                    <td>
                                    {{ $blog->meta_descipriton}}
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>
                                    Meta Keyword
                                    </td>
                                    <td>
                                    {{ $blog->meta_keyword}}
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                              <div class="row mt-3">
                                <div class="col-12">
                                    <a href="{{ route('admin.blog.edit',$blog->id)}}" class="btn btn-primary" type="submit">Edit</a>
                                    <a href="{{ route('admin.blog.index')}}" class="btn btn-primary ms-3">Back</a>
                                    <form action="{{ route('admin.blog.destroy', $blog->id) }}" method="POST" class="m-0">
                                        @csrf()
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger float-end" style="">Delete</button>
                                      </form>
                                    
                                  </div>
                              </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                  <div class="mt-3"> 
                    <h5>Image</h5>
                    <img src="{{ asset($blog->image)}}" alt="" width="200px" height="200px">
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')

@endpush