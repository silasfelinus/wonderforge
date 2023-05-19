<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class MarkdownController extends Controller
{
    public function show($file)
    {
        $path = public_path() . "/markdown/{$file}.md";

        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        return Response::make($file, 200)->header("Content-Type", $type);
    }
}
