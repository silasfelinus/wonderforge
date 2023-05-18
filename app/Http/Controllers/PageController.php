<?php
namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::all();

        return Inertia::render('Pages/Index', [
            'pages' => $pages
        ]);
    }

    public function create()
    {
        return Inertia::render('Pages/Create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'required',
            'creator' => 'required',
            'webgallery' => 'required',
            'title' => 'required',
            'description' => 'required',
            'tags' => 'required',
        ]);

        Page::create($validatedData);

        return redirect()->route('pages.index');
    }

    public function show(Page $page)
    {
        return Inertia::render('Pages/Show', [
            'page' => $page
        ]);
    }

    public function edit(Page $page)
    {
        return Inertia::render('Pages/Edit', [
            'page' => $page
        ]);
    }

    public function update(Request $request, Page $page)
    {
        $validatedData = $request->validate([
            'image' => 'required',
            'creator' => 'required',
            'webgallery' => 'required',
            'title' => 'required',
            'description' => 'required',
            'tags' => 'required',
        ]);

        $page->update($validatedData);

        return redirect()->route('pages.index');
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()->route('pages.index');
    }
}
