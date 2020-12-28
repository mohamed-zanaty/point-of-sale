@extends('layouts.dashboard')

@section('content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> الطلبات </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active">الطلبات
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
                                    <h4 class="card-title">جميع الطلبات </h4>
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
                                        <div class="row">
                                            <div class="col-md-7">
                                                <table class="table table-striped table-bordered zero-configuration">
                                                    <thead>
                                                    <tr>
                                                        <th>@lang('site.client_name')</th>
                                                        <th>@lang('site.price')</th>
                                                        <th>@lang('site.created_at')</th>
                                                        <th>@lang('site.action')</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    @foreach ($orders as $order)
                                                        <tr>
                                                            <td>{{ $order->client->name }}</td>
                                                            <td>{{ number_format($order->total_price, 2) }}</td>

                                                            <td>{{ $order->created_at->toFormattedDateString() }}</td>
                                                            <td>
                                                                @if (auth('admin')->user()->hasPermission('orders_read'))
                                                                    <button
                                                                        class="btn btn-primary btn-sm order-products"
                                                                        data-url="{{ route('order.products', $order->id) }}"
                                                                        data-method="get"
                                                                        style="margin-bottom: 5px"
                                                                    >

                                                                        @lang('site.show')
                                                                    </button>
                                                                @else
                                                                    <a
                                                                        class="btn btn-primary btn-sm disabled"

                                                                        style="margin-bottom: 5px"
                                                                    >

                                                                        @lang('site.show')
                                                                    </a>
                                                                @endif
                                                                    @if (auth('admin')->user()->hasPermission('orders_update'))
                                                                        <a style="margin-bottom: 5px"
                                                                           href="{{ route('client.order.edit', ['client' => $order->client->id, 'order' => $order->id]) }}"
                                                                           class="btn btn-warning btn-sm"><i
                                                                                class="fa fa-pencil"></i> @lang('site.edit')
                                                                        </a>
                                                                    @else
                                                                        <a style="margin-bottom: 5px" href="#" disabled
                                                                           class="btn btn-warning btn-sm disabled"> @lang('site.edit')
                                                                        </a>
                                                                    @endif

                                                                    @if (auth('admin')->user()->hasPermission('orders_delete'))
                                                                        <form
                                                                            action="{{ route('order.destroy', $order->id) }}"
                                                                            method="post"
                                                                            style="display: inline-block;">
                                                                            {{ csrf_field() }}
                                                                            {{ method_field('delete') }}
                                                                            <button style="margin-bottom: 5px"
                                                                                    type="submit"
                                                                                    class="btn btn-danger btn-sm delete"> @lang('site.delete')
                                                                            </button>
                                                                        </form>

                                                                    @else
                                                                        <a style="margin-bottom: 5px" href="#"
                                                                           class="btn btn-danger btn-sm disabled"
                                                                           disabled> @lang('site.delete')</a>
                                                                    @endif

                                                            </td>

                                                        </tr>

                                                    @endforeach


                                                    </tbody>
                                                </table>
                                            </div>


                                            <div class="col-md-5">

                                                <div style="display: none; flex-direction: column; align-items: center;"
                                                     id="loading">
                                                    <div class="loader"></div>
                                                    <p style="margin-top: 10px">@lang('site.loading')</p>
                                                </div>
                                                <h3>الفاتوره</h3>
                                                <div id="order-product-list">

                                                </div>
                                            </div>
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

