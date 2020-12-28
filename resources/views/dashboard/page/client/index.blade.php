@extends('layouts.dashboard')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> العملاء </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active">العملاء
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
                                    <h4 class="card-title">جميع العملاء </h4>
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
                                        <table class="table table-striped table-bordered  scroll-horizontal">
                                            <thead>
                                            <tr>
                                                <th> الاسم</th>
                                                <th>الايميل</th>
                                                <th>الرقم</th>
                                                <th>طلب</th>
                                                <th>التاريخ</th>
                                                <th>الإجراءات</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($clients)
                                                @foreach($clients as $client)
                                                    <tr>
                                                        <td>{{$client -> name}}</td>
                                                        <td>{{$client -> email}}</td>
                                                        <td>{{$client -> mobile}}</td>

                                                        <td>
                                                            @if (auth('admin')->user()->hasPermission('orders_create'))
                                                                <a href="{{route('client.order.create',$client -> id)}}"
                                                                   class="btn btn-success btn-sm box-shadow-3 mr-1 mb-1">طلب</a>
                                                            @else
                                                                <a href="#"
                                                                   class="btn btn-success btn-sm disabled box-shadow-3 mr-1 mb-1">طلب</a>
                                                            @endif
                                                        </td>


                                                        <td>{{$client -> created_at->format('Y-m-d')}}</td>
                                                        <td>
                                                            <div class="btn-group" role="group"
                                                                 aria-label="Basic example">
                                                                @if (auth('admin')->user()->hasPermission('clients_update'))
                                                                    <a href="{{route('client.edit',$client -> id)}}"
                                                                       class="btn btn-outline-primary btn-sm box-shadow-3 mr-1 mb-1">تعديل</a>
                                                                @else
                                                                    <a href="#"
                                                                       class="disabled btn btn-outline-primary btn-sm box-shadow-3 mr-1 mb-1">تعديل</a>
                                                                @endif
                                                                @if (auth('admin')->user()->hasPermission('clients_delete'))
                                                                    <form
                                                                        action="{{route('client.destroy',$client -> id)}}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button
                                                                            class="btn btn-outline-danger btn-sm box-shadow-3 mr-1 mb-1">
                                                                            حذف
                                                                        </button>

                                                                    </form>
                                                                @else
                                                                    <a href="#"
                                                                       class="disabled btn btn-outline-danger btn-sm box-shadow-3 mr-1 mb-1">حذف</a>
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

