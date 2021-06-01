<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Traits\MediaManagementTrait;

class PostController extends Controller
{
    use MediaManagementTrait;
    /**
     * FRONTEND
     */
    public function index()
    {   
        if($query = request()->query('search'))
        $posts = Post::where('title','LIKE',"%$query%")->orWhere('body','LIKE',"%$query%")->orWhere('tags','LIKE',"%$query%")->get();
        else
        $posts = Post::all(); 
        //dd($posts);
        if($posts->pluck('tags')->isNotEmpty()){
            $tags='';
            foreach($posts->pluck('tags')->unique() as $tag){
                $tags = $tags.$tag.','; 
            }
            $tags = Arr::where(explode(',',$tags), function ($value, $key) {
                return filled($value);
            });
            return view('frontend.posts.list',compact('posts','tags'));
        } 
        return view('frontend.posts.list',compact('posts'));
    }

    public function view(Post $post)
    {
        return view('frontend.posts.view',compact('post'));
    }

    /**
     * BACKEND
     */
    
    public function list()
    {
        $posts = Post::all();
        return view('backend.posts.list',compact('posts'));
    }

    public function create()
    {
        return view('backend.posts.create');
    }
    
    public function store(Request $request)
    {
        // dd($request->all());
        $post = new Post;
        // $post->user_id = 1;
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->tags = $request->tags;
        $post->status = $request->status;
        $post->body = $request->description;
        $post->save();
        if($request->hasFile('file') || $request->link){
            $this->uploadMedia($request,$post->id,get_class($post));
        }
        return redirect()->route('admin.post.list',compact('post'));
    }

    
    
    public function edit($id)
    {
        return view('backend.posts.edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function duplicate(Post $post){
        $newPost = $post->replicate();
        $newPost->save();
        return view('backend.posts.edit')->with(['post'=> $newPost]);
    }

    public function destroy(Post $post)
    {
        foreach($post->media as $media){
            Storage::delete('public/'.$media->format.'s/'.$media->name);
            $media->delete();
        }
        $post->delete();
        return redirect()->route('admin.post.list');
    }
}

