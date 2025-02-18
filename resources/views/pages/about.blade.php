@extends('layouts.app')

@section('content')
<div class="card d-flex flex-column align-items-center justify-content-center w-75 mx-auto p-3 rounded-50 shadow" 
style="font-family:cursive;">
<!-- Bagian Foto dan Heading -->
<div class="text-center">
    <img src="{{ asset('image/feri.jpg') }}" class="rounded-circle d-block mx-auto mb-3" 
        style="width: 80px; height: 80px; object-fit: cover;" alt="Feri">
    {{-- <h1>HI THERE</h1>
    <hr class="w-50 mx-auto"> --}}
</div>

<!-- Bagian Perkenalan -->
<div class="mb-4 text-center">
<h4>Let Me Introduce Myself Everyone</h4> 
</div>

<!-- Bagian Informasi -->
<div class="container">
    <div class="row gap-2 justify-content-center">
        <!-- Tampilan Kolom profile -->
        <div class="col-md-4 mb-4 card card-hover rounded-5 p-3 shadow">
            <h4 class="font">
                <strong>My Name is:</strong>
                <p>Feri Arwiniansyah</p> <hr>
                <strong>As a student at:</strong>
                <p>SMKN 2 SUBANG</p> <hr>
                <strong>I'm in the Class:</strong>
                <p>Engineering Software</p> <hr> 
                <strong>Born on:</strong>
                <p>17 July 2007</p> <hr>
            </h4>
        </div>

        <!-- Tampilan Kolom kontak -->
        <div class="col-md-4 mb-4 card card-hover rounded-5 p-3 w-50 shadow">
            <h4>
                <strong>Email:</strong>
                <p>feri17arwiniansyah@gmail.com</p> <hr> 
                <strong>Phone:</strong>
                <p>+62 838-9228-5394</p> <hr> 
                <strong>Github:</strong>
                <p>feriarwiniansyah117</p> <hr>
            </h4>
        </div>        
    </div>
</div>
</div>
</div>
@endsection
