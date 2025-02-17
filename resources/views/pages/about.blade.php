@extends('layouts.app')

@section('content')
<div class="card d-flex flex-column align-items-center justify-content-center w-75 mx-auto p-2" style="font-family:cursive">
    <!-- Bagian Foto dan Heading -->
    <div class="text-center">
        <img src="{{ asset('image/feri.jpg') }}" class="rounded-circle d-block mx-auto mb-3" 
            style="width: 80px; height: 80px; object-fit: cover;" alt="Feri">
        <h1>HI THERE</h1>
        <hr class="w-50 mx-auto">
    </div>

    <!-- Bagian Perkenalan -->
    <div class="mb-4 text-center">
        <h4>Let Me Introduce Myself Everyone</h4>
    </div>

    <!-- Bagian Informasi -->
    <div class="container">
        <div class="row gap-1 justify-content-center ">
            <!-- Kolom profile -->
            <div class="col-md-4 mb-4 card rounded-5 p-3 w-50">
                <h4 class="font">
                    <strong>My Name is:</strong> <br>
                    Feri Arwiniansyah <br><br>
                    <strong>As a student at:</strong> <br>
                    SMKN 2 SUBANG <br><br>
                    <strong>I'm in the:</strong> <br>
                    Engineering Software Class <br><br>
                    <strong>Born on:</strong> <br>
                    17 July 2007
                </h4>
            </div>

            <!-- Kolom kontak -->
            <div class="col-md-8 mb-4 card rounded-5 p-3" style="width: 45%">
                <h4>
                    <strong>Email:</strong> <br>
                    feri17arwiniansyah@gmail.com <br><br>
                    <strong>Phone:</strong> <br>
                    +62 838-9228-5394
                </h4>
            </div>        
        </div>
    </div>
</div>
@endsection
