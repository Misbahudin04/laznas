@extends('layouts.app')


@section('content')
<div class="container">
    <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="form-group">
            <label for="">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Post Title">
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
            <textarea class="form-control" name="content" rows="5" placeholder="Post Content"></textarea>
        </div>
        <div class="form-group">
            <label for="">Target</label>
            <input type="text" class="form-control" name="target" placeholder="Target Yang dicapai">
        </div>
        <div class="form-group">
            <label for="">Pencapaian</label>
            <input type="text" class="form-control" name="pencapaian" placeholder="Pencapaian Sekarang">
        </div>
        <div class="form-group">
            <label for="thumbnail">Input Gambar</label>
            <input type="file" class="form-control-file" id="thumbnail" name="thumbnail">
        </div>


        <div class="form-group">
            <input class="btn btn-primary" type="submit" value="Save">
        </div>
    </form>

</div>
@endsection