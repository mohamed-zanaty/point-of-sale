<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            {{--Main --}}
            <li class="nav-item {{request()->segment(3) == '' ? 'active' : ''}}"><a href="{{route('admin.dashboard')}}"><i
                        class="la la-bar-chart-o"></i><span
                        class="menu-title" data-i18n="nav.add_on_drag_drop.main">{{__('site.main')}} </span></a>
            </li>


            @if (auth('admin')->user()->hasPermission('categories_read'))

                {{-- Category --}}
                <li class="nav-item {{request()->segment(3) == 'category' ? 'active' : ''}}"><a href=""><i
                            class="icon icon-grid"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">{{__('site.categories')}}  </span>
                        <span
                            class="badge badge badge-success badge-pill float-right mr-2">{{App\Models\Category::count()}}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="{{request()->segment(3) == 'category' && request()->segment(4) == '' ? 'active' : ''}}">
                            <a class="menu-item" href="{{route('category.index')}}"
                               data-i18n="nav.dash.ecommerce"> {{__('site.show')}} {{__('site.categories')}} </a>
                        </li>
                        @if (auth('admin')->user()->hasPermission('categories_create'))
                            <li class="{{request()->segment(3) == 'category' && request()->segment(4) == 'create' ? 'active' : ''}}">
                                <a class="menu-item" href="{{route('category.create')}}"
                                   data-i18n="nav.dash.crypto">{{__('site.add')}} {{__('site.category')}} </a>
                            </li>
                        @endif
                    </ul>
                </li>

            @endif


            {{-- Brands --}}
            @if (auth('admin')->user()->hasPermission('brands_read'))

                <li class="nav-item {{request()->segment(3) == 'brand'? 'active' : ''}}"><a href=""><i
                            class="icon icon-star"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">{{__('site.brands')}}  </span>
                        <span
                            class="badge badge badge-success badge-pill float-right mr-2">{{App\Models\Brand::count()}}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="{{request()->segment(3) == 'brand' && request()->segment(4) == '' ? 'active' : ''}}">
                            <a
                                class="menu-item" href="{{route('brand.index')}}"
                                data-i18n="nav.dash.ecommerce"> {{__('site.show')}} {{__('site.brand')}} </a>
                        </li>
                        @if (auth('admin')->user()->hasPermission('brands_create'))
                            <li class="{{request()->segment(3) == 'brand' && request()->segment(4) == 'create' ? 'active' : ''}}">
                                <a class="menu-item" href="{{route('brand.create')}}"
                                   data-i18n="nav.dash.crypto">{{__('site.add')}} {{__('site.brand')}} </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif


            {{-- Products --}}

            @if (auth('admin')->user()->hasPermission('products_read'))
                <li class="nav-item {{request()->segment(3) == 'product'  ? 'active' : ''}}"><a href=""><i
                            class="icon icon-handbag"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">{{__('site.products')}}  </span>
                        <span
                            class="badge badge badge-success badge-pill float-right mr-2">{{App\Models\Product::count()}}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="{{request()->segment(3) == 'product' && request()->segment(4) == '' ? 'active' : ''}}">
                            <a
                                class="menu-item" href="{{route('product.index')}}"
                                data-i18n="nav.dash.ecommerce">  {{__('site.show')}} {{__('site.products')}} </a>
                        </li>
                        @if (auth('admin')->user()->hasPermission('products_create'))
                            <li class="{{request()->segment(3) == 'product' && request()->segment(4) == 'create' ? 'active' : ''}}">
                                <a class="menu-item" href="{{route('product.create')}}" data-i18n="nav.dash.crypto">{{__('site.add')}} {{__('site.product')}}
                                     </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            {{-- Clients --}}
            @if (auth('admin')->user()->hasPermission('clients_read'))
                <li class="nav-item {{request()->segment(3) == 'client' ? 'active' : ''}}"><a href=""><i
                            class="la la-users"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">العملاء  </span>
                        <span
                            class="badge badge badge-success badge-pill float-right mr-2">{{App\Models\Client::count()}}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="{{request()->segment(3) == 'client' && request()->segment(4) == '' ? 'active' : ''}}">
                            <a
                                class="menu-item" href="{{route('client.index')}}"
                                data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                        </li>

                        @if (auth('admin')->user()->hasPermission('clients_create'))
                            <li class="{{request()->segment(3) == 'client' && request()->segment(4) == 'create' ? 'active' : ''}}">
                                <a class="menu-item" href="{{route('client.create')}}" data-i18n="nav.dash.crypto">أضافة
                                    عميل </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            {{-- orders --}}
            @if (auth('admin')->user()->hasPermission('orders_read'))
                <li class="nav-item {{request()->segment(3) == 'order' ? 'active' : ''}}"><a href=""><i
                            class="icon icon-printer"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">الفواتير  </span>
                        <span
                            class="badge badge badge-success badge-pill float-right mr-2">{{App\Models\Order::count()}}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="{{request()->segment(3) == 'order'  ? 'active' : ''}}"><a class="menu-item"
                                                                                             href="{{route('order.index')}}"
                                                                                             data-i18n="nav.dash.ecommerce">
                                عرض الكل </a>
                        </li>

                    </ul>
                </li>
            @endif

            {{-- Blog --}}
            @if (auth('admin')->user()->hasPermission('blog_read'))
                <li class="nav-item {{request()->segment(3) == 'blog' || request()->segment(4) == 'blog.get' ? 'active' : ''}}">
                    <a href=""><i class="la la-pencil"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">المدونه  </span>
                        <span
                            class="badge badge badge-success badge-pill float-right mr-2">{{App\Models\Blog::count()}}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="{{request()->segment(3) == 'blog' && request()->segment(4) == '' ? 'active' : ''}}">
                            <a
                                class="menu-item" href="{{route('blog.index')}}"
                                data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                        </li>

                        @if (auth('admin')->user()->hasPermission('blog_create'))
                            <li class="{{request()->segment(3) == 'blog' && request()->segment(4) == 'create' ? 'active' : ''}}">
                                <a class="menu-item " href="{{route('blog.create')}}" data-i18n="nav.dash.crypto">أضافة
                                    بوست </a>
                            </li>

                            <li class="{{request()->segment(3) == 'blog.get'  ? 'active' : ''}}"><a class="menu-item"
                                                                                                    href="{{route('blog.get')}}"
                                                                                                    data-i18n="nav.dash.crypto">
                                    البوستات المعلقه</a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            {{-- moderator --}}
            @if (auth('admin')->user()->hasPermission('users_read'))

                <li class="nav-item {{request()->segment(3) == 'moderator'  ? 'active' : ''}}"><a href=""><i
                            class="la la-user-secret"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">المشرفين  </span>
                        <span
                            class="badge badge badge-success badge-pill float-right mr-2">{{App\Models\Admin::whereRoleIs('admin')->count()}}</span>
                    </a>
                    <ul class="menu-content">
                        <li class="{{request()->segment(3) == 'moderator' && request()->segment(4) == '' ? 'active' : ''}}">
                            <a class="menu-item" href="{{route('moderator.index')}}"
                               data-i18n="nav.dash.ecommerce"> عرض الكل </a>
                        </li>
                        @if (auth('admin')->user()->hasPermission('users_create'))

                            <li class="{{request()->segment(3) == 'moderator' && request()->segment(4) == 'create' ? 'active' : ''}}">
                                <a class="menu-item" href="{{route('moderator.create')}}" data-i18n="nav.dash.crypto">أضافة
                                    مشرف </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif

            {{-- setting --}}
            @if (auth('admin')->user()->hasPermission('settings_read'))
                <li class="nav-item {{request()->segment(3) == 'setting' ? 'active' : ''}}"><a href=""><i
                            class="la la-cogs"></i>
                        <span class="menu-title" data-i18n="nav.dash.main">الاعدادت  </span>
                    </a>
                    <ul class="menu-content">
                        <li class="{{request()->segment(3) == 'setting' && request()->segment(4) == '' ? 'active' : ''}}">
                            <a
                                class="menu-item" href="{{route('setting.index')}}"
                                data-i18n="nav.dash.ecommerce"> عرض </a>
                        </li>
                    </ul>
                </li>
            @endif


        </ul>
    </div>
</div>
