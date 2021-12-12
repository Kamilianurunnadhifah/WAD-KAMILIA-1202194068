<?php
use App\Http\Controllers\VaccineController;
use App\Http\Controllers\PatientsController;
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
    return view('layout.index');
});
Route::get('/vaccines', function () {
    return view('layout.vaccines');
});
// Route::get('/list','VaccineController@list');
Route::get('/vaccine/list' , [VaccineController::class,'list']);

Route::get('/vaccine' , [VaccineController::class,'index'])->name('vaccine.index');
Route::get('/vaccine/insert' , [VaccineController::class,'tambah'])->name('vaccine.insert');
Route::post('/vaccine' , [VaccineController::class,'store'])->name('vaccine.store');
Route::get('/vaccine/{id}/edit' , [VaccineController::class,'edit'])->name('vaccine.edit');
Route::put('/vaccine/{id}' , [VaccineController::class,'update'])->name('vaccine.update');
Route::delete('/vaccine/{id}' , [VaccineController::class,'delete'])->name('vaccine.delete');

Route::get('/patient' , [PatientsController::class,'index'])->name('patient.index');
Route::get('/patient/insert' , [PatientsController::class,'tambah'])->name('patient.tambah');
Route::post('/patient' , [PatientsController::class,'store'])->name('patient.store');
Route::get('/patient/{id}/edit' , [PatientsController::class,'edit'])->name('patient.edit');
Route::put('/patient/{id}' , [PatientsController::class,'update'])->name('patient.update');
Route::delete('/patient/{id}' , [PatientsController::class,'delete'])->name('patient.delete');

Route::get('vaccine/patient/insert/{id}' , [PatientsController::class,'add']);