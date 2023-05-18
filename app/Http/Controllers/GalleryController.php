<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();

        return Inertia::render('Galleries/Index', [
            'galleries' => $galleries
        ]);
    }

    public function create()
    {
        return Inertia::render('Galleries/Create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'creator' => 'required',
            'url' => 'required',
            'description' => 'required',
            'fav_image' => 'required',
            'rating' => 'required',
            'isMember' => 'required',
            'isNSFW' => 'required',
            'isPrivate' => 'required',
        ]);

        Gallery::create($validatedData);

        return redirect()->route('galleries.index');
    }

    public function show(Gallery $gallery)
    {
        return Inertia::render('Galleries/Show', [
            'gallery' => $gallery
        ]);
    }

    public function edit(Gallery $gallery)
    {
        return Inertia::render('Galleries/Edit', [
            'gallery' => $gallery
        ]);
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'creator' => 'required',
            'url' => 'required',
            'description' => 'required',
            'fav_image' => 'required',
            'rating' => 'required',
            'isMember' => 'required',
            'isNSFW' => 'required',
            'isPrivate' => 'required',
        ]);

        $gallery->update($validatedData);

        return redirect()->route('galleries.index');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();

        return redirect()->route('galleries.index');
    }
}
