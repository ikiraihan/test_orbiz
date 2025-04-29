@extends('layouts.home')

@section('container')
    <h1 class="h3 mb-2 text-gray-800">List Buku</h1>
    <div class="row">
        @foreach ($buku as $data => $b)
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $b->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $b->author }}</h6>
                        <p class="card-text">{{ $b->genre }}</p>
                        <a href="javascript:void(0);" 
                        class="card-link vote-btn" 
                        data-id="{{ $b->id }}" 
                        title="Vote">
                            <i class="bi bi-hand-thumbs-up"></i> 
                            <span class="vote-count">{{ $b->vote_count }}</span>
                        </a>                           
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row mt-4">
        @foreach ($google as $b)
            <div class="col-sm-3">
                <div class="card" style="width: 18rem;">
                    <img src="{{ $b['thumbnail'] }}" class="card-img-top" alt="Thumbnail">
                    <div class="card-body">
                        <h5 class="card-title">{{ $b['title'] }}</h5>
                        <p class="card-text">{{ $b['deskripsi'] }}</p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <a href="{{ $b['infolink'] }}" target="_blank">Info Link</a>
                        </li>
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
    
    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.vote-btn').click(function() {
                const bukuId = $(this).data('id');
                const el = $(this);
                $.ajax({
                    url: '/buku/vote/' + bukuId,
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        el.find('.vote-count').text(response.vote_count);
                    },
                    error: function() {
                        alert('Gagal melakukan vote.');
                    }
                });
            });
        });
        </script>
@endsection
