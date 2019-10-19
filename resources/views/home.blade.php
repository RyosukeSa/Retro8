@extends('layouts.admin')

@section('content')
<div class="container">
        <div class="card" style="width: 30rem;">
            @foreach($posts as $post)
            <img src="..." class="card-img-top">
            <div class="card-body">
                <h5 class="nickname">{{ $post->nickname }}</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Cras justo odio</li>
                <li class="list-group-item">Dapibus ac facilisis in</li>
                <li class="list-group-item">Vestibulum at eros</li>
            </ul>
            @endforeach
        </div>
    </div>           
</div>
@endsection
