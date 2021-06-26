@extends('Layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($posts as $post)
            <div class="card" style="width: 50vw;">
                <!--<img class="card-img-top" src="..." alt="Card image cap">-->
                <img class="card-img-top" src="/image/{{$post->thumbnail}}" alt="" width="100px" height="100px">
                <div class="card-header">
                    {{$post->title}}

                    <div class="float-right">
                        <form class="" action="{{ route('post.destroy', $post) }}" method="post">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </div>
                </div>

                <div class="card-body">

                    <p class="card-text">{{$post->content}}</p>
                    <p class="card-text">{{$post->target}}</p>
                    <p class="card-text">{{$post->pencapaian}}</p>
                    <!--<a href="#" class="btn btn-primary">Go somewhere</a>-->
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection