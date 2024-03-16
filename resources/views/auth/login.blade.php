@extends('layouts.app')

@section('title', "Halaman Login")
    
@section('content')
    
        <div class="row justify-content-center">
            <h1 class=" text-center">Login</h1>
            @if (session()->has('error_message'))
                <div class="alert alert-danger col-4">
                    {{ session()->get('error_message') }} {{-- jadi jika method auth di AuthController true maka akan menampilkan eror --}}
                </div> {{-- session baawan laravel ketika ada with()(di authcontroller) --}}         
            @endif
            <div class="row justify-content-center">
                <div class="card col-4 p-4">
                    <form method="POST" action="{{url('login')}}"> {{-- action di form itu bagian pemrosesan data yang dikirim ke routing --}}
                        @csrf
                        <div class="mb-3">
                          <label for="email" class="form-label">Email</label>
                          <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Login</button>
                      </form>

                </div>
            </div>
        </div>

@endsection