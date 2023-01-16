<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            @auth('admin')
                <x-admin.sidebar/>
            @endauth
        </div>
        <!-- Sidebar -->
    </div>
</div>
