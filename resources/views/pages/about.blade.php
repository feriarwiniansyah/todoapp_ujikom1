@extends('layouts.app')

@section('content')
<div class="d-flex flex-column align-items-center justify-content-center mx-auto p-3 rounded-50 shadow" 
style="font-family:cursive;">
<!-- Bagian Foto dan Heading -->
<div class="container">
    <div class="row">
        <div class="col-8 card d-flex justify-content-center align-items-center">
            <div class="d-flex align-items-start justify-content-start gap-3 p-3 rounded w-100">
                <!-- Gambar di kiri -->
                <img src="{{ asset('image/feri.jpg') }}" class="rounded-3" 
                     style="width: 250px; height: 340px; object-fit: cover;" alt="Feri">
                
                <!-- Teks di kanan -->
                <div class="flex-grow-1">
                    <h4>
                        <p class="mb-1"><strong>Nama:</strong> <span style="">Feri Arwiniansyah </span></p>
                        <p class="mb-1"><strong>Asal:</strong> Subang</p>
                        <p class="mb-1"><strong>Tgl Lahir:</strong> 17 Juli 2007</p>
                        <p class="mb-1"><strong>Kelas:</strong> Engineering Software</p>
                    </h4><hr>
                    <h5>
                        <p>Hallo Semuanya...</p>
                        <p>
                            Website Aplikasi Todolist ini project Uji 
                            Kompetensi Aku yang dibuat menggunakan Laravel dan Bootstrap. 
                        </p>
                        <p>Terima Kasih 😉,See You All...</p>
                    </h5>
                </div>
            </div>
            
        </div>
        <div class="col-4">
            <div class="col card">
                <h4 class="font m-4">
                    <strong>Tempat Tinggal :</strong>
                    <p>Mulyasari, Binong, Subang</p> <hr>
                    <strong>Sekolah di :</strong>
                    <p>SMKN 2 SUBANG</p> <hr>
                    <strong>Usia :</strong>
                    <p>17 (Tujuh Belas) tahun</p> <hr> 

                </h4>
            </div>
        </div>
    </div>
</div>

{{-- <div class="text-center">
    
    {{-- <h1>HI THERE</h1>
    <hr class="w-50 mx-auto"> --}}
{{-- </div>

<!-- Bagian Perkenalan -->
<div class="mb-4 text-center">
<h4>Let Me Introduce Myself Everyone</h4> 
</div> --}}


<!-- Bagian Informasi -->
{{-- <div class="container">
    <div class="row gap-2 justify-content-center">
        <!-- Tampilan Kolom profile -->
        <div class="col-md-4 row mb-4 card card-hover rounded-5 p-3 shadow">
            
            <div class="col card">
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
        </div>

        <!-- Tampilan Kolom kontak -->
        <div class="col-md-8 mb-4 card card-hover rounded-5 p-3 w-50 shadow">
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
</div> --}}
</div>
</div>
@endsection
