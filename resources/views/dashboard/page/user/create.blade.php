@extends('layouts.dashboard')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> المشرفين </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('moderator.index')}}">المشرفين</a>
                                </li>
                                <li class="breadcrumb-item active">اضافه مشرف
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
                                    <h4 class="card-title">جميع المشرفين </h4>
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

                                <form action="{{route('moderator.store')}}" method="post" enctype="multipart/form-data"
                                      style="padding: 20px">

                                    @csrf
                                    @method('post')
                                    <div class="form-group">
                                        <label>@lang('site.name')</label>
                                        <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                                    </div>


                                    <div class="form-group">
                                        <label>@lang('site.email')</label>
                                        <input type="email" name="email" class="form-control"
                                               value="{{ old('email') }}">
                                    </div>

                                    <div class="form-group">
                                        <label>@lang('site.image')</label>
                                        <input type="file" name="image" class="form-control image">

                                        <img src="{{ asset('uploads/user/default.png') }}" style="width: 100px"
                                             class="img-thumbnail image-preview" alt="">
                                    </div>

                                    <div class="form-group">
                                        <label>@lang('site.password')</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>@lang('site.password_confirmation')</label>
                                        <input type="password" name="password_confirmation" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>@lang('site.permissions')</label>


                                        @php
                                            $models = ['users', 'categories', 'brands','products', 'clients', 'orders', 'blog'];
                                            $maps = ['create', 'read', 'update', 'delete'];
                                        @endphp

                                        <ul class="nav nav-pills nav-active-bordered-pill nav-justified">
                                            @foreach ($models as $index=>$model)
                                                <li class="nav-item"><a
                                                        class="{{ $index == 0 ? 'active' : '' }} nav-link"
                                                        id="{{ $model }}.-pill"
                                                        href="#{{ $model }}"
                                                        data-toggle="pill">@lang('site.' . $model)</a></li>
                                            @endforeach
                                        </ul>


                                        <div class="tab-content px-1 pt-1">
                                            @foreach ($models as $index=>$model)
                                                <div role="tabpanel" class="tab-pane {{ $index == 0 ? 'active' : '' }}"
                                                     id="{{ $model }}"
                                                     aria-labelledby="{{ $model }}-pill"
                                                     aria-expanded="true">
                                                    @foreach ($maps as $map)
                                                        <label style="margin: 0 5px"><input type="checkbox"
                                                                                            name="permissions[]"
                                                                                            value="{{ $model . '_' . $map}}"> @lang('site.' . $map)
                                                        </label>
                                                    @endforeach
                                                </div>

                                            @endforeach
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

