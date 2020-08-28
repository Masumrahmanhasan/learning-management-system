<div class="sidebar app-aside" id="sidebar">
    <div class="sidebar-container perfect-scrollbar">
        <nav>
            <div class="navbar-title"><span>GENERAL</span></div>
            
            <ul class="main-navigation-menu">
                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <div class="item-content">
                            <div class="item-media"><i class="ti-home"></i></div>
                            <div class="item-inner"><span class="title">
                                @lang('menus.backend.sidebar.dashboard')
                            </span></div>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.categories.index') }}">
                        <div class="item-content">
                            <div class="item-media"><i class="ti-folder"></i></div>
                            <div class="item-inner"><span class="title">Categories</span></div>
                        </div>
                    </a>
                </li>
            @if((!$logged_in_user->hasRole('student')) && ($logged_in_user->hasRole('teacher') || $logged_in_user->isAdmin() || $logged_in_user->hasAnyPermission(['course_access','lesson_access','test_access','question_access','bundle_access'])))

                <li>
                    <a href="javascript:void(0)">
                        <div class="item-content">
                            <div class="item-media"><i class="ti-book"></i></div>
                            <div class="item-inner"><span class="title">Course Management</span><i class="icon-arrow"></i></div>
                        </div>
                    </a>
                    <ul class="sub-menu">

                    @can('course_access')
                        <li>
                            <a href="{{ route('admin.courses.index') }}"><span class="title">
                                @lang('menus.backend.sidebar.courses.title')
                            </span></a>
                        </li>
                    @endcan

                    @can('lesson_access')
                        <li>
                            <a href="{{ route('admin.lessons.index') }}"><span class="title">
                                @lang('menus.backend.sidebar.lessons.title')
                            </span></a>
                        </li>
                    @endcan

                    @can('test_access')
                        <li>
                            <a href="{{ route('admin.tests.index') }}"><span class="title">
                                @lang('menus.backend.sidebar.tests.title')
                            </span></a>
                        </li>
                    @endcan

                    @can('question_access')
                        <li>
                            <a href="{{ route('admin.questions.index') }}"><span class="title">
                                @lang('menus.backend.sidebar.questions.title')
                            </span></a>
                        </li>
                    @endcan
                       
                    </ul>
                </li>

                @can('bundle_access')

                <li>
                    <a href="{{ route('admin.bundles.index') }}">
                        <div class="item-content">
                            <div class="item-media"><i class="ti-layers-alt"></i></div>
                            <div class="item-inner"><span class="title">@lang('menus.backend.sidebar.bundles.title')</span></div>
                        </div>
                    </a>
                </li>

                @endcan

            @endif

                <li>
                    <a href="{{ route('admin.bundles.index') }}">
                        <div class="item-content">
                            <div class="item-media"><i class="ti-email"></i></div>
                            <div class="item-inner"><span class="title">@lang('menus.backend.sidebar.messages.title')</span></div>
                        </div>
                    </a>
                </li>


            @if ($logged_in_user->isAdmin())
                <li>
                    <a href="{{ route('admin.teachers.index') }}">
                        <div class="item-content">
                            <div class="item-media"><i class="ti-exchange-vertical"></i></div>
                            <div class="item-inner"><span class="title">@lang('menus.backend.sidebar.teachers.title')</span></div>
                        </div>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.bundles.index') }}">
                        <div class="item-content">
                            <div class="item-media"><i class="ti-envelope"></i></div>
                            <div class="item-inner"><span class="title">@lang('menus.backend.sidebar.contacts.title')</span></div>
                        </div>
                    </a>
                </li>


                <li>
                    <a href="{{ route('admin.bundles.index') }}">
                        <div class="item-content">
                            <div class="item-media"><i class="ti-star"></i></div>
                            <div class="item-inner"><span class="title">@lang('menus.backend.sidebar.coupons.title')</span></div>
                        </div>
                    </a>
                </li>


                <li>
                    <a href="{{ route('admin.bundles.index') }}">
                        <div class="item-content">
                            <div class="item-media"><i class="ti-credit-card"></i></div>
                            <div class="item-inner"><span class="title">@lang('menus.backend.sidebar.tax.title')</span></div>
                        </div>
                    </a>
                </li>


                <li>
                    <a href="{{ route('admin.bundles.index') }}">
                        <div class="item-content">
                            <div class="item-media"><i class="ti-money"></i></div>
                            <div class="item-inner"><span class="title">@lang('menus.backend.sidebar.payments_requests.title')</span></div>
                        </div>
                    </a>
                </li>

            @endif

                <li>
                    <a href="{{ route('admin.bundles.index') }}">
                        <div class="item-content">
                            <div class="item-media"><i class="ti-key"></i></div>
                            <div class="item-inner"><span class="title">@lang('menus.backend.sidebar.account.title')</span></div>
                        </div>
                    </a>
                </li>

            </ul>

            <div class="navbar-title"><span>SYSTEM</span></div>
            
            <ul class="main-navigation-menu">
                @if ($logged_in_user->isAdmin())
                    <li>
                        <a href="javascript:void(0)">
                            <div class="item-content">
                                <div class="item-media"><i class="ti-user"></i></div>
                                <div class="item-inner"><span class="title">
                                @lang('menus.backend.access.title')</span><i class="icon-arrow"></i></div>
                            </div>
                        </a>
                        <ul class="sub-menu">
                            <li>
                                <a href="{{ route('admin.auth.user.index') }}">
                                    <span class="title">@lang('labels.backend.access.users.management')</span>
                                </a>
                            </li>

                            <li>
                                <a href="{{ route('admin.auth.role.index') }}">
                                    <span class="title">
                                    @lang('labels.backend.access.roles.management')
                                    </span>
                                </a>
                            </li>
                           
                        </ul>
                    </li>


                    <li>
                        <a href="{{ asset('user/translations') }}">
                            <div class="item-content">
                                <div class="item-media"><i class="ti-files"></i></div>
                                <div class="item-inner"><span class="title">
                                    @lang('menus.backend.sidebar.dashboard')
                                </span></div>
                            </div>
                        </a>
                    </li>


                    <li>
                        <a href="{{ route('admin.backup') }}">
                            <div class="item-content">
                                <div class="item-media"><i class="ti-shield"></i></div>
                                <div class="item-inner"><span class="title">
                                    @lang('menus.backend.sidebar.translations.title')
                                </span></div>
                            </div>
                        </a>
                    </li>


                    <li>
                        <a href="{{ route('admin.update-theme') }}">
                            <div class="item-content">
                                <div class="item-media"><i class="ti-reload"></i></div>
                                <div class="item-inner"><span class="title">
                                    @lang('menus.backend.sidebar.update.title')
                                </span></div>
                            </div>
                        </a>
                    </li>

                @endif
            </ul>
        </nav>
    </div>
</div>