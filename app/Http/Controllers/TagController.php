<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function create()
    {
        return view('admin.tags.create')
        ->with('tag', null);
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required','unique:tags,name'],
        ]);

        $attributes['slug'] = Str::slug($attributes['name']);

        $user = Tag::create($attributes);
        return redirect('/admin');
    }

    public function edit(Tag $tag)
    {
        return view('admin.tags.create')
        ->with('tag', $tag);
    }

    public function update(Tag $tag, Request $request)
    {
        $attributes = request()->validate([
            'name' => ['required','unique:tags,name,'.$tag->id],
        ]);
        
        $tag->update($attributes);
        session()->flash('success','Tag Updated Successfully');

        return redirect('/admin');
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        session()->flash('success','Tag Deleted Successfully');

        return redirect('/admin');
    }

    public function getTagsJSON()
    {
        $tags = Tag::all();
        return response()->json($tags);
    }
}