@extends('layouts.dashboard')

@section('content')
    <div class="app-content content">
        <div class="content-wrapper">

            <div class="row">
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="info">{{$categories}}</h3>
                                        <h6>categories</h6>
                                    </div>
                                    <div>
                                        <i class="icon-basket-loaded info font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-info" role="progressbar"
                                         style="width: {{$categories}}%"
                                         aria-valuenow="{{$categories}}" aria-valuemin="0" aria-valuemax="20"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="warning">{{$brands}}</h3>
                                        <h6>brands</h6>
                                    </div>
                                    <div>
                                        <i class="icon-pie-chart warning font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-warning" role="progressbar"
                                         style="width: {{$brands}}%"
                                         aria-valuenow="{{$brands}}" aria-valuemin="0" aria-valuemax="40"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="success">{{$clients}}</h3>
                                        <h6>clients</h6>
                                    </div>
                                    <div>
                                        <i class="icon-user-follow success font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-success" role="progressbar"
                                         style="width: {{$clients}}%"
                                         aria-valuenow="{{$clients}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="success">{{$posts}}</h3>
                                        <h6>posts</h6>
                                    </div>
                                    <div>
                                        <i class="icon-power success font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-success" role="progressbar"
                                         style="width: {{$posts}}%"
                                         aria-valuenow="{{$posts}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="success">{{$orders}}</h3>
                                        <h6>orders</h6>
                                    </div>
                                    <div>
                                        <i class="icon-wallet success font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-success" role="progressbar"
                                         style="width: {{$orders}}%"
                                         aria-valuenow="{{$orders}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="success">{{$admins}}</h3>
                                        <h6>moderators</h6>
                                    </div>
                                    <div>
                                        <i class="icon-users success font-large-2 float-right"></i>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="danger">{{$products}}</h3>
                                        <h6>products</h6>
                                    </div>
                                    <div>
                                        <i class="icon-heart danger font-large-2 float-right"></i>
                                    </div>
                                </div>
                                <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                                    <div class="progress-bar bg-gradient-x-danger" role="progressbar"
                                         style="width: {{$products}}%"
                                         aria-valuenow="{{$products}}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="text-center">
                    <h2 class="">الاحصائيات :</h2>
                </div>

                <div class="chart" id="line-chart" style="height: 250px;">

                </div>

                <!-- /.box-body -->
            </div>

        </div>
    </div>
@endsection

@push('scripts')
    <script>

        //line chart
        var line = new Morris.Line({
            element: 'line-chart',
            resize: true,
            data: [
                    @foreach ($sales_data as $data)
                {
                    ym: "{{ $data->year }}-{{ $data->month }}", sum: "{{ $data->sum }}"
                },
                @endforeach
            ],
            xkey: 'ym',
            ykeys: ['sum'],
            labels: ['@lang('site.total')'],
            lineWidth: 2,
            hideHover: 'auto',
            gridStrokeWidth: 0.4,
            pointSize: 4,
            gridTextFamily: 'Open Sans',
            gridTextSize: 10
        });
    </script>

@endpush
