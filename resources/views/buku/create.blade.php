@extends('layouts.dashboard')

@section('container')
<div id="layout_content">
    <main>
        <div class="container">
            <a href="/buku"><i class="fas fa-fw fa-arrow-left mb-3"></i><strong>Back</strong></a>
            <div class="row justify">
                <div class="col-xl-12 col-lg-12 col-md-9">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h1 class="h3 mt-2 mb-2 text-gray-800">Tambah Buku</h1>
                        </div>
                        <div class="card-body">
                            <form action="/buku/store" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group mb-3">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" >
                                    @error('title')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="author">Author</label>
                                    <input type="text" class="form-control" id="author" name="author" >
                                    @error('author')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="genre">Genre</label>
                                    <input type="text" class="form-control" id="genre" name="genre">
                                    @error('genre')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="vote_count">Vote Count</label>
                                    <input type="number" class="form-control" id="vote_count" name="vote_count">
                                    @error('vote_count')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-md-12 d-flex align-items-center justify-content-center mb-2 mt-4">
                                    <input type="submit" class="btn btn-primary" value="Simpan Data">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>		
		</div>
    </main>
</div>
@endsection
