@extends('layouts.app')

@section('title', "Halaman Login")
    
@section('content')
    
        <div class="row justify-content-center">
            <h1 class=" text-center">Register</h1>
            @if (session()->has('error_message'))
                <div class="alert alert-danger col-4">
                    {{ session()->get('error_message') }} {{-- jadi jika method auth di AuthController true maka akan menampilkan eror --}}
                </div> {{-- session baawan laravel ketika ada with()(di authcontroller) --}}         
            @endif
            <div class="row justify-content-center">
                <div class="card col-4 p-4">
                    <form method="POST" action="{{url('register')}}"> {{-- action di form itu bagian pemrosesan data yang dikirim ke routing --}}
                        @csrf
                        <div class="mb-3">
                          <label for="name" class="form-label">Nama</label>
                          <input type="text" class="form-control" id="name" name="name">
                          @if ($errors->has('name'))
                              <span class="text-danger">{{ $errors->first('name') }}</span>
                          @endif
                        </div>
                          <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                            @if ($errors->has('email'))
                              <span class="text-danger">{{ $errors->first('email') }}</span>
                          @endif
                          </div>
                        <div class="mb-3">
                          <label for="password" class="form-label">Password</label>
                          <input type="password" class="form-control" id="password" name="password">
                          @if ($errors->has('password'))
                              <span class="text-danger">{{ $errors->first('password') }}</span>
                          @endif
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                          </div>
                        <button type="submit" class="btn btn-primary">Daftar</button>
                      </form>

                </div>
            </div>
        </div>

@endsection