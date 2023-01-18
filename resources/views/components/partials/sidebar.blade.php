<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            @auth('admin')
                <x-admin.sidebar/>
            @endauth

            @auth('operator')
                <x-operator.sidebar/>
            @endauth

            @auth('guru')
                <x-guru.sidebar/>
            @endauth
        </div>
        <!-- Sidebar -->
    </div>
</div>
