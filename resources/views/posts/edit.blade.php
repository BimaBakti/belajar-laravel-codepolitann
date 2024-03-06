<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('bootstrap-5.3.3/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Edit Post</title>
</head>
<body>
    <h1>Edit Postingan
        <a href="{{ url('posts') }}" class="btn btn-primary">kembali</a>
    </h1>
<div class="container">
    <form method="POST" action="{{ url("posts/$post->id") }}" class="form-control"> {{-- UNTUK EDIT LARAVEL, METHOD DI TAG FORM HARUS POST --}}
        @method('PATCH')
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">  {{-- id itu sebagai referensi untuk bootstatp, sedangkan name untuk database(laravel) --}}    
          </div>
          <div class="mb-3">
            <label for="content" class="form-label">Konten</label>
            <textarea class="form-control" id="content" rows="3" name="content" >{{ $post->content }} </textarea>
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
        <form method="POST"  action="{{ url("posts/$post->id") }}" class="form-control">
            @method('DELETE')
            @csrf
            <button type="submit" class="btn btn-danger">Hapus Postingan</button>
        </form>
</div>
        <script src="{{ asset('bootstrap-5.3.3/js/bootstrap.bundle.min.js') }}" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  
    </body>
</html>