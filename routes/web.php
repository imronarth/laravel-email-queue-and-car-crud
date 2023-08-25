<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\SendEmailController;
use Illuminate\Support\Facades\Route;

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
    redirect('/cars');
});
// Route::get('/send-email', function () {
//     $data = [
//         'name' => 'Syahrizal As',
//         'body' => 'Testing Kirim Email di Santri Koding'
//     ];

//     Mail::to('alisadikinsyahrizal@gmail.com')->send(new SendEmail($data));

//     dd("Email Berhasil dikirim.");
// });
// queue send email
Route::get('/send-email', [SendEmailController::class, 'index'])->name('kirim-email');
Route::post('/post-email', [SendEmailController::class, 'store'])->name('post-email');
// datatables cars
Route::get('/cars', [CarController::class, 'index'])->name('car-index');
Route::get('/cars/create', [CarController::class, 'create'])->name('car-create');
Route::post('/cars', [CarController::class, 'store'])->name('car-store');
Route::get('/cars/{id}', [CarController::class, 'show'])->name('car-show');
Route::get('/cars/edit/{id}', [CarController::class, 'edit'])->name('car-edit');
Route::put('/cars/{id}', [CarController::class, 'update'])->name('car-update');
Route::delete('/cars/{id}', [CarController::class, 'destroy'])->name('car-destroy');
