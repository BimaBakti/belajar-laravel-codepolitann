<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link href="{{ asset('bootstrap-5.3.3/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .blog{
            padding: 5px;
            border-bottom: 1px solid lightgray;
        }
    </style>
</head>
<body>
    
@include('layouts.app.header') {{-- include itu hanya kaya memindah(seperti langsung print saja), tidak bisa baca section --}}

<div class="container">

    @yield('content')

    @include('layouts.app.footer')

</div>
<script src="{{ asset('bootstrap-5.3.3/js/bootstrap.bundle.min.js') }}" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  
</body>
</html>
{{-- 1 layout yang sama akan memiliki section yang sama juga saat dipanggil, jangan lupoa extend file di folder layout --}}