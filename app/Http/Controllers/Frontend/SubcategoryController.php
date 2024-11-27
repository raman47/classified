<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;

class SubcategoryController extends Controller
{
    public function getallsubcategories($id){
        $all_subcategories = SubCategory::where('category_id', $id)->get();

        return view('frontend.subcategories', compact('all_subcategories'));
    }
}
