<nav
    class="header-navbar navbar-expand-md navbar navbar-with-menu navbar-without-dd-arrow fixed-top navbar-semi-light bg-info navbar-shadow">
    <div class="navbar-wrapper">
        <div class="navbar-header">

            <ul class="nav navbar-nav flex-row">
                <li class="nav-item mobile-menu d-md-none mr-auto"><a
                        class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i
                            class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item">
                    <a class="navbar-brand" href="index.html">
                        <img class="brand-logo" alt="modern admin logo"
                             src="{{url('public/metronic/assets/app/media/img/users/user4.jpg')}}">
                        <h3 class="brand-text">لوحه التحكم</h3>
                    </a>
                </li>
                <li class="nav-item d-md-none">
                    <a class="nav-link open-navbar-container" data-toggle="collapse" data-target="#navbar-mobile"><i
                            class="la la-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content">
            <div class="collapse navbar-collapse" id="navbar-mobile">
                <ul class="nav navbar-nav mr-auto float-left">
                    <li class="nav-item d-none d-md-block"><a class="nav-link nav-menu-main menu-toggle hidden-xs"
                                                              href="#"><i class="ft-menu"></i></a></li>

                </ul>
                <ul class="nav navbar-nav float-right">
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                <span class="mr-1">مرحبا
                  <span
                      class="user-name text-bold-700"> {{auth('admin')->user()->name}}</span>
                </span>
                            <span class="avatar avatar-online">
                  <img src="{{auth('admin')->user()->image_path}}" ></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
{{--                            <a class="dropdown-item" href=""><i--}}
{{--                                    class="ft-user"></i> تعديل الملف الشحصي </a>--}}
{{--                            <div class="dropdown-divider"></div>--}}
                            <form action="{{route('logout.admin')}}" method="post">
                                @csrf
                                <button class="dropdown-item">
                                    <i class="ft-power"></i> تسجيل
                                    الخروج
                                </button>
                            </form>
                        </div>
                    </li>





                    <li class="dropdown  nav-item">
                        <a class="nav-link nav-link-label" href="#" data-toggle="dropdown"><i class="ficon ft-globe"></i>
                        </a>

                        <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">

                                <!-- inner menu: contains the actual data -->

                                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                        <li class="dropdown-menu-header">
                                            <a class="dropdown-header m-0" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                <i class="ficon ft-en"></i>   {{ $properties['native'] }}
                                            </a>
                                        </li>
                                    @endforeach


                        </ul>
                    </li>




                </ul>

            </div>
        </div>
    </div>
</nav>
