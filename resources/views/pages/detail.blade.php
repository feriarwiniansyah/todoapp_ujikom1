@extends('layouts.app')

@section('content')
<div id="content" class="container">
    <div class="d-flex align-items-center">
        <a href="{{ route('home') }}" class="btn btn-sm"> {{--route("home") digunakan untuk mengembalikan ke tampilan view--}}
            <i class="bi bi-arrow-left-short fs-4"></i>
            <span class="fw-bold fs-5">Kembali</span>
        </a>
    </div> {{-- Bagian ini menampilkan tombol kembali yang mengarah ke halaman utama. --}}

    @session('success') 
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endsession {{--Menampilkan pesan sukses jika ada session 'success'.--}}

    <div class="row my-3">
        <div class="col-8">
            <div class="col card" style="height: 40vh;">
                <div class="card-header d-flex align-items-center justify-content-between overflow-hidden">
                    <h3 class="fw-bold fs-4 text-truncate mb-0" style="width: 80%">
                        {{ $task->name }} {{--variabel ini digunakan untuk menampilkan name dari database,variabel task diambil dari controller--}}
                    </h3>
                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal"
                        data-bs-target="#editTaskModal">
                        <i class="bi bi-pencil-square"></i>
                    </button>
                </div>
                <div class="card-body">
                    <p>
                        {{ $task->description }} {{--variabel ini digunakan untuk menampilkan description dari database,variabel task diambil dari taskcontroller--}}
                    </p>
                </div> {{--Bagian ini adalah kartu utama yang menampilkan card--}}
                <div class="card-footer">
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" type="button" class="btn btn-sm btn-outline-danger w-100">
                            Hapus
                        </button>
                    </form>
                </div> {{-----Bagian ini adalah tombol untuk menghapus task--}}
            </div>
            <div class="col-4 mt-2 card px-5 pt-3 badge-pill w-100" style="height: 18vh">
                <div class="">
                    <h2 class="">Ada dilist :</h2>
                </div>
                <div style="font-family:fantasy;">
                    <div class="d-flex flex-column align-items-center">
                        <h2>{{ $task->list->name }}</h2>
                    </div>
                </div>
            </div> {{-----Bagian ini menampilkan list yang terkait dengan task tersebut.----}}
            <div class="d-flex gap-2">
                <div class="col mt-2 card p-5 badge text-bg-{{ $task->priorityClass }} badge-pill align-items-center" style="height: 20vh">
                    <h1 style="font-family:fantasy;">{{ $task->priority }}</h1> {{--ini digunakan untuk menampilkan priority dari setiap task yang variabelnya diambil dari taskcontroller--}}
                </div>
                <div class="col mt-2 card p-5 badge  text-{{$task->is_completed ? 'success' : 'danger'}} badge-pill align-items-center" style="height: 20vh">
                        <h3>{{ $task->is_completed ? 'Selesai' : 'Belum Selesai' }}</h3> {{--ini digunakan untuk menampilkan is_complete dari setiap task yang variabelnya diambil dari taskcontroller--}}
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card" style="height: 80vh;">
                <div class="card-header d-flex align-items-center justify-content-between overflow-hidden">
                    <h3 class="fw-bold fs-4 text-truncate mb-0" style="width: 80%">Details</h3>
                </div>
                <div class="card-body d-flex flex-column gap-2">
                    <h4>Berada di :</h4>
                    <form action="{{ route('tasks.changeList', $task->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <select class="form-select" name="list_id" onchange="this.form.submit()">
                            @foreach ($lists as $list)
                            
                                <option value="{{ $list->id }}" {{ $list->id == $task->list_id ? 'selected' : '' }}>
                                    {{ $list->name }}
                                </option>
                            @endforeach
                        </select>
                    </form>
                </div> {{-----Bagian ini menampilkan option untuk mengubah list----}}
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editTaskModal" tabindex="-1" aria-labelledby="editTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="modal-content">
            @method('PUT')
            @csrf
            <div class="modal-header">
                <h1 class="modx al-title fs-5" id="editTaskModalLabel">Edit Task</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" value="{{ $task->list_id }}" name="list_id" hidden>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name"
                        value="{{ $task->name }}" placeholder="Masukkan nama list">
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="description" id="description" rows="3" placeholder="Masukkan deskripsi">{{ $task->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="priority" class="form-label">Priority</label>
                    <select class="form-control" name="priority" id="priority">
                        <option value="low" @selected($task->priority == 'low')>Low</option>
                        <option value="medium" @selected($task->priority == 'medium')>Medium</option>
                        <option value="high" @selected($task->priority == 'high')>High</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>
        </form> {{-----Bagian ini menampilkan form untuk mengedit task yang diambil dengan id yang ada di js----}}
    </div>
</div>
@endsection