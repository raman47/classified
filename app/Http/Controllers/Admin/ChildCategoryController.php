<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\StoreChildCategoryRequest;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $childcategories = ChildCategory::with('sub_category')->paginate(12);

        return  view('admin.childcategories.index', compact('childcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sub_categories = SubCategory::all();
        return view('admin.childcategories.create', compact('sub_categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChildCategoryRequest $request)
    {
        if($request->hasFile('image')){
            $path = $request->file('image')->storeAs('childcategories', $request->file('image')->getClientOriginalName(), 'public');

            ChildCategory::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'sub_category_id' => $request->sub_category_id,
                'image' => $path
            ]);
            return redirect()->route('childcategories.index')->with('message', 'SubCategory Created Sucessfully');
        }
        dd('no image');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sub_categories = SubCategory::all();
        $child_category = ChildCategory::find($id);
        return view('admin.childcategories.edit', compact('child_category', 'sub_categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){
            $child_category = ChildCategory::find($id);

        if($request->hasFile('image')){
            $path = $request->file('image')->storeAs('childcategories', $request->file('image')->getClientOriginalName(), 'public');
            $child_category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'category_id' => $request->category_id,
                'image' => $path

            ]);

            return redirect()->route('childcategories.index')->with('message', 'Child Category Updated Sucessfully With Image');

        }else{

            $child_category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'category_id' => $request->category_id,

            ]);

            return redirect()->route('childcategories.index')->with('message', 'Child Category Updated Sucessfully');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id){
        $child_category = ChildCategory::findOrFail($id);
        $child_category->delete();
        return redirect()->route('childcategories.index')->with('message', 'Child Category Delete Sucessfully');
    }
}
