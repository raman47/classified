<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::paginate(1);
        return  view('admin.categories.index', compact('categories'));
    }
    public function create(){
        return view('admin.categories.create');
    }
    public function store(StoreCategoryRequest $request){
        if($request->hasFile('image')){
            $path = $request->file('image')->storeAs('categories', $request->file('image')->getClientOriginalName(), 'public');


            Category::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'image' => $path
            ]);
            return redirect()->route('categories.index')->with('message', 'Category Created Sucessfully');
        }
        dd('no image');

    }
    public function edit(Category $category){
        return view('admin.categories.edit', compact('category'));
    }
    public function update(Request $request, Category $category){


        if($request->hasFile('image')){
            $path = $request->file('image')->storeAs('categories', $request->file('image')->getClientOriginalName(), 'public');
            $category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'image' => $path
            ]);

            return redirect()->route('categories.index')->with('message', 'Category Updated Sucessfully With Image');

        }else{

            $category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name)
            ]);

            return redirect()->route('categories.index')->with('message', 'Category Updated Sucessfully');

        }
    }
    public function destroy(Category $category){
        $category->delete();
        return redirect()->route('categories.index')->with('message', 'Category Delete Sucessfully');
    }
}
