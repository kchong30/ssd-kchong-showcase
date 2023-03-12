<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Category;


class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.categories.create')
        ->with('category', null);
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required','unique:categories,name'],
        ]);

        $attributes['slug'] = Str::slug($attributes['name']);

        $user = Category::create($attributes);
        return redirect('/admin');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.create')
        ->with('category', $category);
    }

    public function update(Category $category, Request $request)
    {
        $attributes = request()->validate([
            'name' => ['required','unique:categories,name,'.$category->id],
        ]);
        
        $category->update($attributes);
        session()->flash('success','Category Updated Successfully');

        return redirect('/admin');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        session()->flash('success','Category Deleted Successfully');

        return redirect('/admin');
    }
    
    public function getCategoriesJSON()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

}
