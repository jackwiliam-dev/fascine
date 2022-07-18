<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index(){
        $tag = Tag::latest()->where('deleted', 0)->paginate(5);
        return view('', compact('tag'));
    }

    public function getViewCreateTag(){
        return view('');
    }

    public function create(Request $request){
        Tag::create([
            'title' => $request->input('title'),
            'metaTitle' => $request->input('metaTitle'),
            'slug' => str_slug($request->input('title')),
            'content' => $request->input('content'),
            'deleted' => 0
        ]);

        return redirect()->route('admin.tag.index');
    }

    public function edit($id){
        $tag = Tag::find($id);

        return view('', compact('tag'));
    }

    public function update($id, Request $request){
        Tag::find($id)->updated([
            'title' => $request->input('title'),
            'metaTitle' => $request->input('metaTitle'),
            'slug' => str_slug($request->input('title')),
            'content' => $request->input('content')
        ]);

        return redirect()->route('admin.tag.index');
    }

    public function delete($id){
        Tag::find($id)->updated([
            'deleted' => 1
        ]);

        return redirect()->route('admin.tag.index');
    }
}
