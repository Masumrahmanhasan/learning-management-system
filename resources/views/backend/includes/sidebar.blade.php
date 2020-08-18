<div class="sidebar app-aside" id="sidebar">
    <div class="sidebar-container perfect-scrollbar">
        <nav>
            <ul class="main-navigation-menu">
                <li>
                    <a href="#">
                        <div class="item-content">
                            <div class="item-media"><i class="ti-home"></i></div>
                            <div class="item-inner"><span class="title">Dashboard</span></div>
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

                <li>
                    <a href="javascript:void(0)">
                        <div class="item-content">
                            <div class="item-media"><i class="ti-book"></i></div>
                            <div class="item-inner"><span class="title">Course Management</span><i class="icon-arrow"></i></div>
                        </div>
                    </a>
                    <ul class="sub-menu">
                        <li>
                            <a href="ui_elements.html"><span class="title">Elements</span></a>
                        </li>
                       
                    </ul>
                </li>
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
                            <a href="ui_elements.html"><span class="title">Role Management</span></a>
                        </li>
                       
                    </ul>
                </li>

            @endif

            @if ($logged_in_user->isAdmin())
                <li>
                    <a href="{{ route('admin.teachers.index') }}">
                        <div class="item-content">
                            <div class="item-media"><i class="ti-exchange-vertical"></i></div>
                            <div class="item-inner"><span class="title">@lang('menus.backend.sidebar.teachers.title')</span></div>
                        </div>
                    </a>
                </li>

            @endif

            </ul>
        
        </nav>
    </div>
</div>