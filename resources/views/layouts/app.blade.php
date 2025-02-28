<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $title }} - {{ config('app.name') }}</title>

    <!-- Import Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap-icons/font/bootstrap-icons.min.css') }}">
    {{--style dengan css--}}
    <style>
        body {
            background-color: #E6F4F1;
        }; /*warna latar belakang*/
    </style>
</head>

<body class="overflow-x-hidden"> <!-- overflow digunakan untuk Disable horizontal scroll -->
    <div class="d-flex">
        <!-- menampilkan Sidebar -->
            @include('partials.sidebar') 

        <!-- menampilkan dari section Content -->
        <div class="flex-grow-1 p-2">
            @yield('content') 
            <!--yeild adalah syntax yang digunakan untuk memberikan tempat pada content yang akan diisi dari view yang menjalankan section content -->
        </div>
    </div>

    <!-- Modal -->
    @include('partials.modal')

    <!-- Scripts -->
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script> <!-- Import Bootstrap JS -->
</body>

</html>
