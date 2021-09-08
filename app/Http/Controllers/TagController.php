<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $tags = Tag::all();
        return view('backend.tags.list',compact('tags'));
    }

    
    public function store(Request $request)
    {
        // dd($request->all());
        $tag = new Tag;
        $tag->name = $request->name;
        $tag->type = $request->type;
        if($request->is_meal) $tag->is_meal = true;
        if($request->is_post) $tag->is_post = true;
        $tag->status = $request->status;
        $tag->save();
        return redirect()->back();
    }

    
    public function edit(Tag $tag)
    {
        $tags = Tag::all();
        return view('backend.tags.edit',compact('tag','tags'));
    }

    public function update(Request $request, Tag $tag)
    {
        $tag->name = $request->name;
        $tag->type = $request->type;
        if($request->is_meal) $tag->is_meal = true;
        if($request->is_post) $tag->is_post = true;
        $tag->status = $request->status;
        $tag->save();
        return redirect()->back();
    }

    public function destroy(Tag $tag)
    {
        
    }
}
