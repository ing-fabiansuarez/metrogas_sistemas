<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark"
    id="sidenav-main">
    <div>
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="align-items-center d-flex m-0 text-wrap mx-5" href="{{ route('dashboard') }}">
            <img src="{{ asset('assets/img/metrogas/logo.png') }}" class="img-fluid" alt="...">
            {{-- <span class="ms-3 font-weight-bold">Metrogas SA ESP</span> --}}
        </a>
        <div class="row m-3 w-auto">
            <div style="font-size: 1rem; color:white;" class="col text-center">
                Bienvenido <br>
                <strong> {{ auth()->user()->name }}</strong><br>
                <span style="font-size: 0.8rem"></span>
            </div>
        </div>
    </div>

    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white {{ Route::currentRouteName() == 'dashboard' ? ' active bg-gradient-primary' : '' }}"
                    href="{{ route('dashboard') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            @can('config')
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Configuración
                    </h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'usuarios.index' ? ' active bg-gradient-primary' : '' }}  "
                        href="{{ route('usuarios.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">group</i>
                        </div>
                        <span class="nav-link-text ms-1">Usuarios</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'role.index' ? ' active bg-gradient-primary' : '' }}  "
                        href="{{ route('role.index') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">build</i>
                        </div>
                        <span class="nav-link-text ms-1">Roles</span>
                    </a>
                </li>
            @endcan

            @can('inventario')
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Inventario
                    </h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'inv.bodegas' ? ' active bg-gradient-primary' : '' }}  "
                        href="{{ route('inv.bodegas') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">view_in_ar</i>
                        </div>
                        <span class="nav-link-text ms-1">Bodegas</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'inv.marcas' ? ' active bg-gradient-primary' : '' }}  "
                        href="{{ route('inv.marcas') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">apartment</i>
                        </div>
                        <span class="nav-link-text ms-1">Marcas</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'inv.productos' ? ' active bg-gradient-primary' : '' }}  "
                        href="{{ route('inv.productos') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">category</i>
                        </div>
                        <span class="nav-link-text ms-1">Stock de Articulos</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'inv.actas-entrega' ? ' active bg-gradient-primary' : '' }}  "
                        href="{{ route('inv.actas-entrega') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">receipt_long</i>
                        </div>
                        <span class="nav-link-text ms-1">Actas de Entrega</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white {{ Route::currentRouteName() == 'inv.acta-devolucion' ? ' active bg-gradient-primary' : '' }}  "
                        href="{{ route('inv.acta-devolucion') }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">receipt_long</i>
                        </div>
                        <span class="nav-link-text ms-1">Actas de Devolución</span>
                    </a>
                </li>
            @endcan

        </ul>
    </div>
</aside>
