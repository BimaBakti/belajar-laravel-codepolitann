@extends('layouts.app')
@section('title',"Blog | Judul : $post->title")

@section('content')
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
@endsection
