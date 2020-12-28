@extends('layouts.dashboard')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> الاقسام </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active">الاقسام
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">جميع الاقسام </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>


                                @include('dashboard.includes.alerts.errors')

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table class="table table-striped table-bordered zero-configuration">
                                            <thead>
                                            <tr>
                                                <th> الاسم</th>
                                                <th>الصوره</th>
                                                <th>التوكيلات</th>
                                                <th>المنتجات</th>
                                                <th>التاريخ</th>
                                                <th>الإجراءات</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($categories)
                                                @foreach($categories as $category)
                                                    <tr>
                                                        <td>{{$category -> name}}</td>
                                                        <td><img src="{{ $category->image_path}}"
                                                                 style="width: 100px; height: 100px"
                                                                 class="img-thumbnail" alt="person"></td>
                                                        <td>{{$category -> brands->count()}}</td>
                                                        <td>{{$category -> products->count()}}</td>

                                                        <td>{{$category -> created_at->format('Y-m-d')}}</td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                @if (auth('admin')->user()->hasPermission('categories_update'))

                                                                    <a href="{{route('category.edit',$category -> id)}}"
                                                                       class="btn btn-outline-primary btn-sm box-shadow-3 mr-1 mb-1">تعديل</a>
                                                                @else
                                                                    <a href="#"
                                                                       class="btn btn-outline-primary btn-sm disabled box-shadow-3 mr-1 mb-1">تعديل</a>
                                                                @endif

                                                                @if (auth('admin')->user()->hasPermission('categories_delete'))
                                                                    <form
                                                                        action="{{route('category.destroy',$category -> id)}}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button
                                                                            class="btn btn-outline-danger btn-sm  box-shadow-3 mr-1 mb-1">
                                                                            حذف
                                                                        </button>

                                                                    </form>
                                                                @else
                                                                        <a href="#"
                                                                           class="btn btn-outline-danger btn-sm disabled box-shadow-3 mr-1 mb-1">تعديل</a>

                                                                @endif

                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset


                                            </tbody>
                                        </table>
                                        <div class="justify-content-center d-flex">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>


@endsection

