<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link">
        <span class="brand-text font-weight-light">پنل مدیریت</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <div>
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{asset('img/profile-2.jpg')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">نوید رضایی - 09124674501</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{route('guardian')}}" class="nav-link">
                            <i class="nav-icon fa fa-file"></i>
                            <p>Guardian</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('newsapi')}}" class="nav-link">
                            <i class="nav-icon fa fa-file"></i>
                            <p>News API</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('homepage')}}" class="nav-link">
                            <i class="nav-icon fa fa-home"></i>
                            <p>Home Page</p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
    </div>
    <!-- /.sidebar -->
</aside>
