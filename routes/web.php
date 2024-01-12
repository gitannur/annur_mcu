<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\McuDokterController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MedicalCheckUpController;
use App\Http\Controllers\RekammedisController;
use App\Http\Controllers\UserController;
use App\Models\RekamMedis;
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

// login
route::get('/login', [LoginController::class, 'index'])->name('login');
Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
// user
// route::get('/user',[UserController::class, 'index'])->name('user.index');
Route::resource('/user', UserController::class);
route::get('/get-users', [UserController::class, 'getUsers'])->name('get.users');
// Route::get('/employee', [EmployeeController::class, 'index']);

// mcu
Route::get('/mcu/json', "MedicalCheckUpController@json");
Route::post('/mcu/store_lab', [MedicalCheckUpController::class, 'store_lab'])->name('mcu.store_lab');
Route::post('/mcu/store_dokter', [MedicalCheckUpController::class, 'store_dokter'])->name('mcu.store_dokter');
Route::get('/mcu', [MedicalCheckUpController::class, 'index'])->name('mcu.index');
Route::get('/mcu/create_lab', [MedicalCheckUpController::class, 'create_lab'])->name('mcu.create_lab');
Route::get('/mcu/create_dokter', [MedicalCheckUpController::class, 'create_dokter'])->name('mcu.create_dokter');
Route::get('/rekapan', [MedicalCheckUpController::class, 'rekapan'])->name('rekapan');
Route::get('/rekapan/show', [MedicalCheckUpController::class, 'showRekapan'])->name('rekapan.show');
Route::put('/mcu/updateInline/{id}', [MedicalCheckUpController::class, 'updateInline'])->name('mcu.updateInline');
Route::put('/mcu/saveInlineEdit/{id}', [MedicalCheckUpController::class, 'saveInlineEdit'])->name('mcu.saveInlineEdit');
Route::put('/mcu/update/{user}', [MedicalCheckUpController::class, 'update'])->name('mcu.update');

// edit_mcu
// Route::get('/mcu/edit/{id}', [MedicalCheckUpController::class, 'edit'])->name('mcu.edit');
// Route::put('/mcu/update/{id}', [MedicalCheckUpController::class, 'update'])->name('mcu.update');
Route::get('/mcu/{user}/edit/{tahun}', [MedicalCheckUpController::class, 'edit'])->name('mcu.edit');
// edit_lab
Route::get('/mcu/{user}/edit_lab/{tahun}', [MedicalCheckUpController::class, 'edit_lab'])->name('mcu.edit_lab');
Route::put('/mcu/update_lab/{user}', [MedicalCheckUpController::class, 'update_lab'])->name('mcu.update_lab');

// Hapus Data
Route::delete('/mcu/{id}/{tahun}', [MedicalCheckUpController::class, 'destroy'])->name('mcu.destroy');


// cetak
// Route::get('/mcu/pdf', [MedicalCheckUpController::class,'generatePDF'])->name('medicalcheckup.pdf');
Route::get('/mcu/print/{id}/{tahun}', [MedicalCheckUpController::class, 'print'])->name('mcu.print');
// cetak lab
Route::get('/mcu/print_lab/{id}/{year}', [MedicalCheckUpController::class, 'print_lab'])->name('mcu.print_lab');

// SumaryMCU
Route::get('/mcu/sumarymcu', [MedicalCheckUpController::class, 'sumarymcu'])->name('mcu.sumarymcu');


// Rekam Medis
route::get('/rekammedis', [RekammedisController::class, 'index'])->name('rekammedis.rekammedis');
Route::get('/rekammedis/create', [RekammedisController::class, 'create'])->name('rekammedis.create');
Route::post('/rekammedis/store', [RekammedisController::class, 'store'])->name('rekammedis.store');
Route::get('/rekapanrekammedis', [RekammedisController::class, 'rekapan'])->name('rekapanrekammedis');
Route::get('/rekapanrekammedis/show', [RekammedisController::class, 'showRekapan'])->name('rekapanrekammedis.show');
// Edit
Route::get('/rekammedis/{user}/edit/{tahun}', [RekammedisController::class, 'edit'])->name('rekammedis.edit_rekam_medis');
Route::put('/rekammedis/update/{user}', [RekammedisController::class, 'update'])->name('rekammedis.update');
// hapus
Route::delete('/rekammedis/{id}/{tahun}', [RekammedisController::class, 'destroy'])->name('rekammedis.destroy');

// jumlah berobat
Route::get('/rekammedis/jumlahberobat', [RekammedisController::class, 'jumlahberobat'])->name('rekammedis.jumlahberobat');
// rekam medis non karyawan
Route::get('/rekammedis_nonkaryawan/create_nonkaryawan', [RekammedisController::class, 'create_nonkaryawan'])->name('rekammedis_nonkaryawan.create_nonkaryawan');
Route::get('/rekammedis_nonkaryawan/index_nonkaryawan', [RekammedisController::class, 'tampilnonkaryawan'])->name('rekammedis_nonkaryawan.index_nonkaryawan');
Route::get('/rekammedis_nonkaryawan/create_nonkaryawan', [RekammedisController::class, 'create_nonkaryawan'])->name('rekammedis_nonkaryawan.create_nonkaryawan');
Route::post('/rekammedis_nonkaryawan/store_nonkaryawan', [RekammedisController::class, 'store_nonkaryawan'])->name('rekammedis_nonkaryawan.store_nonkaryawan');
Route::get('/rekammedis_nonkaryawan/{id}/edit', [RekamMedisController::class, 'edit_nonkaryawan'])->name('rekammedis_nonkaryawan.edit_nonkaryawan');
Route::put('/rekammedis_nonkaryawan/{id}', [RekamMedisController::class, 'update_nonkaryawan'])->name('rekammedis_nonkaryawan.update_nonkaryawan');
// rekap
Route::get('/rekapanrekammedis', [RekammedisController::class, 'rekapan_nonkaryawan'])->name('rekapanrekammedis');
Route::get('/rekammedis_nonkaryawan/show', [RekammedisController::class, 'showRekapan_nonkaryawan'])->name('rekammedis_nonkaryawan.show_nonkaryawan');
// hapus rekam medis non karyawan
Route::delete('/rekammedis_nonkaryawan/{id}/{tahun}', [RekammedisController::class, 'destroy_nonkaryawan'])->name('rekammedis_nonkaryawan.destroy_nonkaryawan');

// jenis penyakit
Route::get('/rekammedis/jenispenyakit', [RekammedisController::class, 'jenispenyakit'])->name('rekammedis.jenispenyakit');

// Dokter 
Route::get('/mcudokter', [McuDokterController::class, 'index'])->name('mcudokter.index');
Route::get('/mcudokter/create', [McuDokterController::class, 'create'])->name('mcudokter.create');
Route::post('/mcudokter/store', [McuDokterController::class, 'store'])->name('mcudokter.store');
// edit
Route::put('/mcudokter/update/{user}', [McuDokterController::class, 'update'])->name('mcudokter.update');
Route::get('/mcudokter/{user}/edit/{tahun}', [McuDokterController::class, 'edit'])->name('mcudokter.edit');
// print
Route::get('/mcudokter/print/{id}/{year}', [McuDokterController::class, 'print'])->name('mcudokter.print');
