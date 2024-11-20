<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubCategoryRequest;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $subcategories = SubCategory::with('category')->paginate(10);
        //$subcategories = SubCategory::paginate(12);

        return  view('admin.subcategories.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.subcategories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubCategoryRequest $request)
    {
        $path = null; // Default value if no file is uploaded

        if ($request->hasFile('image')) {
            $path = $request->file('image')->storeAs(
                'subcategories',
                $request->file('image')->getClientOriginalName(),
                'public'
            );
        }

        SubCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'category_id' => $request->category_id,
            'image' => $path // Will be null if no file is uploaded
        ]);

        return redirect()->route('subcategories.index')->with('message', 'SubCategory Created Successfully');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sub_category = SubCategory::find($id);
        return view('admin.subcategories.edit', compact('sub_category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id){
            $sub_category = SubCategory::find($id);

        if($request->hasFile('image')){
            $path = $request->file('image')->storeAs('subcategories', $request->file('image')->getClientOriginalName(), 'public');
            $sub_category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'category_id' => $request->category_id,
                'image' => $path

            ]);

            return redirect()->route('subcategories.index')->with('message', 'Sub Category Updated Sucessfully With Image');

        }else{

            $sub_category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'category_id' => $request->category_id,

            ]);

            return redirect()->route('subcategories.index')->with('message', 'Sub Category Updated Sucessfully');

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id){
        $sub_category = SubCategory::find($id);
        $sub_category->delete();
        return redirect()->route('subcategories.index')->with('message', 'Sub Category Delete Sucessfully');
    }
}
