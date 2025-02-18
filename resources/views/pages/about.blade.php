@extends('layouts.app')

@section('content')
<div class="d-flex flex-column align-items-center justify-content-center mx-auto p-4 mt-4 rounded-4 shadow" 
     style="font-family: cursive;">
    <div class="container">
        <div class="row">
            <!-- Bagian Foto dan Biodata -->
            <div class="col-md-8 mb-3">
                <div class="card p-3 d-flex align-items-center h-100">
                    <div class="d-flex align-items-start gap-3 w-100">
                        <img src="{{ asset('image/feri.jpg') }}" class="rounded-3" 
                             style="width: 250px; height: 340px; object-fit: cover;" alt="Feri">
                        <div class="flex-grow-1">
                            <h4 class="mb-2"><strong>Feri Arwiniansyah</strong></h4>
                            <p class="mb-1"><strong>Asal:</strong> Subang</p>
                            <p class="mb-1"><strong>Tgl Lahir:</strong> 17 Juli 2007</p>
                            <p class="mb-3"><strong>Kelas:</strong> Engineering Software</p>
                            <hr>
                            <h5 class="mb-2">Hallo Semuanya...</h5>
                            <p class="mb-1">Website Aplikasi Todolist ini adalah proyek Uji Kompetensi saya yang dibuat menggunakan Laravel dan Bootstrap.</p>
                            <p class="mb-0">Terima Kasih 😉, See You All...</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bagian Informasi Tambahan -->
            <div class="col-md-4 mb-3">
                <div class="card p-3 h-100 d-flex flex-column">
                    <h5 class="text-center"><strong>Informasi Pribadi</strong></h5>
                    <hr>
                    <p class="mb-1"><strong>Tempat Tinggal:</strong></p>
                    <p>Mulyasari, Binong, Subang</p> 
                    <hr>
                    <p class="mb-1"><strong>Sekolah:</strong></p>
                    <p>SMKN 2 Subang</p> 
                    <hr>
                    <p class="mb-1"><strong>Usia:</strong></p>
                    <p>17 tahun</p>
                    <div class="flex-grow-1"></div>
                </div>
            </div>
        </div>

        <!-- Bagian Kontak -->
        <div class="row justify-content-between">
            <div class="col-md-8">
                <div class="card p-3 h-100 d-flex flex-column">
                    <h5 class="mb-2 text-center"><strong>Kontak</strong></h5>
                    <p class="mb-1"><strong>No. Tlpn:</strong> +62 838 9228 5394</p>
                    <p class="mb-1"><strong>Email:</strong> feri17arwiniansyah@gmail.com</p>
                    <p class="mb-0"><strong>Email lainnya:</strong> <br> 2223595.feri@smkn_2sbg.sch.id</p>
                    <div class="flex-grow-1"></div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card p-3 h-100 d-flex flex-column">
                    <h5 class="mb-2 text-center"><strong>Informasi Lain</strong></h5>
                    <p class="mb-1"><strong>Github :</strong> feriarwiniansyah117</p>
                    <p class="mb-0"><strong>Instagram :</strong> @arfer_17</p>
                    <div class="flex-grow-1"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
