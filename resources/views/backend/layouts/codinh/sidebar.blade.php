<div class="sidebar-menu">

    <div class="sidebar-menu-inner">

        <header class="logo-env">

            <!-- logo -->
            <div class="logo">
                <a href="{{route('home')}}">
                    <img src="{{asset('theme/backend/login/images/brand-logo.jpg')}}" width="120" alt="" />
                </a>
            </div>

            <!-- logo collapse icon -->
            <div class="sidebar-collapse">
                <a href="#" class="sidebar-collapse-icon with-animation">
                    <!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
                    <i class="entypo-menu"></i>
                </a>
            </div>


            <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
            <div class="sidebar-mobile-menu visible-xs">
                <a href="#" class="with-animation">
                    <!-- add class "with-animation" to support animation -->
                    <i class="entypo-menu"></i>
                </a>
            </div>

        </header>


        <ul id="main-menu" class="main-menu multiple-expanded">
            <!-- add class "multiple-expanded" to allow multiple submenus to open -->
            <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->
<!--            <li>
                <a href="{{route('home')}}">
                    <i class="entypo-chart-bar"></i>
                    <span class="title">Dashboard</span>
                </a>
            </li>-->

            <li>
                <a href="{{route('nhap-lieu.index')}}">
                    <i class="entypo-chart-bar"></i>
                    <span class="title">Nhập dữ liệu</span>
                </a>
            </li>

            @if(Session::has('admin'))
            <li>
                <a href="{{route('tai-khoan.index')}}">
                    <i class="entypo-chart-bar"></i>
                    <span class="title">Tài khoản</span>
                </a>
            </li>
            @endif
            
            <li>
                <a href="{{route('thong-ke.index')}}">
                    <i class="entypo-chart-bar"></i>
                    <span class="title">Thống kê</span>
                </a>
            </li>
        </ul>

    </div>
</div>