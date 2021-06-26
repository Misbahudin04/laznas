@extends('Layouts.app')

@section('content')
<div class="container">

    <form action="{{route('post.update', $post)}}" method="post">
        {{csrf_field()}}
        {{method_field('PATCH')}}
        <div class="form-group">
            <label for="">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Post Title" value="{{$post->title}}">
        </div>
        <div class="form-group">
            <label for="">Category</label>
            <select name="category_id" id="" class="form-control">
                @foreach ($categories as $category)
                <option value="{{$category->id}}"> {{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Content</label>
            <textarea class="form-control" name="content" rows="5" placeholder="Post Content">{{$post->content}}</textarea>
        </div>
        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="Save">
        </div>
    </form>

</div>
@endsection