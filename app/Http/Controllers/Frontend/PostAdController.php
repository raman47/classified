<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PostAd;
use Illuminate\Http\Request;

class PostAdController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('frontend.postads');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PostAd $postAd)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PostAd $postAd)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PostAd $postAd)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostAd $postAd)
    {
        //
    }
}
