<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="index.html" class="logo logo-dark">
                    <span class="logo-sm">
                        {{-- <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22"> --}}
                        <h2 class="p-2 text-white">S</h2>
                    </span>
                    <span class="logo-lg">
                        {{-- <img src="{{ asset('assets/images/logo-dark.png') }}" alt="" height="17"> --}}
                        <h2 class="p-2 text-white">SIMSekolah</h2>
                    </span>
                </a>

                <a href="index.html" class="logo logo-light">
                    <span class="logo-sm">
                        {{-- <img src="{{ asset('assets/images/logo-sm.png') }}" alt="" height="22"> --}}
                        <h2 class="p-2 text-white">S</h2>
                    </span>
                    <span class="logo-lg">
                        {{-- <img src="{{ asset('assets/images/logo-light.png') }}" alt="" height="18"> --}}
                        <h2 class="p-2 text-white">SIMSekolah</h2>
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>

        </div>

        <div class="d-flex">

            <div class="dropdown d-none d-lg-inline-block">
                <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                    <i class="mdi mdi-fullscreen"></i>
                </button>
            </div>

           {{-- Notification Area --}}
           <x-partials.notification/>

            {{-- User Menu --}}
            <x-partials.user-menu/>

        </div>
    </div>
</header>
