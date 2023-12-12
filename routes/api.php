<?php

use App\Http\Controllers\api\DomainController;
use App\Http\Controllers\api\WhoisController;
use App\Services\Rapiwha\Rapiwha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/whois', [WhoisController::class, 'whois'])->name('whois');
Route::get('/getMessages', [Rapiwha::class, 'getMessages'])->name('rapiwha.getMessages');
