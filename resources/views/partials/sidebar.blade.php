<div class="d-flex">
    <!-- Sidebar -->
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white" style="width: 175px; background-color:  #0B2D64; height: 120vh">
        <div class="row my-3">
            <div class="col-12">
                <form action="{{ route('home') }}" method="GET" class="d-flex gap-2">
                    <input type="text" class="form-control w-100" name="query" placeholder="Cari task/list" 
                    value="{{ request()->query('query') }}">
                    <button type="submit" class="btn btn-outline-primary"><i class="bi bi-search"></i></button>
                </form>
            </div>
        </div>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{route('tasks.index')}}" class="nav-link text-white">
                    <i class="bi bi-house-door me-2"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="#content" class="nav-link text-white">
                    <i class="bi bi-card-checklist me-2"></i> Tasks
                </a>
            </li>
        </ul>
        
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-person-circle fs-4 me-2"></i>
                <strong>User</strong>
            </a>
            <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser">
                <li><a class="dropdown-item" href="#">Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Sign out</a></li>
            </ul>
        </div>
    </div>
</div>
