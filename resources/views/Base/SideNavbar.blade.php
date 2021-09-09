<div class="scroll-sidebar" data-sidebarbg="skin6">
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <li class="sidebar-item {{ Route::is('home.index') ? 'selected' : '' }}"> <a
                    class="sidebar-link sidebar-link" href="{{route('home.index')}}" aria-expanded="false"><i
                        data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span></a></li>
            <li class="list-divider"></li>

            <li class="nav-small-cap"><span class="hide-menu">Applications</span></li>
            <li class="sidebar-item {{ Route::is('denda.index') ? 'selected' : '' }}"> <a
                    class="sidebar-link sidebar-link" href="{{route('denda.index')}}" aria-expanded="false"><i
                        class="icon-check"></i><span class="hide-menu">Denda</span></a></li>
            <li class="sidebar-item {{ Route::is('desa.index') ? 'selected' : '' }}"> <a
                    class="sidebar-link sidebar-link" href="{{route('desa.index')}}" aria-expanded="false"><i
                        class="icon-check"></i><span class="hide-menu">Desa</span></a></li>
            <li class="sidebar-item {{ Route::is('hukum.index') ? 'selected' : '' }}"> <a
                    class="sidebar-link sidebar-link" href="{{route('hukum.index')}}" aria-expanded="false"><i
                        class="icon-check"></i><span class="hide-menu">Hukum</span></a></li>
            <li class="sidebar-item {{ Route::is('contoh.index') ? 'selected' : '' }}"> <a
                    class="sidebar-link sidebar-link" href="{{route('contoh.index')}}" aria-expanded="false"><i
                        class="icon-check"></i><span class="hide-menu">Contoh</span></a></li>
        </ul>
    </nav>
</div>