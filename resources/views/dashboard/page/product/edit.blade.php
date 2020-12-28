@extends('layouts.dashboard')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> البضائع </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('product.index')}}">البضائع</a>
                                </li>
                                <li class="breadcrumb-item active">تغديل منتج
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
                                    <h4 class="card-title">اضافه: </h4>
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

                                <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data"
                                      style="padding: 20px; overflow: hidden">

                                    @csrf
                                    @method('put')

                                    @foreach(config('translatable.locales') as $locale)
                                        <div class="form-group">
                                            <label>@lang('site.'.$locale.'.name')</label>
                                            <input required type="text" name="{{$locale}}[name]" class="form-control" value="{{ $product->translate($locale)->name }}">
                                        </div>
                                    @endforeach

                                    @foreach(config('translatable.locales') as $locale)
                                        <div class="form-group">
                                            <label>@lang('site.'.$locale.'.description')</label>
                                            <textarea required type="text" name="{{$locale}}[description]" class="form-control ckeditor" >{{ $product->translate($locale)->description }}</textarea>
                                        </div>
                                    @endforeach

                                    <div class="form-group">
                                        <div class="text-bold-600 font-medium-2" style="margin-bottom: 5px">
                                            @lang('site.category')
                                        </div>
                                        <select class="select2 form-control" style="width: 80%" name="category_id">
                                            <optgroup label="اختر القسم">
                                                @foreach($categories as $category)
                                                    <option {{$category->id == $product->category->id? 'selected': ''}} value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="text-bold-600 font-medium-2" style="margin-bottom: 5px">
                                            @lang('site.brands')
                                        </div>
                                        <select class="select2 form-control" style="width: 80%" name="brand_id">
                                            <optgroup label="اختر التوكيل">
                                                @foreach($brands as $brand)
                                                    <option {{$brand->id == $product->brand->id? 'selected': ''}} value="{{$brand->id}}">{{$brand->name}}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>


                                    <div class="form-group custom-file">
                                        <label>@lang('site.image')</label>
                                        <input type="file" name="image" class="form-control image">

                                        <img src="{{ $product->image_path }}" style="width: 100px"
                                             class="img-thumbnail image-preview" alt="">
                                    </div>


                                    <div class="form-group" style="margin-top:50px ">
                                        <label>@lang('site.purchase_price')</label>
                                        <input required type="number" step="0.001" name="purchase_price" class="form-control" value="{{ $product->purchase_price }}">
                                    </div>

                                    <div class="form-group">
                                        <label>@lang('site.sale_price')</label>
                                        <input required type="number" step="0.001" name="sale_price" class="form-control" value="{{ $product->sale_price }}">
                                    </div>

                                    <div class="form-group">
                                        <label>@lang('site.stock')</label>
                                        <input required type="number" maxlength="8" name="stock" class="form-control" value="{{ $product->stock }}">
                                    </div>


                                    <div class="row skin skin-square" style="margin-bottom: 20px">
                                        <div class="col-md-6 col-sm-12">
                                            <fieldset>
                                                <input type="checkbox" {{$product->featured == 1? 'checked': ''}} name="featured" id="input-11">
                                                <label for="input-11">مميز  </label>
                                            </fieldset>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary"><i
                                                class="fa fa-plus"></i> @lang('site.add')</button>
                                    </div>
                                </form><!-- end of form -->

                            </div><!-- end of card -->

                        </div><!-- end of col -->


                    </div><!-- end of row -->

                </section>

            </div>


        </div>
    </div><!-- end of content wrapper -->

@endsection

