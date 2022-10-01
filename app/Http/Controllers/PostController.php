<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts=Post::where('status',2)->latest('id')->paginate(6);
        return view('posts.index',compact('posts'));
    }

    public function show(Post $post){
        //return $post;
        $similares=Post::where('category_id',$post->category_id)
                            ->where('status',2)
                            ->where('id','!=',$post->id) //para no mostrar con el mismo nombre
                            ->latest('id')
                            ->take(4)
                            ->get();
        return view('posts.show',compact('post','similares'));
    }

    public function category(Category $category){
        //return $category;
        $posts=Post::where('category_id',$category->id)
                        ->where('status',2)
                        ->latest('id')
                        ->paginate(6);
        return view('posts.category',compact('posts'));
    }

    public function tag(Tag $tag){
        //return $tag-> posts;

        $posts=$tag->posts()->where('tag_id',$tag->id)
                        ->where('status',2)
                        ->latest('id')
                        ->paginate(6);
        return view('posts.tag',compact('posts'));

    }
}
