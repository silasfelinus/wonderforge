<?php
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ChatController;

Route::post('/chat', [ChatController::class, 'chat']);

Route::apiResource('tags', TagController::class);
Route::apiResource('assets', AssetController::class);
Route::apiResource('images', 'ImageController');
Route::apiResource('galleries', 'GalleryController');
Route::apiResource('pages', 'PageController');
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
