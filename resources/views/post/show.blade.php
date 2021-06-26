@extends('Layouts.app')

@section('content')
<div class="container">

    <div class="card" style="width: 40vw; margin: 0 auto ">
        <!--<img class="card-img-top" src="..." alt="Card image cap">-->
        <img class="card-img-top" src="/image/{{$post->thumbnail}}" alt="" width="300px" height="300px">
        <div class="card-header">
            {{$post->title}}
        </div>

        <div class="card-body">
            <p class="card-text">{{$post->content}}</p>
            <p class="card-text">{{$post->target}}</p>
            <p class="card-text">{{$post->pencapaian}}</p>
            <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->
        </div>
    </div>

</div>
@endsection