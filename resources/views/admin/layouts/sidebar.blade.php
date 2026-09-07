<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark rounded" style="width: 280px;">
    <ul class="nav nav-pills flex-column mb-auto">
        <li>
            <a href="{{ route('admin.index') }}" class="nav-link text-white">
                <i class="fas fa-dashboard"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                <i class="fa-brands fa-product-hunt"></i> Products
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                <i class="fa-regular fa-face-smile-beam"></i> Positives
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                <i class="fa-regular fa-face-frown"></i> Negatives
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                <i class="fa-solid fa-users"></i> Users
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                <i class="fa-solid fa-clock-rotate-left"></i> Histories
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                <i class="fa-solid fa-chart-gantt"></i> Plans
            </a>
        </li>
        <li>
            <a href="#" class="nav-link text-white">
                <i class="fa fa-dollar-sign"></i> Subscriptions
            </a>
        </li>
    </ul>
    <hr>
    <div class="dropdown">
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://cdn.pixabay.com/photo/2021/07/02/04/48/user-6380868_1280.png" alt="" width="32" height="32" class="rounded-circle me-2">
            <strong>
                {{ auth()->guard('admin')->user()->name }}
            </strong>
        </a>
        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
            <li>
                <form id="adminLogout" action="{{ route('admin.logout') }}" method="post">
                    @csrf
                </form>
                <!--Cerrar sesión -->
                <a class="dropdown-item" href="#"
                onclick="document.getElementById('adminLogout').submit();"  
                >Sign out</a>
            </li>
        </ul>
    </div>
</div>