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
                                <li class="breadcrumb-item"><a href="{{route('client.index')}}">العملاء</a>
                                </li>
                                <li class="breadcrumb-item active">اضافه طلب
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
                                    <h4 class="card-title"></h4>
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

                                <div class="row">
                                    <div class="col-md-6" style="overflow-x:scroll">
                                        <div id="accordionWrap1" role="tablist" aria-multiselectable="true">
                                            <div class="card collapse-icon accordion-icon-rotate">
                                                <h3 style="padding: 10px">الاقسام</h3>
                                                @foreach($categories as $category)
                                                    @if($category->products->count() > 0)
                                                        <div id="heading11" class="card-header">
                                                            <a data-toggle="collapse" data-parent="#accordionWrap1"
                                                               href="#{{str_replace(' ', '-', $category->name)}}"
                                                               aria-expanded="true"
                                                               aria-controls="accordion11"
                                                               class="card-title lead"> {{$category->name}}</a>
                                                        </div>

                                                        <div id="{{str_replace(' ', '-', $category->name)}}"
                                                             role="tabpanel"
                                                             aria-labelledby="heading11"
                                                             class="collapse show">
                                                            <div class="card-content">
                                                                <div class="card-body">


                                                                    <table class="table table-striped "
                                                                           style="max-width: 90%">
                                                                        <thead>
                                                                        <tr>
                                                                            <th> الاسم</th>
                                                                            <th> توكيل</th>
                                                                            <th>المخزن</th>
                                                                            <th>السعر</th>
                                                                            <th>اضف</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        @isset($category->products)
                                                                            @foreach($category->products as $product)
                                                                                <tr>
                                                                                    <td>{{$product -> name}}</td>
                                                                                    <td>{{$product ->brand->name }}</td>
                                                                                    <td>{{$product -> stock}}</td>
                                                                                    <td>{{$product -> sale_price}}</td>
                                                                                    <td><a href=""
                                                                                           id="product-{{ $product->id }}"
                                                                                           data-name="{{ $product->name }}"
                                                                                           data-id="{{ $product->id }}"
                                                                                           data-price="{{ $product->sale_price }}"
                                                                                           class="btn {{ in_array($product->id, $order->products->pluck('id')->toArray()) ? 'btn-default disabled' : 'btn-success add-product' }} btn-sm">
                                                                                            <i class="icon icon-plus"></i>
                                                                                        </a></td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endisset
                                                                        </tbody>
                                                                    </table>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-6" style="padding: 10px; overflow-x: scroll">
                                        <h3 class="box-title" style="margin-right: 10px">@lang('site.orders')</h3>

                                        <form action="{{ route('client.order.update',['order' => $order->id, 'client' => $client->id]) }}" style="margin-right: 10px"
                                              method="post">

                                            {{ csrf_field() }}
                                            {{ method_field('put') }}

                                            @include('dashboard.includes.alerts.errors')

                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th>@lang('site.product')</th>
                                                    <th>@lang('site.quantity')</th>
                                                    <th>@lang('site.price')</th>
                                                    <th></th>
                                                </tr>
                                                </thead>

                                                <tbody class="order-list">

                                                @foreach ($order->products as $product)
                                                    <tr>
                                                        <td>{{ $product->name }}</td>
                                                        <td><input type="number" name="products[{{ $product->id }}][quantity]" data-price="{{ number_format($product->sale_price, 2) }}" class="form-control input-sm product-quantity" min="1" value="{{ $product->pivot->quantity }}"></td>
                                                        <td class="product-price">{{ number_format($product->sale_price * $product->pivot->quantity, 2) }}</td>
                                                        <td>
                                                            <button class="btn btn-danger btn-sm remove-product" data-id="{{ $product->id }}"><span class="icon icon-trash"></span></button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>

                                            </table><!-- end of table -->

                                            <h4>@lang('site.total') : <span class="total-price">{{ number_format($order->total_price, 2) }}</span></h4>

                                            <button style="width: 80%; margin: auto; background: green"
                                                    class="btn  btn-block disabled" id="add-order-form-btn">
                                                <i class="icon icon-plus"></i> @lang('site.edit_order')</button>

                                        </form>

                                    </div>
                                </div>

                            </div><!-- end of card -->

                        </div><!-- end of col -->


                    </div><!-- end of row -->

                </section>

            </div>


        </div>
    </div><!-- end of content wrapper -->

@endsection

