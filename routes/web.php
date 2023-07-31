<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileController;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//         return view('welcome');
//     })
//     ->name('home');
Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::get('/upload', [FileController::class, 'showUploadPage'])->name('uploadPage');
Route::post('/upload', [FileController::class, 'uploadFile'])->name('upload.file');

Route::get('/import', [FileController::class, 'showImportPage'])->name('importPage');
Route::post('/import', [FileController::class, 'importFile'])->name('import.file');

Route::get('/all-files-to-import', [FileController::class, 'index'])->name('show.file');
Route::get('/generate-import-url', [FileController::class, 'generateImportUrl'])->name('generateImportUrl');
Route::get('/download-file/{filename}', [FileController::class, 'downloadFile'])->name('download.file');
