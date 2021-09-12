<nav class="navbar top-navbar navbar-expand-md">
    <div class="navbar-header" data-logobg="skin6">
        <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                class="ti-menu ti-close"></i></a>
        <div class="navbar-brand">
            <a href="index.html">
                <h3>si-<strong>NGADAT</strong></h3>
            </a>
        </div>
        <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
            data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
            aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
    </div>
    <div class="navbar-collapse collapse" id="navbarSupportedContent">
        <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
        </ul>
        <ul class="navbar-nav float-right">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <span class="ml-2 d-none d-lg-inline-block"><span>Hallo,</span> <span
                            class="text-dark">{{Auth::user()->nama}}</span> <i data-feather="chevron-down"
                            class="svg-icon"></i></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('logout')}}"><i data-feather="power"
                            class="svg-icon mr-2 ml-1"></i>
                        Logout</a>
                    <div class="dropdown-divider"></div>
                    @if (Auth::user()->role == 'super_admin')
                    <div class="pl-4 p-3"><a href="{{route('user.index')}}" class="btn btn-sm btn-info">Management
                            User</a>
                    </div>
                    @else

                    @endif
                </div>
            </li>
        </ul>
    </div>
</nav>