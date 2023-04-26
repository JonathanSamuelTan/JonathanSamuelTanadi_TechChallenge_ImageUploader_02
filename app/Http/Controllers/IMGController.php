<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class IMGController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $images = Image::all();
        return view('welcome', compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //get image real name
        $imageName = $request->image->getClientOriginalName();
        // save image to public/storage
        $request->image->storeAs('public', $imageName);
        Image::create([
            'image' => $imageName,
        ]);
        return redirect()->route('welcome');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $img = Image::find($id);
        $img->delete();
        return redirect()->route('welcome');
    }
}
