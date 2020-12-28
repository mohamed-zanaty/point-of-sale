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
                                <li class="breadcrumb-item"><a href="{{route('category.index')}}">الاقسام</a>
                                </li>
                                <li class="breadcrumb-item active">اضافه قسم
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

                                <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data"
                                      style="padding: 20px">

                                    @csrf
                                    @method('post')

                                    @foreach(config('translatable.locales') as $locale)
                                    <div class="form-group">
                                        <label>@lang('site.'.$locale.'.name')</label>
                                        <input required type="text" name="{{$locale}}[name]" class="form-control" value="{{ old($locale.'.name') }}">
                                    </div>
                                    @endforeach





                                    <div class="form-group">
                                        <label>@lang('site.image')</label>
                                        <input type="file" name="image" class="form-control image">

                                        <img src="{{ asset('uploads/cat.png') }}" style="width: 100px"
                                             class="img-thumbnail image-preview" alt="">
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

