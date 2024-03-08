<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('bootstrap-5.3.3/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/blog.css')}}">
    <title>Blog | Judul : {{$post->title}} </title>
</head>
<body>
    <div class="container">
        <div class="col-lg-6 px-0">
            <h1 class="display-4 fst-italic">{{$post->title}}</h1>
            <p class="lead my-3">{{$post->content}}</p>
            <p class="lead mb-0">{{$post->created_at}}</p>
            <small class="text-muted">{{$total_comments}} Komentar</small>
            @foreach ($comments as $comment)
               <div class="card mb-3">
                    <div class="card-body">
                        <p>{{ $comment->comment }}</p>{{-- arahkan ke tabel dalah hal ini field comment di dalam tabel comments --}}
                    </div>
               </div>
            @endforeach

            <br>
            <a href="{{ url('posts') }}" class="btn btn-primary">kembali</a>
          </div> 
    </div>
    <script src="{{ asset('bootstrap-5.3.3/js/bootstrap.bundle.min.js') }}" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  
</body>
</html>