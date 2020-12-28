@extends('layouts.dashboard')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> المدونه </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('product.index')}}">المدونه</a>
                                </li>
                                <li class="breadcrumb-item active">اضافه بوست
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

                                <form action="{{route('blog.store')}}" method="post" enctype="multipart/form-data"
                                      style="padding: 20px; overflow: hidden">

                                    @csrf
                                    @method('post')

                                    @foreach(config('translatable.locales') as $locale)
                                    <div class="form-group">
                                        <label>@lang('site.'.$locale.'.name')</label>
                                        <input required type="text" name="{{$locale}}[title]" class="form-control" value="{{ old($locale.'.title') }}">
                                    </div>
                                    @endforeach

                                    @foreach(config('translatable.locales') as $locale)
                                    <div class="form-group">
                                        <label>@lang('site.'.$locale.'.description')</label>
                                        <textarea required type="text" name="{{$locale}}[description]" class="form-control ckeditor" >{{ old($locale.'.description')}}</textarea>
                                    </div>
                                    @endforeach


                                    <div class="form-group">
                                        <div class="text-bold-600 font-medium-2" style="margin-bottom: 5px">
                                            @lang('site.category')
                                        </div>
                                        <select class="select2 form-control" style="width: 80%" name="category_id">
                                            <optgroup label="اختر القسم">
                                                @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                @endforeach
                                            </optgroup>
                                        </select>
                                    </div>



                                    <div class="form-group custom-file">
                                        <label>@lang('site.image')</label>
                                        <input type="file" name="image" class="form-control image">

                                        <img src="{{ asset('uploads/blog.png') }}" style="width: 100px"
                                             class="img-thumbnail image-preview" alt="">
                                    </div>

                                    <div class="row">
                                        <div class="card col-md-12" style="margin-top: 70px">
                                            <div class="card-header bg-primary text-center">
                                                <h3 class="text-white">SEO Content</h3>
                                            </div>
                                            <div class="card-content">
                                                <div class="card-body">


                                                    {{-- Post Seo Title --}}
                                                    <div class="col-md-12 mb-1" >
                                                        <fieldset>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span class="btn btn-primary" type="button">Seo Title</span>
                                                                </div>
                                                                <input type="text" class="form-control" placeholder="Seo Title"
                                                                       aria-label="Seo Title"
                                                                       name="seo_title">
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <hr>


                                                    {{-- Post Seo Description --}}
                                                    <div class="col-md-12 mb-1">
                                                        <div class="text-bold-500 font-medium-2 mb-1">
                                                            Seo Description
                                                        </div>
                                                        <fieldset>
                                                            <div class="input-group">

                                            <textarea class="form-control" placeholder="Seo Description"
                                                      aria-label="Seo Description"
                                                      name="seo_description"></textarea>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <hr>


                                                    {{-- Post Seo Keywords --}}
                                                    <div class="col-md-12 mb-1">
                                                        <div class="text-bold-500 font-medium-2 mb-1">
                                                            Seo Keywords
                                                        </div>
                                                        <fieldset>
                                                            <div class="input-group">

                                            <textarea class="form-control" placeholder="Seo Keywords"
                                                      aria-label="Seo Keywords"
                                                      name="seo_keyword"></textarea>
                                                            </div>
                                                        </fieldset>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row skin skin-square" style="margin-bottom: 20px">
                                        <div class="col-md-6 col-sm-12">
                                            <fieldset>
                                                <input type="checkbox" name="featured" id="input-11">
                                                <label for="input-11">مميز  </label>
                                            </fieldset>
                                        </div>
                                    </div>



                                    <div class="row skin skin-square" style="margin-bottom: 20px">
                                        <div class="col-md-6 col-sm-12">
                                            <fieldset>
                                                <input type="checkbox" name="status" id="input-12">
                                                <label for="input-12">نشر  </label>
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

