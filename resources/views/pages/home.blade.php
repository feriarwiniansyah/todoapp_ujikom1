@extends('layouts.app')

@section('content')
    <div class="d-block">
        <div>
            @include('partials.count')
        </div>
        <div>
    <!-- Card Data Task -->
    <div class="d-flex p-1 mx-1 justify-content-center" style=" max-width: 1500px;">
        {{-- <h6 class="text-dark fs-5">Task :</h6> --}}
        <div id="content" class="d-flex justify-content-center container overflow-y-hidden overflow-x-hidden card bg-transparent mt-3 mx-1 ">

            @if ($lists->count() == 0) 
                <div class="d-flex flex-column align-items-center mt-3">
                    <p class="fw-bold text-center text-muted">Belum ada tugas, ayo tambahkan yang pertama! 🤒</p>
                </div>
            @endif
    
            <div class="d-flex gap-3 flex-nowrap overflow-x-auto p-3">
                @foreach ($lists as $list)
                    <div class="card flex-shrink-0 shadow-sm border-0 rounded-lg bg-light" style="width: 20rem; max-height: 80vh;">
                    
                        <div class="card-header d-flex align-items-center justify-content-between text-white rounded-top" style="background-color: #0B2D64">
                            <h5 class="card-title m-0 fw-bold">{{ $list->name }}</h5>
                            <form action="{{ route('lists.destroy', $list->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm p-0 text-white">
                                    <i class="bi bi-trash fs-5"></i>
                                </button>
                            </form>
                        </div>
    
                        <div class="card-body d-flex flex-column gap-2 overflow-auto" style="background-color: #deffd646">
                            @foreach ($tasks as $task)
                                @if ($task->list_id == $list->id)
                                    <div class="card border-0 shadow-sm">
                                        <div class="card-body d-flex flex-column gap-2">
                                            <div class="d-flex align-items-center justify-content-between p-2 rounded-top" style="background-color: #B2C9AD">
                                                <div class="d-flex gap-4">
                                                    <a href="{{ route('tasks.show', $task->id)}}" 
                                                        class="fw-bold m-0 {{ $task->is_completed ? 'text-decoration-line-through text-muted' : '' }}">
                                                        {{ $task->name }}
                                                    </a>
                                                </div>
                                                <div class="d-flex">
                                                    <span class="badge bg-{{ $task->priorityClass }} text-white mx-2">
                                                        {{ ucfirst($task->priority) }}
                                                    </span>
                                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm p-0 text-danger">
                                                            <i class="bi bi-x-circle fs-5"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <p class="text-muted small text-truncate">{{ $task->description }}</p>
                                        </div>
                                        @if (!$task->is_completed)
                                            <div class="card-footer bg-transparent border-0">
                                                <form action="{{ route('tasks.complete', $task->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm btn-success w-100">
                                                        <i class="bi bi-check-circle"></i> Selesai
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                @endif
                            @endforeach
    
                            <button type="button" class="btn btn-outline-secondary mt-2" data-bs-toggle="modal" data-bs-target="#addTaskModal" data-list="{{ $list->id }}">
                                <i class="bi bi-plus-lg"></i> Tambah Tugas
                            </button>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <p class="card-text text-muted small">{{ $list->tasks->count() }} Tugas</p>
                        </div>
                    </div>
                @endforeach
                <button type="button" class="btn btn-outline-primary flex-shrink-0 d-flex justify-content-center align-items-center gap-2 p-1 rounded-lg mb-3" style="width: 20rem; height: fit-content;" data-bs-toggle="modal" data-bs-target="#addListModal">
                    <i class="bi bi-plus-square fs-4"></i> Tambah List Baru
                </button>
            </div>
        </div>    
    </div>

        </div>
    </div>





</div>
@endsection
