@extends('layouts.app')
@section('title',"Tambah Post")

@section('content')
    <h1>Tambah Postingan
        <a href="{{ url('posts') }}" class="btn btn-primary">kembali</a> {{-- action di form adalah menuju routing ke mana setelah tombol submit di klik(berhubungan dengan pemrosesan data), sedangkan redirect untuk ke halaman mana setelah tombol submit diklik --}}
    </h1>
    <form action="{{ url('posts') }}" method="POST" class="form-control">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul</label>
            <input type="text" class="form-control" id="title" name="title">  {{-- id itu sebagai referensi untuk bootstatp, sedangkan name untuk database(laravel) --}}    
          </div>
          <div class="mb-3">
            <label for="content" class="form-label">Konten</label>
            <textarea class="form-control" id="content" rows="3" name="content"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
@endsection