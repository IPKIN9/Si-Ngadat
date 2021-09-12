<div class="scroll-sidebar" data-sidebarbg="skin6">
    <nav class="sidebar-nav">
        <ul id="sidebarnav">
            <li class="sidebar-item {{ Route::is('home.index') ? 'selected' : '' }}"> <a
                    class="sidebar-link sidebar-link" href="{{route('home.index')}}" aria-expanded="false"><i
                        class="fab fa-digital-ocean"></i><span class="hide-menu">Kasus</span></a></li>
            <li class="list-divider"></li>

            @if (Auth::user()->role == 'super_admin')
            <li class="nav-small-cap"><span class="hide-menu">Applications</span></li>
            <li class="sidebar-item {{ Route::is('denda.index') ? 'selected' : '' }}"> <a
                    class="sidebar-link sidebar-link" href="{{route('denda.index')}}" aria-expanded="false"><i
                        class="fas fa-list-ol"></i><span class="hide-menu">Denda</span></a></li>
            <li class="sidebar-item {{ Route::is('desa.index') ? 'selected' : '' }}"> <a
                    class="sidebar-link sidebar-link" href="{{route('desa.index')}}" aria-expanded="false"><i
                        class="fas fa-home"></i><span class="hide-menu">Desa</span></a></li>
            <li class="sidebar-item {{ Route::is('hukum.index') ? 'selected' : '' }}"> <a
                    class="sidebar-link sidebar-link" href="{{route('hukum.index')}}" aria-expanded="false"><i
                        class="fas fa-balance-scale"></i><span class="hide-menu">Hukum</span></a></li>
            <li class="sidebar-item {{ Route::is('tentangkami.index') ? 'selected' : '' }}"> <a
                    class="sidebar-link sidebar-link" href="{{route('tentangkami.index')}}" aria-expanded="false"><i
                        class="fas fa-info"></i><span class="hide-menu">Tentang Kami</span></a></li>
            @else

            @endif
        </ul>
    </nav>
</div>