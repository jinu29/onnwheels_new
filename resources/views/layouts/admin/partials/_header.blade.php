<div id="headerMain" class="d-none">
    <header id="header"
        class="navbar navbar-expand-lg navbar-fixed navbar-height navbar-flush navbar-container navbar-bordered pr-0">
        <div class="navbar-nav-wrap">

            <div class="navbar-nav-wrap-content-left d-xl-none">
                <!-- Navbar Vertical Toggle -->
                <button type="button" class="js-navbar-vertical-aside-toggle-invoker close mr-3">
                    <i class="tio-first-page navbar-vertical-aside-toggle-short-align" data-toggle="tooltip"
                        data-placement="right" title="Collapse"></i>
                    <i class="tio-last-page navbar-vertical-aside-toggle-full-align"
                        data-template='<div class="tooltip d-none d-sm-block" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
                        data-toggle="tooltip" data-placement="right" title="Expand"></i>
                </button>
                <!-- End Navbar Vertical Toggle -->
            </div>

            <!-- Secondary Content -->
            <div class="navbar-nav-wrap-content-right flex-grow-1 w-0">
                <!-- Navbar -->
                <ul class="navbar-nav align-items-center justify-content-between flex-row flex-grow-1 __navbar-nav" style="color:#003361;">

                    {{-- <li class="nav-item __nav-item">
                        <a href="{{ route('admin.users.dashboard') }}" id="tourb-6"
                            class="__nav-link {{ Request::is('admin/users*') ? 'active' : '' }}">
                            <img src="{{ asset('/public/assets/admin/img/new-img/user.svg') }}" alt="public/img">
                            <span style="color:#003361;">{{ translate('Customer Management') }}</span>
                        </a>
                    </li> --}}

                    {{-- <li class="nav-item __nav-item">
                        <a href="{{ route('admin.transactions.report.day-wise-report') }}" id="tourb-7"
                            class="__nav-link {{ Request::is('admin/transactions*') ? 'active' : '' }}">
                            <img src="{{ asset('/public/assets/admin/img/new-img/transaction-and-report.svg') }}"
                                alt="public/img">
                            <span>{{ translate('Transactions & Reports') }}</span>
                        </a>
                    </li> --}}

                    {{-- <li class="nav-item __nav-item">
                        <a href="{{ route('admin.business-settings.business-setup') }}" id="tourb-3"
                            class="__nav-link {{ Request::is('admin/business-settings*') ? 'active' : '' }}">
                            <img src="{{ asset('/public/assets/admin/img/new-img/setting-icon.svg') }}"
                                alt="public/img">
                            <span>{{ translate('messages.Business Module System Setup') }}</span>
                            <svg width="14" viewBox="0 0 14 14" fill="none">
                                <path d="M2.33325 5.25L6.99992 9.91667L11.6666 5.25" stroke="#006161" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                        <div class="__nav-module" id="tourb-4">
                            <div class="__nav-module-header">
                                <div class="inner">
                                    <h4>{{ translate('Settings') }}</h4>
                                    <p>
                                        {{ translate('Monitor your business general settings from here') }}
                                    </p>
                                </div>
                            </div>
                            <div class="__nav-module-body">
                                <ul>
                                    @if (\App\CentralLogics\Helpers::module_permission_check('module'))
                                        <li>
                                            <a href="{{ route('admin.business-settings.module.index') }}"
                                                class="next-tour">
                                                <img src="{{ asset('/public/assets/admin/img/navbar-setting-icon/module.svg') }}"
                                                    alt="">
                                                <span>{{ translate('System Module Setup') }}</span>
                                            </a>
                                        </li>
                                    @endif
                                    @if (\App\CentralLogics\Helpers::module_permission_check('zone'))
                                        <li>
                                            <a href="{{ route('admin.business-settings.zone.home') }}"
                                                class="next-tour">
                                                <img src="{{ asset('/public/assets/admin/img/navbar-setting-icon/location.svg') }}"
                                                    alt="">
                                                <span>{{ translate('Zone Setup') }}</span>
                                            </a>
                                        </li>
                                    @endif
                                    @if (\App\CentralLogics\Helpers::module_permission_check('settings'))
                                        <li>
                                            <a href="{{ route('admin.business-settings.business-setup') }}"
                                                class="next-tour">
                                                <img src="{{ asset('/public/assets/admin/img/navbar-setting-icon/business.svg') }}"
                                                    alt="">
                                                <span>{{ translate('Business Settings') }}</span>
                                            </a>
                                        </li>
                                    @endif
                                    @if (\App\CentralLogics\Helpers::module_permission_check('settings'))
                                        <li>
                                            <a href="{{ route('admin.business-settings.third-party.payment-method') }}"
                                                class="next-tour">
                                                <img src="{{ asset('/public/assets/admin/img/navbar-setting-icon/third-party.svg') }}"
                                                    alt="">
                                                <span>{{ translate('3rd Party') }}</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('admin.business-settings.social-media.index') }}"
                                                class="next-tour">
                                                <img src="{{ asset('/public/assets/admin/img/navbar-setting-icon/social.svg') }}"
                                                    alt="">
                                                <span>{{ translate('Social Media and Page Setup') }}</span>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                                <div class="text-center mt-2">
                                    <a href="{{ route('admin.business-settings.business-setup') }}"
                                        class="next-tour">{{ translate('View All') }}</a>
                                </div>
                            </div>
                        </div>
                    </li> --}}
                    {{-- @if (\App\CentralLogics\Helpers::module_permission_check('order'))
                        <li class="nav-item __nav-item">
                            <a href="{{ route('admin.dispatch.dashboard') }}" id="tourb-8"
                                class="__nav-link {{ Request::is('admin/dispatch*') ? 'active' : '' }}">
                                <img src="{{ asset('/public/assets/admin/img/new-img/dispatch.svg') }}"
                                    alt="public/img">
                                <span>{{ translate('Delivery Management') }}</span>
                            </a>
                        </li>
                    @endif --}}

                    {{-- <li class="nav-item max-sm-m-0 ml-auto mr-lg-3">
                        <a class="btn btn-icon rounded-circle nav-msg-icon" href="{{ route('admin.message.list') }}">
                            <img src="{{ asset('/public/assets/admin/img/new-img/message-icon.svg') }}"
                                alt="public/img">
                            @php($message = \App\Models\Conversation::whereUserType('admin')->where('unread_message_count', '>', '0')->count())
                            @if ($message != 0)
                                <span class="btn-status btn-status-danger">{{ $message }}</span>
                            @endif
                        </a>
                    </li> --}}
                    {{-- <li class="nav-item max-sm-m-0">
                        <div class="hs-unfold">
                            <div>
                                @php($local = session()->has('local') ? session('local') : null)
                                @php($lang = \App\Models\BusinessSetting::where('key', 'system_language')->first())
                                @if ($lang)
                                    <div class="topbar-text dropdown disable-autohide text-capitalize d-flex">
                                        <a class="topbar-link dropdown-toggle d-flex align-items-center title-color"
                                            href="#" data-toggle="dropdown">
                                            @foreach (json_decode($lang['value'], true) as $data)
                                                @if ($data['code'] == $local)
                                                    <i class="tio-globe"></i> {{ $data['code'] }}
                                                @elseif(!$local && $data['default'] == true)
                                                    <i class="tio-globe"></i> {{ $data['code'] }}
                                                @endif
                                            @endforeach
                                        </a>
                                        <ul class="dropdown-menu lang-menu">
                                            @foreach (json_decode($lang['value'], true) as $key => $data)
                                                @if ($data['status'] == 1)
                                                    <li>
                                                        <a class="dropdown-item py-1"
                                                            href="{{ route('admin.lang', [$data['code']]) }}">
                                                            <span class="text-capitalize">{{ $data['code'] }}</span>
                                                        </a>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </li> --}}
                    {{-- @php($mod = \App\Models\Module::find(Config::get('module.current_module_id')))
                    <li class="nav-item __nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="__nav-link module--nav-icon" id="tourb-0"
                            data-url="{{ route('admin.dashboard') }}">
                            @if ($mod)
                                <img src="{{ \App\CentralLogics\Helpers::onerror_image_helper($mod->icon, asset('storage/app/public/module/') . '/' . $mod->icon, asset('/public/assets/admin/img/new-img/module-icon.svg'), 'module/') }}"
                                    class="onerror-image"
                                    data-onerror-image="{{ asset('/public/assets/admin/img/new-img/module-icon.svg') }}"
                                    width="20px" alt="public/img">
                            @else
                                <img src="{{ asset('/public/assets/admin/img/new-img/module-icon.svg') }}"
                                    alt="public/img">
                            @endif
                            <span class="text-white">Analytics Dashboard Management</span>

                        </a>

                    </li> --}}
                </ul>
                <!-- End Navbar -->
            </div>
            <!-- End Secondary Content -->
        </div>
    </header>
</div>
<div id="headerFluid" class="d-none"></div>
<div id="headerDouble" class="d-none"></div>

<div class="toggle-tour">
    {{-- <a href="https://youtube.com/playlist?list=PLLFMbDpKMZBxgtX3n3rKJvO5tlU8-ae2Y" target="_blank" class="d-flex align-items-center gap-10px">
        <img src="{{ asset('public/assets/admin/img/tutorial.svg') }}" alt="">
        <span>
            <span class="text-capitalize">{{ translate('Turotial') }}</span>
        </span>
    </a> --}}
    <div class="d-flex align-items-center gap-10px restart-Tour">
        <img src="{{ asset('public/assets/admin/img/tour.svg') }}" alt="">
        <span>
            <span class="text-capitalize">{{ translate('Tour') }}</span>
        </span>
    </div>
</div>
