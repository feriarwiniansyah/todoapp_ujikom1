<div class="d-flex">
    <!-- Sidebar -->
    <div class="d-flex flex-column flex-shrink-0 p-3 text-white" style="width: 180px; background-color:  #0B2D64; height: 120vh">
        <a href="{{ route('about')}}" class="text-light" style="text-decoration: none" alt="profil"> 
            <div class="d-flex flex-column align-items-center justify-content-center">
                <div class="mb-2">
                    <img class="rounded-circle" src="{{ asset('image/feri.jpg')}}" alt="Feri" style="width: 60px; height: 60px; object-fit: cover;">
                </div>
                <div>
                    <h6 class="text-center">Feri Arwiniansyah</h6>
                </div>
            </div> {{----digunakan untuk mengarahkan ke halaman about----}}  
        </a> 
        
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li>
                <div class="row my-3">
                    <div class="col-12">
                        <form action="{{ route('home') }}" method="GET" class="d-flex gap-2">
                            <input type="text" class="form-control w-100" name="query" placeholder="Cari task/list" 
                            value="{{ request()->query('query') }}"> {{----digunakan untuk mencari task/list----}}
                            <button type="submit" class="btn btn-outline-primary"><i class="bi bi-search"></i></button>
                        </form>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a href="{{route('tasks.index')}}" class="nav-link text-white"> {{----digunakan untuk mengarahkan ke halaman tasks----}}
                    <i class="bi bi-house-door me-2"></i> Dashboard
                </a>
            </li>
            <li>
                <a href="#content" class="nav-link text-white"> {{----digunakan untuk mengarahkan ke halaman tasks----}}
                    <i class="bi bi-card-checklist me-2"></i> Tasks
                </a>
            </li>
        </ul>
    </div>
</div>
