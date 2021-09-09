<div class="scroll-sidebar" data-sidebarbg="skin6">
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <li class="sidebar-item {{ Route::is('home.index') ? 'selected' : '' }}"> <a class="sidebar-link sidebar-link" href="{{route('home.index')}}" aria-expanded="false"><i
                        data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span></a></li>
            <li class="list-divider"></li>
            <li class="nav-small-cap"><span class="hide-menu">Applications</span></li>
            <li class="sidebar-item {{ Route::is('contoh.index') ? 'selected' : '' }}"> <a class="sidebar-link sidebar-link" href="{{route('contoh.index')}}" aria-expanded="false"><i class="icon-check"></i><span class="hide-menu">Contoh</span></a></li>
        </ul>
    </nav>
</div>