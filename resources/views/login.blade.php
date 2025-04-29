@extends('layouts/home')
@section('container')
        <div class="row justify-content-center">
            <div class="col-lg-8 mb-0 mt-0">
                <div class="card shadow-lg border-0 rounded-lg mt-4">
                    <div class="card-body p-5">
                        @if(session()->has('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                                    <span aria-hidden="true">&times;</span> 
                                </button>
                         </div>
                        @endif
                        @if(session()->has('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                                    <span aria-hidden="true">&times;</span> 
                                </button>
                            </div>
                        @endif
                        <!-- Login form-->
                        <div class="text-center">
                            <h1 class="h3 text-black mt-2 mb-4">Login</h1>
                        </div>
                        <form action="/login" method="post">
                            @csrf
                            <div class="form-group">
                                <input type="username" name="username" class="form-control @error('username') is-invalid @enderror" id="email" 
                                 placeholder="Email" autofocus required value="{{ old('email') }}">
                                 @error('email')
                                 <div class="invalid-feedback">
                                     {{ $message }}
                                 </div>
                                 @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control " id="password" placeholder="Password" required>
                            </div>
                            <div class="mb-0">
                                <button class="btn btn-primary btn-user btn-block"  type="submit" id="login">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection

<!-- Custom styles for this page -->
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

<!-- Custom styles for this template-->
<link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendor/homeassets/css/bg.css') }}" rel="stylesheet">