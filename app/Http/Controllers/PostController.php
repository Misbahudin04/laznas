<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Client\Request;
use App\Models\Category;
use App\Models\Post;

use Illuminate\Support\Str; //tambahan blm dicatet untuk str::slug
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index() // =mengambil semua post yang ada untuk di read
    {
        $posts = Post::all();

        return view('post.index', compact('posts')); //compact itu lempar data posts
    }
    public function donasi() // =mengambil semua post yang ada untuk di read
    {
        $posts = Post::all();

        return view('welcome', compact('posts')); //compact itu lempar data posts
    }
    public function create()
    {
        $categories = Category::all();
        return view('post.create', compact('categories'));
        //ini belum dicatat categori
    }
    public function store(Request $request)
    {

        $request->validate([
            'image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imgName = $request->thumbnail->getClientOriginalName() . '-' . time()
            . '-' . $request->thumbnail->extension();
        $request->thumbnail->move(public_path('image'), $imgName);

        Post::create([

            'title' => request('title'),
            'slug' => Str::slug(request('title')),
            'content' => request('content'),
            'category_id' => request('category_id'),
            'thumbnail' => $imgName,
            'target' => request('target'),
            'pencapaian' => request('pencapaian'),
        ]);

        //jika sudah terisi maka kembali ke home
        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }
    public function edit(Post $post) //cara Post $post adalah route model binding maka dia akan langsung  otomatis id
    {

        $categories = Category::all();
        return view('post.edit', compact('post', 'categories'));
    }
    //public function edit($id) //CARA LAMA
    //{
    //    $post = Post::find($id);  //find itu cari berdasarkan $id
    //    $categories = Category::all();
    //    return view('post.edit', compact('post', 'categories'));
    //}
    public function update(Post $post)
    {

        $post->update([
            'title' => request('title'),
            'category_id' => request('category_id'),
            'content' => request('content')
        ]);

        return redirect()->route('post.index');
    }
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('post.index');
    }
}
