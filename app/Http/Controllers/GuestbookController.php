<?php
namespace App\Http\Controllers;

use App\Models\Guestbook;
use Illuminate\Http\Request;
use Inertia\Inertia;


class GuestbookController extends Controller
{
    public function index()
    {
        return Inertia::render('Guestbook/Index', [
            'messages' => Guestbook::latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Guestbook::create($validated);

        return Inertia::render('Guestbook/Index', [
            'messages' => Guestbook::latest()->get()
        ]);

    }
}
