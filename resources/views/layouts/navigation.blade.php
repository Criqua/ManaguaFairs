<nav class="navbar !bg-[#111827] text-gray-200 shadow-md navbar-expand-md">
    <div class="container-fluid px-4 py-4">
        <a href="{{url('/')}}" class="navbar-brand flex items-center font-semibold text-white hover:text-gray-300">
            <!-- Logo / Ícono de la Web -->
            <div class="inline-flex items-center justify-center bg-gradient-to-tr from-slate-800 to-slate-700 p-2 rounded-full">
                <i class="fa-solid fa-store text-xl text-gray-200"></i>
            </div>
            
            <!-- Texto al lado derecho del logo/ícono -->
            <span class="ml-2">ManaguaFairs</span>
        </a>

        <!-- Botón de menú hamburguesa para móviles. Despliegue Offcanvas -->
        <button class="navbar-toggler navbar-dark" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#navbarOffcanvas" aria-controls="navbarOffcanvas" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menú para escritorio | Menú Offcanvas para móviles -->
        <div class="offcanvas offcanvas-end !bg-[#111827] !text-white" id="navbarOffcanvas" tabindex="-1" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header py-6 justify-between">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menú</h5>
                <button type="button" class="flex items-center justify-center w-8 h-8 p-1 rounded bg-slate-800 hover:bg-slate-700" data-bs-dismiss="offcanvas" aria-label="Cerrar menú">
                    <i class="fa-solid fa-xmark text-white"></i>
                </button>
            </div>
            
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a href="{{ route('fairs.index') }}" class="nav-link px-3 py-2 rounded transition duration-200
                            {{ request()->routeIs('fairs.*')
                                ? 'bg-gray-800 text-teal-300'
                                : 'text-white hover:!bg-gray-800' }}">
                                {{ __('Ferias') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('entrepreneurs.index') }}" class="nav-link px-3 py-2 rounded transition duration-200
                            {{ request()->routeIs('entrepreneurs.*')
                                ? 'bg-gray-800 text-teal-300'
                                : 'text-white hover:!bg-gray-800' }}">
                                {{ __('Emprendedores') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>