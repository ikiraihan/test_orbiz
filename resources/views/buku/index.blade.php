@extends('layouts.dashboard')

@section('container')
    {{-- @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">&times;</span> 
    </button>
    </div>
    @endif
    @if (session()->has('successDelete'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('successDelete') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
            <span aria-hidden="true">&times;</span> 
    </button>
    </div>
    @endif --}}
    <h1 class="h3 mb-2 text-gray-800">Master Buku</h1>
    <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="/buku/create" class="btn btn-success"> + Buku</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Author</th>
                                <th>Genre</th>
                                <th>Vote Count</th>
                                <th style="width: 1%;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($buku as $data=> $b)
                            <tr>
                                <td>{{ $b->title }}</td>
                                <td>{{ $b->author }}</td>
                                <td>{{ $b->genre }}</td>
                                <td>{{ $b->vote_count }}</td>
                                <td class="text-wrap">
                                    <form action="/buku/delete/{{ $b->id }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda Yakin ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
@endsection