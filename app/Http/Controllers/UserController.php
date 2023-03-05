<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create() {
        return view('admin.users.create')
        ->with('users', null);
    }

    public function store(Request $request) {
        $attributes = request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'url' => ['nullable','sometimes','url'],
            'published_date' => ['nullable','sometimes','date'],
            'category_id' => ['nullable','sometimes','exists:categories,id'],
            'image' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:2048','dimensions:max_width=1200'],
            'thumb' => ['nullable','sometimes','image','mimes:jpg,png,jpeg,gif,svg','max:1024','dimensions:max_width=600'],
        ]);

        // Save upload in public storage and set path attributes 
        $image_path = $request->file('image')?->storeAs('images',$request->image->getClientOriginalName(), 'public');
        $attributes['image'] = $image_path;
        $thumb_path = $request->file('thumb')?->storeAs('images', $request->thumb->getClientOriginalName(), 'public');
        $attributes['thumb'] = $thumb_path;


        $attributes['slug'] = Str::slug($attributes['title']);

        Project::create($attributes);
        
        session()->flash('success', 'Project Created Successfully');

        return redirect('/admin');

    }

    public function edit(Project $project) {
        return view('admin.projects.create')
        ->with('project', $project)
        ->with('categories', Category::all());
    }

    public function update(Project $project, Request $request){
        $attributes = request()->validate([
            'title' => ['required','unique:projects,title,'.$project->id],
            'excerpt' => 'required',
            'body' => 'required',
            'url' => ['nullable','sometimes','url'],
            'published_date' => ['nullable','sometimes','date'],
            'category_id' => ['nullable','sometimes','exists:categories,id'],
        ]);

        // Save upload in public storage and set path attributes 
        $image_path = $request->file('image')?->storeAs('images',$request->image->getClientOriginalName(), 'public');
        $attributes['image'] = $image_path;
        $thumb_path = $request->file('thumb')?->storeAs('images', $request->thumb->getClientOriginalName(), 'public');
        $attributes['thumb'] = $thumb_path;

        $attributes['slug'] = Str::slug($attributes['title']);
        $project->update($attributes);
        session()->flash('success', 'Project Updated Successfully');
        return redirect('/admin');
    }

    public function destroy(Project $project) {
        $project->delete();

        // Set a flash message
        session()->flash('success','Project Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }
}
