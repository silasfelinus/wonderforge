<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PageController;
use App\Http\Controllers\GalleryController;
use Illuminate\Support\Facades\File;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/images/{folder}', function ($folder) {
    $path = public_path('images/' . $folder);
    if (!File::exists($path)) {
        return response()->json(['error' => 'Folder not found'], 404);
    }

    $files = File::files($path);
    $validExtensions = ['png', 'jpg', 'jpeg', 'gif', 'webp'];
    $images = array_filter($files, function ($file) use ($validExtensions) {
        return in_array(pathinfo($file, PATHINFO_EXTENSION), $validExtensions);
    });

    return array_map(function ($file) {
        return $file->getFilename();
    }, array_values($images));
});

Route::get('/images/{folder}/random', function ($folder) {
    $path = public_path('images/' . $folder);
    if (!File::exists($path)) {
        return response()->json(['error' => 'Folder not found'], 404);
    }

    $files = File::files($path);
    $validExtensions = ['png', 'jpg', 'jpeg', 'gif', 'webp'];
    $images = array_filter($files, function ($file) use ($validExtensions) {
        return in_array(pathinfo($file, PATHINFO_EXTENSION), $validExtensions);
    });

    // Return random image
    if (count($images) > 0) {
        $randomImage = $images[array_rand($images)];
        return response()->json(['image' => '/images/' . $folder . '/' . $randomImage->getFilename()]);
    } else {
        return response()->json(['error' => 'No images found'], 404);
    }
});
Route::get('/images/folders', function () {
    $path = public_path('images');
    $directories = File::directories($path);

    // Remove the path and keep only folder names
    $folderNames = array_map(function ($directory) use ($path) {
        return str_replace($path . '/', '', $directory);
    }, $directories);

    return response()->json($folderNames);
});
Route::get('/load', function () {
    return Inertia::render('ArtCritic', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::get('/pages', [PageController::class, 'index'])->name('pages.index');
Route::get('/pages/create', [PageController::class, 'create'])->name('pages.create');
Route::post('/pages',
[PageController::class, 'store'])->name('pages.store');
Route::get('/pages/{page}', [PageController::class, 'show'])->name('pages.show');
Route::get('/pages/edit/{page}', [PageController::class, 'edit'])->name('pages.edit');
Route::put('/pages/{page}', [PageController::class, 'update'])->name('pages.update');
Route::delete('/pages/{page}', [PageController::class, 'destroy'])->name('pages.destroy');

Route::get('/galleries', [GalleryController::class, 'index'])->name('galleries.index');
Route::get('/galleries/create', [GalleryController::class, 'create'])->name('galleries.create');
Route::post('/galleries',
[GalleryController::class, 'store'])->name('galleries.store');
Route::get('/galleries/{page}', [GalleryController::class, 'show'])->name('galleries.show');
Route::get('/galleries/edit/{page}', [GalleryController::class, 'edit'])->name('galleries.edit');
Route::put('/galleries/{page}', [GalleryController::class, 'update'])->name('galleries.update');
Route::delete('/galleries/{page}', [GalleryController::class, 'destroy'])->name('galleries.destroy');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
