<div id="sidebarMain" class="d-none">
    <aside class="js-navbar-vertical-aside navbar navbar-vertical-aside navbar-vertical navbar-vertical-fixed navbar-expand-xl navbar-bordered  ">
        <div class="navbar-vertical-container">
            <div class="navbar-brand-wrapper justify-content-between">
                <!-- Logo -->
                @php($store_logo = \App\Models\BusinessSetting::where(['key' => 'logo'])->first()->value)
                <a class="navbar-brand" href="{{ route('admin.dashboard') }}" aria-label="Front">
                       <img class="navbar-brand-logo initial--36 onerror-image onerror-image" data-onerror-image="{{ asset('public/assets/admin/img/160x160/img2.jpg') }}"
                    src="{{\App\CentralLogics\Helpers::onerror_image_helper($store_logo, asset('storage/app/public/business/').'/' . $store_logo, asset('public/assets/admin/img/160x160/img1.jpg') ,'business/' )}}"
                    alt="Logo">
                    <img class="navbar-brand-logo-mini initial--36 onerror-image onerror-image" data-onerror-image="{{ asset('public/assets/admin/img/160x160/img2.jpg') }}"
                    src="{{\App\CentralLogics\Helpers::onerror_image_helper($store_logo, asset('storage/app/public/business/').'/' . $store_logo, asset('public/assets/admin/img/160x160/img2.jpg') ,'business/' )}}"
                    alt="Logo">
                </a>
                <!-- End Logo -->

                <!-- Navbar Vertical Toggle -->
                <button type="button" class="js-navbar-vertical-aside-toggle-invoker navbar-vertical-aside-toggle btn btn-icon btn-xs btn-ghost-dark">
                    <i class="tio-clear tio-lg"></i>
                </button>
                <!-- End Navbar Vertical Toggle -->

                <div class="navbar-nav-wrap-content-left">
                    <!-- Navbar Vertical Toggle -->
                    <button type="button" class="js-navbar-vertical-aside-toggle-invoker close">
                        <i class="tio-first-page navbar-vertical-aside-toggle-short-align" data-toggle="tooltip"
                        data-placement="right" title="Collapse"></i>
                        <i class="tio-last-page navbar-vertical-aside-toggle-full-align"
                        data-template='<div class="tooltip d-none d-sm-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'></i>
                    </button>
                    <!-- End Navbar Vertical Toggle -->
                </div>

            </div>

            <!-- Content -->
            <div class="navbar-vertical-content" id="navbar-vertical-content" style="background-color:#003361;">
                <form class="sidebar--search-form" style="background-color:#003361;">
                    <div class="search--form-group">
                        <button type="button" class="btn"><i class="tio-search"></i></button>
                        <input type="text" class="form-control form--control" placeholder="{{ translate('Search Menu...') }}" id="search-sidebar-menu">
                    </div>
                </form>
                <ul class="navbar-nav navbar-nav-lg nav-tabs">
                    <!-- Dashboards -->
                    <li class="navbar-vertical-aside-has-menu {{ Request::is('admin') ? 'show active' : '' }}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.dashboard') }}?module_id={{Config::get('module.current_module_id')}}" title="{{ translate('messages.dashboard') }}">
                            <i class="tio-home-vs-1-outlined nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                {{ translate('messages.dashboard') }}
                            </span>
                        </a>
                    </li>
                    <!-- End Dashboards -->

                    <!-- Marketing section -->
                    {{-- <li class="nav-item">
                        <small class="nav-subtitle" title="{{ translate('messages.employee_handle') }}">{{ translate('pos section') }}</small>
                        <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                    </li> 
                    <!-- Pos -->
                    {{-- @if(\App\CentralLogics\Helpers::module_permission_check('pos'))
                    <li class="navbar-vertical-aside-has-menu {{Request::is('admin/pos*')?'active':''}}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link " href="{{route('admin.pos.index')}}" title="{{translate('New Sale')}}">
                            <i class="tio-shopping-basket-outlined nav-icon"></i>
                            <span class="text-truncate">{{translate('New Sale')}}</span>
                        </a>
                    </li>
                    @endif --}}
                    <!-- Pos -->

                    <li class="nav-item">
                        <small class="nav-subtitle" title="{{ translate('messages.item_section') }}">{{ translate('messages.fleet_management') }}</small>
                        <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                    </li>

                    <!-- Category -->
                    @if (\App\CentralLogics\Helpers::module_permission_check('category'))
                    <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/category*') ? 'active' : '' }}">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:" title="{{ translate('messages.categories') }}">
                                <i class="tio-category nav-icon"></i>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{ translate('messages.categories') }}</span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub"  style="display:{{ Request::is('admin/category*') ? 'block' : 'none' }}; background:#003361">
                                <li class="nav-item {{ request()->input('position') == 0 && Request::is('admin/category/add') ? 'active' : '' }}">
                                    <a class="nav-link " href="{{ route('admin.category.add',['position'=>0]) }}" title="{{ translate('messages.category') }}">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">{{ translate('messages.category') }}</span>
                                    </a>
                                </li>

                                {{-- <li class="nav-item {{ request()->input('position') == 1 && Request::is('admin/category/add') ? 'active' : '' }}">
                                    <a class="nav-link " href="{{ route('admin.category.add',['position'=>1]) }}" title="{{ translate('messages.sub_category') }}">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">{{ translate('messages.sub_category') }}</span>
                                    </a>
                                </li> --}}

                                {{-- <li class="nav-item {{ Request::is('admin/category/bulk-import') ? 'active' : '' }}">
                                    <a class="nav-link " href="{{ route('admin.category.bulk-import') }}" title="{{ translate('messages.bulk_import') }}">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate text-capitalize">{{ translate('messages.bulk_import') }}</span>
                                    </a>
                                </li> --}}
                                {{-- <li class="nav-item {{ Request::is('admin/category/bulk-export') ? 'active' : '' }}">
                                    <a class="nav-link " href="{{ route('admin.category.bulk-export-index') }}" title="{{ translate('messages.bulk_export') }}">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate text-capitalize">{{ translate('messages.bulk_export') }}</span>
                                    </a>
                                </li> --}}
                            </ul>
                        </li>
                @endif
                <!-- End Category -->

                <!-- Attributes -->
                {{-- @if (\App\CentralLogics\Helpers::module_permission_check('attribute'))
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/attribute*') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.attribute.add-new') }}" title="{{ translate('messages.attributes') }}">
                        <i class="tio-apps nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                            {{ translate('messages.attributes') }}
                        </span>
                    </a>
                </li>
                @endif --}}
                <!-- End Attributes -->

                <!-- Unit -->
                {{-- @if (\App\CentralLogics\Helpers::module_permission_check('unit'))
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/unit*') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.unit.index') }}" title="{{ translate('messages.units') }}">
                        <i class="tio-ruler nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate text-capitalize">
                            {{ translate('messages.units') }}
                        </span>
                    </a>
                </li>
                @endif --}}
                <!-- End Unit -->

                <!-- AddOn -->
                {{-- @if (\App\CentralLogics\Helpers::module_permission_check('addon'))
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/addon*') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:" title="{{ translate('messages.addons') }}">
                        <i class="tio-add-circle-outlined nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{ translate('messages.addons') }}</span>
                    </a>
                    <ul class="js-navbar-vertical-aside-submenu nav nav-sub" style="display:{{ Request::is('admin/addon*') ? 'block' : 'none' }}">
                        <li class="nav-item {{ Request::is('admin/addon/add-new') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.addon.add-new') }}" title="{{ translate('messages.addon_list') }}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate">{{ translate('messages.list') }}</span>
                            </a>
                        </li>

                        <li class="nav-item {{ Request::is('admin/addon/bulk-import') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.addon.bulk-import') }}" title="{{ translate('messages.bulk_import') }}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate text-capitalize">{{ translate('messages.bulk_import') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('admin/addon/bulk-export') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.addon.bulk-export-index') }}" title="{{ translate('messages.bulk_export') }}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate text-capitalize">{{ translate('messages.bulk_export') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif --}}
                <!-- End AddOn -->
                <!-- Products -->
                @if (\App\CentralLogics\Helpers::module_permission_check('item'))
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/item*') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:" title="{{ translate('Products ') }}">
                        <i class="tio-premium-outlined nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate text-capitalize">{{ translate('Products') }}</span>
                    </a>
                    <ul class="js-navbar-vertical-aside-submenu nav nav-sub" style="display:{{ Request::is('admin/item*') ? 'block' : 'none' }}">
                        <li class="nav-item {{ Request::is('admin/item/add-bike') || (Request::is('admin/item/edit/*') && (strpos(request()->fullUrl(), 'temp_product=1') == false && strpos(request()->fullUrl(), 'product_gellary=1') == false  ) ) ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.item.add.bike') }}" title="{{ translate('messages.list_bike') }}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate">{{ translate('messages.List Bike') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('admin/item/add-new') || (Request::is('admin/item/edit/*') && strpos(request()->fullUrl(), 'product_gellary=1') !== false  )  ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.item.add-new') }}" title="{{ translate('messages.add_new') }}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate">{{ translate('messages.add_vehicle') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('admin/item/list/all') || (Request::is('admin/item/edit/*') && (strpos(request()->fullUrl(), 'temp_product=1') == false && strpos(request()->fullUrl(), 'product_gellary=1') == false  ) ) ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.item.list',['all']) }}" title="{{ translate('messages.food_list') }}">
                           
                                <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate sidebar--badge-container">
                                        {{ translate('messages.all_vehicle') }} 
                                         <span class="badge badge-soft-info badge-pill ml-1">
                                            {{ \App\Models\Item::AllCount() }}  
                                        </span>
                                    </span>

                            </a>
                        </li>

                        <li class="nav-item {{ Request::is('admin/item/list/active') || (Request::is('admin/item/edit/*') && (strpos(request()->fullUrl(), 'temp_product=1') == false && strpos(request()->fullUrl(), 'product_gellary=1') == false  ) ) ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.item.list',['active']) }}" title="{{ translate('messages.food_list') }}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate sidebar--badge-container">
                                    {{ translate('messages.active_vehicle') }}
                                     <span class="badge badge-soft-success badge-pill ml-1">
                                        {{ \App\Models\Item::ActiveCount() }}  
                                    </span>
                                </span>
                            </a>
                        </li>

                        <li class="nav-item {{ Request::is('admin/item/list/inactive') || (Request::is('admin/item/edit/*') && (strpos(request()->fullUrl(), 'temp_product=1') == false && strpos(request()->fullUrl(), 'product_gellary=1') == false  ) ) ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.item.list',['inactive']) }}" title="{{ translate('messages.food_list') }}">
                               
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate sidebar--badge-container">
                                    {{ translate('messages.inactive_vehicle') }}
                                     <span class="badge badge-soft-warning badge-pill ml-1">
                                        {{ \App\Models\Item::InactiveCount() }}  
                                    </span>
                                </span>
                            </a>
                        </li>

                        <li class="nav-item {{ Request::is('admin/item/list/block') || (Request::is('admin/item/edit/*') && (strpos(request()->fullUrl(), 'temp_product=1') == false && strpos(request()->fullUrl(), 'product_gellary=1') == false  ) ) ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.item.list',['block']) }}" title="{{ translate('messages.food_list') }}">
                               
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate sidebar--badge-container">
                                    {{ translate('messages.block_vehicle') }}
                                     <span class="badge badge-soft-danger badge-pill ml-1">
                                        {{ \App\Models\Item::BlockedCount() }}  
                                    </span>
                                </span>
                            </a>
                        </li>
                       
                        @if (\App\CentralLogics\Helpers::get_mail_status('product_gallery'))
                        <li class="nav-item {{  Request::is('admin/item/product-gallery') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.item.product_gallery') }}" title="{{ translate('messages.Product_Gallery') }}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate">{{ translate('messages.Product_Gallery') }}</span>
                            </a>
                        </li>
                        @endif

                        @if (\App\CentralLogics\Helpers::get_mail_status('product_approval'))
                        <li class="nav-item {{ Request::is('admin/item/new/item/list') || (Request::is('admin/item/edit/*') && strpos(request()->fullUrl(), 'temp_product=1') !== false  ) ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.item.approval_list') }}" title="{{ translate('messages.New_Item_Request') }}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate">{{ translate('messages.New_Item_Request') }}</span>
                            </a>
                        </li>
                        @endif
                        {{-- <li class="nav-item {{ Request::is('admin/item/reviews') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.item.reviews') }}" title="{{ translate('messages.review_list') }}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate">{{ translate('messages.review') }}</span>
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item {{ Request::is('admin/item/bulk-import') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.item.bulk-import') }}" title="{{ translate('messages.bulk_import') }}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate text-capitalize">{{ translate('messages.bulk_import') }}</span>
                            </a>
                        </li> --}}
                        {{-- <li class="nav-item {{ Request::is('admin/item/bulk-export') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.item.bulk-export-index') }}" title="{{ translate('messages.bulk_export') }}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate text-capitalize">{{ translate('messages.bulk_export') }}</span>
                            </a>
                        </li> --}}
                    </ul>
                </li>
                @endif
                <!-- End Food -->

                                        <!-- Orders -->
                    @if (\App\CentralLogics\Helpers::module_permission_check('order'))
                    <li class="nav-item">
                        <small class="nav-subtitle">{{ translate('messages.Booking_management') }}</small>
                        <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                    </li>

                    <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/order') ? 'active' : '' }}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:" title="{{ translate('messages.orders') }}">
                            <i class="tio-shopping-cart nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                {{ translate('messages.booking') }}
                            </span>
                        </a>
                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub" style="display:{{ Request::is('admin/order*') ? 'block' : 'none' }}">
                            <li class="nav-item {{ Request::is('admin/order/list/all') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.order.list', ['all']) }}" title="{{ translate('messages.all_orders') }}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate sidebar--badge-container">
                                        {{ translate('messages.all_booking') }}
                                        <span class="badge badge-soft-info badge-pill ml-1">
                                            {{ \App\Models\Order::StoreOrder()->module(Config::get('module.current_module_id'))->count() }}
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('admin/order/list/confirmed') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('admin.order.list', ['confirmed']) }}" title="{{ translate('messages.confirmed') }}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate sidebar--badge-container">
                                        {{ translate('messages.confirmed_booking') }}
                                        <span class="badge badge-soft-info badge-pill ml-1">
                                            {{ \App\Models\Order::Confirmed()->StoreOrder()->module(Config::get('module.current_module_id'))->count() }}
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('admin/order/list/delivered') ? 'active' : '' }}">
                                <a class="nav-link " href="{{ route('admin.order.list', ['delivered']) }}" title="{{ translate('messages.pending_orders') }}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate sidebar--badge-container">
                                        {{ translate('messages.delivered_bookings') }}
                                        <span class="badge badge-soft-info badge-pill ml-1">
                                            {{ \App\Models\Order::Delivered()->OrderScheduledIn(30)->StoreOrder()->module(Config::get('module.current_module_id'))->count() }}
                                        </span>
                                    </span>
                                </a>
                            </li>

                            <li class="nav-item {{ Request::is('admin/order/list/return') ? 'active' : '' }}">
                                <a class="nav-link " href="{{ route('admin.order.list', ['return']) }}" title="{{ translate('messages.accepted_orders') }}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate sidebar--badge-container">
                                        {{ translate('messages.returned_bookings') }}
                                        <span class="badge badge-soft-success badge-pill ml-1">
                                            {{ \App\Models\Order::Return()->StoreOrder()->module(Config::get('module.current_module_id'))->count() }}
                                        </span>
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item {{ Request::is('admin/order/list/completed') ? 'active' : '' }}">
                                <a class="nav-link " href="{{ route('admin.order.list', ['completed']) }}" title="{{ translate('messages.processing_orders') }}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate sidebar--badge-container">
                                        {{ translate('messages.completed_bookings') }}
                                        <span class="badge badge-soft-warning badge-pill ml-1">
                                            {{ \App\Models\Order::Completed()->StoreOrder()->module(Config::get('module.current_module_id'))->count() }}
                                        </span>
                                    </span>
                                </a>
                            </li>
                            
                            <li class="nav-item {{ Request::is('admin/order/list/abandoned') ? 'active' : '' }}">
                                <a class="nav-link " href="{{ route('admin.order.list', ['abandoned']) }}" title="{{ translate('messages.processing_orders') }}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate sidebar--badge-container">
                                        {{ translate('messages.abandoned_bookings') }}
                                        <span class="badge badge-soft-warning badge-pill ml-1">
                                            {{ \App\Models\Order::Abandoned()->StoreOrder()->module(Config::get('module.current_module_id'))->count() }}
                                        </span>
                                    </span>
                                </a>
                            </li>

                            <li class="nav-item {{ Request::is('admin/order/list/Canceled') ? 'active' : '' }}">
                                <a class="nav-link " href="{{ route('admin.order.list', ['Canceled']) }}" title="{{ translate('messages.processing_orders') }}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate sidebar--badge-container">
                                        {{ translate('messages.cancelled_bookings') }}
                                        <span class="badge badge-soft-warning badge-pill ml-1">
                                            {{ \App\Models\Order::Canceled()->StoreOrder()->module(Config::get('module.current_module_id'))->count() }}
                                        </span>
                                    </span>
                                </a>
                            </li>
                            
                        </ul>
                    </li>

                    <!-- Order refund -->
                    <li
                    class="navbar-vertical-aside-has-menu {{ Request::is('admin/refund/*') ? 'active' : '' }}">
                    {{-- <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:"
                        title="{{ translate('Order Refunds') }}">
                        <i class="tio-receipt nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                            {{ translate('Order Refunds') }}
                        </span>
                    </a> --}}
                    <ul class="js-navbar-vertical-aside-submenu nav nav-sub"
                        style="display: {{ Request::is('admin/refund*') ? 'block' : 'none' }}">

                        <li class="nav-item {{ Request::is('admin/refund/requested') ||  Request::is('admin/refund/rejected') ||Request::is('admin/refund/refunded') ? 'active' : '' }}">
                            <a class="nav-link "
                                href="{{ route('admin.refund.refund_attr', ['requested']) }}"
                                title="{{ translate('Refund Requests') }} ">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate sidebar--badge-container">
                                    {{ translate('Refund Requests') }}
                                    <span class="badge badge-soft-danger badge-pill ml-1">
                                        {{ \App\Models\Order::Refund_requested()->StoreOrder()->module(Config::get('module.current_module_id'))->count() }}
                                    </span>
                                </span>
                            </a>
                        </li>

                         {{-- <li class="nav-item {{ Request::is('admin/refund/settings') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.refund.refund_settings') }}"
                                title="{{ translate('refund_settings') }}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate sidebar--badge-container">
                                    {{ translate('refund_settings') }}

                                </span>
                            </a>
                        </li> --}}
                    </ul>
                    </li>
                    <!-- Order refund End-->
                                        <!-- Attributes -->
                    {{-- @if (\App\CentralLogics\Helpers::module_permission_check('attribute')) --}}
                    {{-- <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/flash-sale*') ? 'active' : '' }}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.flash-sale.add-new') }}" title="{{ translate('messages.flash_sales') }}">
                            <i class="tio-apps nav-icon"></i>
                            <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                                {{ translate('messages.flash_sales') }}
                            </span>
                        </a>
                    </li> --}}
                    {{-- @endif --}}
                    <!-- End Attributes -->
                    @endif
                    <!-- End Orders -->

                <!-- Marketing section -->
                <li class="nav-item">
                    <small class="nav-subtitle" title="{{ translate('Promotion Management') }}">{{ translate('Promotion Management') }}</small>
                    <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                </li>
                <!-- Campaign -->
                {{-- @if (\App\CentralLogics\Helpers::module_permission_check('campaign'))
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/campaign') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:" title="{{ translate('messages.campaigns') }}">
                        <i class="tio-layers-outlined nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{ translate('messages.campaigns') }}</span>
                    </a>
                    <ul class="js-navbar-vertical-aside-submenu nav nav-sub" style="display:{{ Request::is('admin/campaign*') ? 'block' : 'none' }}">

                        <li class="nav-item {{ Request::is('admin/campaign/basic/*') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.campaign.list', 'basic') }}" title="{{ translate('messages.basic_campaigns') }}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate">{{ translate('messages.basic_campaigns') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('admin/campaign/item/*') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.campaign.list', 'item') }}" title="{{ translate('messages.item_campaigns') }}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate">{{ translate('messages.item_campaigns') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif --}}
                <!-- End Campaign -->
                <!-- Banner -->
                @if (\App\CentralLogics\Helpers::module_permission_check('banner'))
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/banner*') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.banner.add-new') }}" title="{{ translate('messages.banners') }}">
                        <i class="tio-image nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{ translate('messages.banners') }}</span>
                    </a>
                </li>
                {{-- <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/promotional-banner*') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.promotional-banner.add-new') }}" title="{{ translate('messages.other_banners') }}">
                        <i class="tio-image nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{ translate('messages.other_banners') }}</span>
                    </a>
                </li> --}}
                @endif
                <!-- End Banner -->
                <!-- Coupon -->
                {{-- @if (\App\CentralLogics\Helpers::module_permission_check('coupon'))
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/coupon*') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.coupon.add-new') }}" title="{{ translate('messages.coupons') }}">
                        <i class="tio-gift nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{ translate('messages.coupons') }}</span>
                    </a>
                </li>
                @endif --}}
                <!-- End Coupon -->
                <!-- Notification -->
                @if (\App\CentralLogics\Helpers::module_permission_check('notification'))
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/notification*') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.notification.add-new') }}" title="{{ translate('messages.push_notification') }}">
                        <i class="tio-notifications nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                            {{ translate('messages.push_notification') }}
                        </span>
                    </a>
                </li>
                @endif
                <!-- End Notification -->

                <!-- End marketing section -->




                <!-- Store Store -->
                <li class="nav-item">
                    <small class="nav-subtitle" title="{{ translate('messages.store_section') }}">{{ translate('messages.partner_management') }}</small>
                    <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                </li>

                @if (\App\CentralLogics\Helpers::module_permission_check('store'))

                    <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/store/pending-requests') ? 'active' : '' }}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.store.pending-requests') }}" title="{{ translate('messages.pending_requests') }}">
                            <span class="tio-calendar-note nav-icon"></span>
                            <span class="text-truncate position-relative overflow-visible">
                                {{ translate('messages.new_partner') }}
                                @php($new_str = \App\Models\Store::whereHas('vendor', function($query){
                                    return $query->where('status', null);
                                })->module(Config::get('module.current_module_id'))->get())
                                @if (count($new_str)>0)

                                <span class="btn-status btn-status-danger border-0 size-8px"></span>
                                @endif
                            </span>
                        </a>
                    </li>
                    <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/store/add') ? 'active' : '' }}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.store.add') }}" title="{{ translate('messages.add_store') }}">
                            <span class="tio-add-circle nav-icon"></span>
                            <span class="text-truncate">
                                {{ translate('messages.add_partner') }}
                            </span>
                        </a>
                    </li>
                    <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/store/list') ? 'active' : '' }}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.store.list') }}" title="{{ translate('messages.partner_list') }}">
                            <span class="tio-layout nav-icon"></span>
                            <span class="text-truncate">{{ translate('messages.view') }}
                                {{ translate('partners') }}</span>
                        </a>
                    </li>
                    {{-- <li class="navbar-item {{ Request::is('admin/store/recommended-store') ? 'active' : '' }}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.store.recommended_store') }}" title="{{ translate('messages.pending_requests') }}">
                            <span class="tio-hot  nav-icon"></span>
                            <span class="text-truncate text-capitalize">{{ translate('Recommended_Store') }}</span>
                        </a>
                    </li> --}}
                    {{-- <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/store/bulk-import') ? 'active' : '' }}">
                        <a class="nav-link " href="{{ route('admin.store.bulk-import') }}" title="{{ translate('messages.bulk_import') }}">
                            <span class="tio-publish nav-icon"></span>
                            <span class="text-truncate text-capitalize">{{ translate('messages.bulk_import') }}</span>
                        </a>
                    </li> --}}
                    {{-- <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/store/bulk-export') ? 'active' : '' }}">
                        <a class="nav-link " href="{{ route('admin.store.bulk-export-index') }}" title="{{ translate('messages.bulk_export') }}">
                            <span class="tio-download-to nav-icon"></span>
                            <span class="text-truncate text-capitalize">{{ translate('messages.bulk_export') }}</span>
                        </a>
                    </li> --}}
                @endif
                <!-- End Store -->

                {{-- Station Management --}}
                @if (\App\CentralLogics\Helpers::module_permission_check('station'))
                <li class="nav-item">
                    <small class="nav-subtitle" title="{{ translate('messages.store_section') }}">{{ translate('messages.Station_management') }}</small>
                    <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                </li>
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/store/station') ? 'active' : '' }}" >
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.store.station') }}">
                        <span class="tio-add-circle nav-icon"></span>
                        <span class="text-truncate">
                            {{ translate('messages.add_hub_station') }}
                        </span> 
                    </a>
                </li>

                <li class="navbar-vertical-aside-has-menu">
                    <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:">
                        <span class="tio-layout nav-icon"></span>
                        <span class="text-truncate">{{ translate('messages.station') }}
                            {{ translate('list') }}</span>
                    </a>

                    <ul class="js-navbar-vertical-aside-submenu nav nav-sub" style="display:{{ Request::is('admin/store*') ? 'block' : 'none' }}">

                        <li class="nav-item {{Request::is('admin/store/station/list')  || (Request::is('admin/item/edit/*') && (strpos(request()->fullUrl(), 'temp_product=1') == false && strpos(request()->fullUrl(), 'product_gellary=1') == false  ) ) ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.store.station-list') }}" >
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate">{{ translate('messages.total_hub_station') }}</span>
                            </a>
                        </li>

                        <li class="nav-item {{ Request::is('admin/store/station/list') || (Request::is('admin/item/edit/*') && strpos(request()->fullUrl(), 'product_gellary=1') !== false  )  ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.item.add-new') }}" title="{{ translate('messages.add_new') }}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate">{{ translate('messages.active_stations') }}</span>
                            </a>
                        </li>

                        <li class="nav-item {{ Request::is('admin/store/station/list') || (Request::is('admin/item/edit/*') && (strpos(request()->fullUrl(), 'temp_product=1') == false && strpos(request()->fullUrl(), 'product_gellary=1') == false  ) ) ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.item.list',['all']) }}" title="{{ translate('messages.food_list') }}">
                           
                                <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate sidebar--badge-container">
                                        {{ translate('messages.inactive_stations') }} 
                                       
                                    </span>

                            </a>
                        </li>
                    </ul>
                </li>

                @endif

                {{-- Customer Management --}}
                @if (\App\CentralLogics\Helpers::module_permission_check('customer_management'))
                <li class="nav-item">
                    <small class="nav-subtitle" title="{{ translate('messages.customer_section') }}">{{ translate('messages.customer_management') }}</small>
                    <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                </li>
                <!-- Custommer -->
                <li class="navbar-vertical-aside-has-menu {{ (Request::is('admin/users/customer/user_kyc')) ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{route('admin.users.customer.customer-kyc')}}" title="{{ translate('messages.customers') }}">
                        <i class="tio-receipt nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                            {{ translate('messages.customers kyc') }}
                        </span>
                    </a>
                </li>

                <li class="navbar-vertical-aside-has-menu {{ (Request::is('admin/users/customer/list') || Request::is('admin/users/customer/view*')) ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.users.customer.list') }}" title="{{ translate('messages.customers') }}">
                        <i class="tio-poi-user nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                            {{ translate('messages.customers') }}
                        </span>
                    </a>
                </li>

                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/users/contact/contact-list') ? 'active' : '' }}">
                    <a class="nav-link " href="{{ route('admin.users.contact.contact-list') }}" title="{{ translate('messages.contact_messages') }}">
                        <span class="tio-message nav-icon"></span>
                        <span class="text-truncate">{{ translate('messages.contact_messages') }}</span>
                    </a>
                </li>

                @endif

                <!-- DeliveryMan -->
                @if (\App\CentralLogics\Helpers::module_permission_check('deliveryman'))
                <li class="nav-item">
                    <small class="nav-subtitle" title="{{ translate('messages.deliveryman_section') }}">{{ translate('messages.deliveryman_management') }}</small>
                    <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                </li>
                <li
                    class="navbar-vertical-aside-has-menu {{ Request::is('admin/users/delivery-man/vehicle*') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link"
                        href="{{ route('admin.users.delivery-man.vehicle.list') }}"
                        title="{{ translate('messages.vehicles_category') }}">
                        <i class="tio-car nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                            {{ translate('messages.vehicles_category') }}
                        </span>
                    </a>
                </li>
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/users/delivery-man/add') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.users.delivery-man.add') }}" title="{{ translate('messages.add_delivery_man') }}">
                        <i class="tio-running nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                            {{ translate('messages.add_delivery_man') }}
                        </span>
                    </a>
                </li>
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/users/delivery-man/new') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.users.delivery-man.new') }}" title="{{ translate('messages.new_delivery_man') }}">
                        <i class="tio-man nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                            {{ translate('messages.new_delivery_man') }}
                        </span>
                    </a>
                </li>
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/users/delivery-man') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.users.delivery-man.list') }}" title="{{ translate('messages.deliveryman_list') }}">
                        <i class="tio-filter-list nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                            {{ translate('messages.deliveryman_list') }}
                        </span>
                    </a>
                </li>
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/users/delivery-man/reviews') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.users.delivery-man.reviews.list') }}" title="{{ translate('messages.reviews') }}">
                        <i class="tio-star-outlined nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                            {{ translate('messages.reviews') }}
                        </span>
                    </a>
                </li>
                @endif
                <!-- End DeliveryMan -->

                <!-- Employee-->

                <li class="nav-item">
                    <small class="nav-subtitle" title="{{ translate('messages.employee_handle') }}">{{ translate('messages.employee') }}
                        {{ translate('management') }}</small>
                    <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                </li>

                @if (\App\CentralLogics\Helpers::module_permission_check('custom_role'))
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/users/custom-role*') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.users.custom-role.create') }}" title="{{ translate('messages.employee_Role') }}">
                        <i class="tio-incognito nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{ translate('messages.employee_Role') }}</span>
                    </a>
                </li>
                @endif

                @if (\App\CentralLogics\Helpers::module_permission_check('employee'))
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/users/employee*') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:" title="{{ translate('messages.Employee') }}">
                        <i class="tio-user nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{ translate('messages.employees') }}</span>
                    </a>
                    <ul class="js-navbar-vertical-aside-submenu nav nav-sub"  style="display:{{ Request::is('admin/users/employee*') ? 'block' : 'none' }}">
                        <li class="nav-item {{ Request::is('admin/users/employee/store') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.users.employee.add-new') }}" title="{{ translate('messages.add_new_Employee') }}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate">{{ translate('messages.add_new') }}</span>
                            </a>
                        </li>
                        <li class="nav-item {{ Request::is('admin/users/employee/') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.users.employee.list') }}" title="{{ translate('messages.Employee_list') }}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate">{{ translate('messages.list') }}</span>
                            </a>
                        </li>

                    </ul>
                </li>
                @endif
                <!-- End Employee -->

                <!-- Report -->
                @if (\App\CentralLogics\Helpers::module_permission_check('report'))
                <li class="nav-item">
                    <small class="nav-subtitle" title="{{ translate('messages.report_and_analytics') }}">{{ translate('messages.report_management') }}</small>
                    <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                </li>

                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/transactions/report/day-wise-report') ? 'active' : '' }}">
                    <a class="nav-link " href="{{ route('admin.transactions.report.day-wise-report') }}" title="{{ translate('messages.transection_report') }}">
                        <span class="tio-chart-pie-1 nav-icon"></span>
                        <span class="text-truncate">{{ translate('messages.transaction_report') }}</span>
                    </a>
                </li>

                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/transactions/report/order-report') ? 'active' : '' }}">
                    <a class="nav-link " href="{{ route('admin.transactions.report.order-report') }}" title="{{ translate('messages.order_report') }}">
                        <span class="tio-chart-bar-4 nav-icon"></span>
                        <span class="text-truncate text-capitalize">{{ translate('messages.order_report') }}</span>
                    </a>
                </li>
                @endif

                <!-- Business Settings -->
                <li class="nav-item">
                    <small class="nav-subtitle" title="{{ translate('messages.business_settings') }}">{{ translate('messages.branch_management') }}</small>
                    <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                </li>
                @if (\App\CentralLogics\Helpers::module_permission_check('zone'))
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/business-settings/zone*') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{ route('admin.business-settings.zone.home') }}" title="{{ translate('messages.zone_setup') }}">
                        <i class="tio-city nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                            {{ translate('messages.zone_setup') }} </span>
                    </a>
                </li>
                @endif

                @if (\App\CentralLogics\Helpers::module_permission_check('settings'))
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/business-settings/business-setup*') || Request::is('admin/business-settings/language*') ? 'active' : '' }}">
                    <a class="nav-link " href="{{ route('admin.business-settings.business-setup') }}" title="{{ translate('messages.business_setup') }}">
                        <span class="tio-settings nav-icon"></span>
                        <span class="text-truncate">{{ translate('messages.business_settings') }}</span>
                    </a>
                </li>
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/business-settings/pages*') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:" title="{{ translate('messages.pages_setup') }}">
                        <i class="tio-pages nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{ translate('messages.pages_&_social_media') }}</span>
                    </a>
                    <ul class="js-navbar-vertical-aside-submenu nav nav-sub"  style="display:{{ Request::is('admin/business-settings/pages*') ? 'block' : 'none' }}">

                        <li class="navbar-vertical-aside-has-menu {{Request::is('admin/business-settings/pages/social-media')?'active':''}}">
                            <a class="nav-link " href="{{route('admin.business-settings.social-media.index')}}" title="{{translate('messages.Social Media')}}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate">{{translate('messages.Social Media')}}</span>
                            </a>
                        </li>

                        <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/business-settings/pages/admin-landing-page-settings*') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.business-settings.admin-landing-page-settings','fixed-data') }}" title="{{ translate('messages.admin_landing_page_settings') }}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate">{{ translate('messages.admin_landing_page') }}</span>
                            </a>
                        </li>
                        {{-- <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/business-settings/pages/react-landing-page-settings*') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.business-settings.react-landing-page-settings','header') }}" title="{{ translate('messages.react_landing_page') }}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate">{{ translate('messages.react_landing_page') }}</span>
                            </a>
                        </li> --}}
                        <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/business-settings/pages/flutter-landing-page-settings*') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.business-settings.flutter-landing-page-settings','fixed-data') }}" title="{{ translate('messages.flutter_landing_page') }}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate">{{ translate('messages.flutter_landing_page') }}</span>
                            </a>
                        </li>

                        <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/business-settings/pages/business-page*') ? 'active' : '' }}">
                            <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:" title="{{ translate('messages.business_pages') }}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{ translate('messages.business_pages') }}</span>
                            </a>
                            <ul class="js-navbar-vertical-aside-submenu nav nav-sub"  style="display:{{ Request::is('admin/business-settings/pages/business-page*') ? 'block' : 'none' }}">
                                <li class="nav-item {{ Request::is('admin/business-settings/pages/business-page/terms-and-conditions') ? 'active' : '' }}">
                                    <a class="nav-link " href="{{ route('admin.business-settings.terms-and-conditions') }}" title="{{ translate('messages.terms_and_condition') }}">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">{{ translate('messages.terms_and_condition') }}</span>
                                    </a>
                                </li>

                                <li class="nav-item {{ Request::is('admin/business-settings/pages/business-page/privacy-policy') ? 'active' : '' }}">
                                    <a class="nav-link " href="{{ route('admin.business-settings.privacy-policy') }}" title="{{ translate('messages.privacy_policy') }}">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">{{ translate('messages.privacy_policy') }}</span>
                                    </a>
                                </li>

                                <li class="nav-item {{ Request::is('admin/business-settings/pages/business-page/about-us') ? 'active' : '' }}">
                                    <a class="nav-link " href="{{ route('admin.business-settings.about-us') }}" title="{{ translate('messages.about_us') }}">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">{{ translate('messages.about_us') }}</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ Request::is('admin/business-settings/pages/business-page/refund') ? 'active' : '' }}">
                                    <a class="nav-link " href="{{ route('admin.business-settings.refund') }}" title="{{ translate('messages.Refund Policy') }}">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">{{ translate('Refund Policy') }}</span>
                                    </a>
                                </li>

                                <li class="nav-item {{ Request::is('admin/business-settings/pages/business-page/cancelation') ? 'active' : '' }}">
                                    <a class="nav-link " href="{{ route('admin.business-settings.cancelation') }}" title="{{ translate('messages.Cancelation Policy') }}">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">{{ translate('Cancelation Policy') }}</span>
                                    </a>
                                </li>


                                <li class="nav-item {{ Request::is('admin/business-settings/pages/business-page/shipping-policy') ? 'active' : '' }}">
                                    <a class="nav-link " href="{{ route('admin.business-settings.shipping-policy') }}" title="{{ translate('messages.shipping_policy') }}">
                                        <span class="tio-circle nav-indicator-icon"></span>
                                        <span class="text-truncate">{{ translate('Shipping Policy') }}</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <small class="nav-subtitle" title="{{ translate('messages.business_settings') }}">{{ translate('messages.system_management') }}</small>
                    <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                </li>
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/business-settings/third-party*') || Request::is('admin/business-settings/fcm*') || Request::is('admin/business-settings/login-url-setup*') || Request::is('admin/business-settings/offline-payment*') ? 'active' : '' }}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:" title="{{ translate('messages.3rd_party_&_configurations') }}">
                        <span class="nav-icon tio-account-square-outlined"></span>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{ translate('messages.3rd_party_&_configurations') }}</span>
                    </a>
                    <ul class="js-navbar-vertical-aside-submenu nav nav-sub"  style="display:{{ Request::is('admin/business-settings/third-party*')|| Request::is('admin/business-settings/fcm*') ||Request::is('admin/business-settings/login-url-setup*') || Request::is('admin/business-settings/offline-payment*') ? 'block' : 'none' }}">
                        <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/business-settings/third-party*') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.business-settings.third-party.payment-method') }}" title="{{ translate('messages.3rd_party') }}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate">{{ translate('messages.3rd_party') }}</span>
                            </a>
                        </li>
                        <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/business-settings/fcm*') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.business-settings.fcm-index') }}" title="{{ translate('messages.firebase_notification') }}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate">{{ translate('messages.firebase_notification') }}</span>
                            </a>
                        </li>
                        <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/business-settings/login-url-setup*') ? 'active' : '' }}">
                            <a class="nav-link " href="{{ route('admin.business-settings.login_url_page') }}" title="{{ translate('messages.login_url_page') }}">
                                <span class="tio-circle nav-indicator-icon"></span>
                                <span class="text-truncate">{{ translate('messages.login_url_page') }}</span>
                            </a>
                        </li>
                        @if (\App\CentralLogics\Helpers::get_mail_status('offline_payment_status'))
                            <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/business-settings/offline*') ? 'active' : '' }}">
                                <a class="nav-link " href="{{ route('admin.business-settings.offline') }}" title="{{ translate('messages.Offline_Payment_Setup') }}">
                                    <span class="tio-circle nav-indicator-icon"></span>
                                    <span class="text-truncate">{{ translate('messages.Offline_Payment_Setup') }}</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/business-settings/email-setup*') ? 'active' : '' }}">
                    <a class="nav-link " href="{{ route('admin.business-settings.email-setup',['admin','forgot-password']) }}" title="{{ translate('messages.email_template') }}">
                        <span class="tio-email nav-icon"></span>
                        <span class="text-truncate">{{ translate('messages.email_template') }}</span>
                    </a>
                </li>
                <li class="navbar-vertical-aside-has-menu {{ Request::is('admin/business-settings/app-settings*') ? 'active' : '' }}">
                    <a class="nav-link " href="{{ route('admin.business-settings.app-settings') }}" title="{{ translate('messages.app_settings') }}">
                        <span class="tio-android nav-icon"></span>
                        <span class="text-truncate">{{ translate('messages.app_settings') }}</span>
                    </a>
                </li>

                <li class="navbar-vertical-aside-has-menu {{Request::is('admin/business-settings/db-index')?'active':''}}">
                    <a class="js-navbar-vertical-aside-menu-link nav-link" href="{{route('admin.business-settings.db-index')}}" title="{{translate('messages.clean_database')}}">
                        <i class="tio-cloud nav-icon"></i>
                        <span class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">
                            {{translate('messages.clean_database')}}
                        </span>
                    </a>
                </li>
                @endif

                @if(count(config('addon_admin_routes'))>0)
                    <li class="nav-item">
                        <small
                            class="nav-subtitle">{{translate('messages.addon_menus')}}</small>
                        <small class="tio-more-horizontal nav-subtitle-replacer"></small>
                    </li>
                    <li class="navbar-vertical-aside-has-menu {{Request::is('admin/payment/configuration/*') || Request::is('admin/sms/configuration/*')?'active':''}}">
                        <a class="js-navbar-vertical-aside-menu-link nav-link nav-link-toggle" href="javascript:" >
                            <i class="tio-puzzle nav-icon"></i>
                            <span  class="navbar-vertical-aside-mini-mode-hidden-elements text-truncate">{{translate('Addon Menus')}}</span>
                        </a>
                        <ul class="js-navbar-vertical-aside-submenu nav nav-sub" style="display: {{Request::is('admin/payment/configuration/*') || Request::is('admin/sms/configuration/*')?'block':'none'}}">
                            @foreach(config('addon_admin_routes') as $routes)
                                @foreach($routes as $route)
                                    <li class="navbar-vertical-aside-has-menu {{Request::is($route['path'])  ? 'active' :''}}">
                                        <a class="js-navbar-vertical-aside-menu-link nav-link "
                                        href="{{ $route['url'] }}" title="{{ translate($route['name']) }}">
                                            <span class="tio-circle nav-indicator-icon"></span>
                                            <span class="text-truncate">{{ translate($route['name']) }}</span>
                                        </a>
                                    </li>
                                @endforeach
                            @endforeach
                        </ul>
                    </li>
                @endif


                <li class="nav-item py-5">

                </li>
                <li class="__sidebar-hs-unfold px-2" id="tourb-9">
                    <div class="hs-unfold w-100">
                        <a class="js-hs-unfold-invoker navbar-dropdown-account-wrapper" href="javascript:;"
                            data-hs-unfold-options='{
                                    "target": "#accountNavbarDropdown",
                                    "type": "css-animation"
                                }'>
                            <div class="cmn--media right-dropdown-icon d-flex align-items-center">
                                <div class="avatar avatar-sm avatar-circle">
                                   <img class="avatar-img onerror-image"
                                    data-onerror-image="{{asset('public/assets/admin/img/160x160/img1.jpg')}}"

                                    src="{{\App\CentralLogics\Helpers::onerror_image_helper(auth('admin')->user()->image, asset('storage/app/public/admin/').'/'.auth('admin')->user()->image, asset('public/assets/admin/img/160x160/img1.jpg') ,'admin/')}}"

                                    alt="Image Description">
                                    <span class="avatar-status avatar-sm-status avatar-status-success"></span>
                                </div>
                                <div class="media-body pl-3">
                                    <span class="card-title h5">
                                        {{auth('admin')->user()->f_name}}
                                        {{auth('admin')->user()->l_name}}
                                    </span>
                                    <span class="card-text">{{auth('admin')->user()->email}}</span>
                                </div>
                            </div>
                        </a>

                        <div id="accountNavbarDropdown"
                                class="hs-unfold-content dropdown-unfold dropdown-menu dropdown-menu-right navbar-dropdown-menu navbar-dropdown-account min--240">
                            <div class="dropdown-item-text">
                                <div class="media align-items-center">
                                    <div class="avatar avatar-sm avatar-circle mr-2">
                                        <img class="avatar-img onerror-image"
                                    data-onerror-image="{{asset('public/assets/admin/img/160x160/img1.jpg')}}"

                                    src="{{\App\CentralLogics\Helpers::onerror_image_helper(auth('admin')->user()->image, asset('storage/app/public/admin/').'/'.auth('admin')->user()->image, asset('public/assets/admin/img/160x160/img1.jpg') ,'admin/')}}"

                                    alt="Image Description">
                                    </div>
                                    <div class="media-body">
                                        <span class="card-title h5">{{auth('admin')->user()->f_name}}</span>
                                        <span class="card-text">{{auth('admin')->user()->email}}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown-divider"></div>

                            <a class="dropdown-item" href="{{route('admin.settings')}}">
                                <span class="text-truncate pr-2" title="Settings">{{translate('messages.settings')}}</span>
                            </a>

                            <div class="dropdown-divider"></div>

                           <a class="dropdown-item log-out" href="javascript:">
                                <span class="text-truncate pr-2" title="Sign out">{{translate('messages.sign_out')}}</span>
                            </a>
                        </div>
                    </div>
                </li>
                </ul>
            </div>
            <!-- End Content -->
        </div>
    </aside>
</div>

<div id="sidebarCompact" class="d-none">

</div>


@push('script_2')
<script>
    $(window).on('load' , function() {
        if($(".navbar-vertical-content li.active").length) {
            $('.navbar-vertical-content').animate({
                scrollTop: $(".navbar-vertical-content li.active").offset().top - 150
            }, 10);
        }
    });

    var $rows = $('#navbar-vertical-content li');
    $('#search-sidebar-menu').keyup(function() {
        var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();

        $rows.show().filter(function() {
            var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
            return !~text.indexOf(val);
        }).hide();
    });
</script>
@endpush
