@extends('layouts.app')

@section('content')
    <div id="content" class="row card mx-4 p-2 w-75">
        <div class="">
            <div class="p-2 rounded-pill card-title" style="background-color: #B2C9AD">
                <h1 class="mb-3 text-center text-white">Halaman Details</h1>
            </div>
            <div class="row card-body">
                <div class="col-8">
                    <h3 class="mb-2">{{ $task->name }}</h3>
                    <p class="text-muted">{{ $task->description }}</p>
                </div>
                <div class="col-4">
                    <span class="badge text-bg-{{ $task->priorityClass }} badge-pill" style="width: fit-content">
                        {{ $task->priority }}
                    </span>
                    <span class="badge text-bg-{{ $task->is_completed ? 'success' : 'danger' }} badge-pill"
                        style="width: fit-content">
                        {{ $task->is_completed ? 'Selesai' : 'Belum Selesai' }}
                    </span>
                </div>
            </div>    
        </div>
    </div>
@endsection