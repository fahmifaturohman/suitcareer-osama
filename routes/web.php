<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\TemplateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

//------------------ADMIN----------------------
use App\Http\Controllers\DataKlienController;
use App\Http\Controllers\DataCandidateController;
use App\Http\Controllers\DataRequestController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\IndexController;

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

//------------------------- ROUTES ADMIN ------------------------------------------------------------

Route::get('/', [IndexController::class, 'index']);
Route::get('register-admin', [IndexController::class, 'registerAdmin']);



Route::group(['middleware' => 'admin'], function () {

    Route::get('/dashboard_admin', [DashboardAdminController::class, 'index']);

    Route::get('/data_request', [DataRequestController::class, 'index'])->name('data_request');
    Route::get('/data_request/detail_datarequest/{id}', [DataRequestController::class, 'detaildata'])->name('detail_datarequest');
    Route::get('/data_request/detail_datarequest/{id}/add_candidate', [DataRequestController::class, 'addcandidate']);
    Route::post('/data_request/detail_datarequest/insert', [DataCandidateController::class, 'insert']);

    Route::get('/search_request', [DataRequestController::class, 'cari_request'])->name('search');

    #master data
    Route::get('/master_klien', [DataKlienController::class, 'index'])->name('master_klien');
    Route::get('/master_request', [DataRequestController::class, 'master_request'])->name('master_request');
    Route::get('/master_request_delete/{id}/{request}', [DataRequestController::class, 'master_request_delete'])->name('master_request_delete');
    Route::get('/master_request_pending', [DataRequestController::class, 'master_request_pending'])->name('master_request_pending');
    Route::get('/master_request_process', [DataRequestController::class, 'master_request_process'])->name('master_request_process');
    Route::get('/master_request_success', [DataRequestController::class, 'master_request_success'])->name('master_request_success');
    Route::get('/master_candidate', [DataCandidateController::class, 'master_candidate'])->name('master_candidate');

});

//------------------------- ROUTES KLIEN ------------------------------------------------------------

Route::group(['middleware' => 'klien'], function () {

    Route::get('/dashboard ', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profil', [ProfilController::class, 'index']);
    Route::post('profil/{users}', [ProfilController::class, 'insert']);
    Route::put('profil/{users}', [ProfilController::class, 'update']);

    //Route::get('/profil/{id_klien}', [TemplateController::class, 'index']);

    Route::get('/candidate', [CandidateController::class, 'index'])->name('candidate'); //AKSES DARI ROUTE PADA return redirect()->route('candidate')->with('pesan', 'Data berhasil diupdate');
    Route::get('/candidate/detail/{id_klien}', [CandidateController::class, 'detail']);
    Route::get('/candidate/edit/{id_klien}', [CandidateController::class, 'edit']);
    Route::post('/candidate/update/{id_klien}', [CandidateController::class, 'update']);
    Route::get('/candidate/delete/{id_klien}', [CandidateController::class, 'delete']);

    Route::get('/request', [RequestController::class, 'index'])->name('request');
    Route::get('/request/add', [RequestController::class, 'add']);
    Route::post('/request/insert/{users}', [RequestController::class, 'insert']);

    Route::get('/klien_request', [DashboardController::class, 'master_request'])->name('master_request');
    Route::get('/klien_request_pending', [DashboardController::class, 'master_request_pending'])->name('master_request_pending');
    Route::get('/klien_request_process', [DashboardController::class, 'master_request_process'])->name('master_request_process');
    Route::get('/klien_request_success', [DashboardController::class, 'master_request_success'])->name('master_request_success');
    Route::get('/klien_candidate', [DashboardController::class, 'master_candidate'])->name('master_candidate');
    Route::post('/klien_candidate_status', [DashboardController::class, 'klien_candidate_status']);   
});

Auth::routes();
Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'indexadmin'])->name('home')->middleware('admin');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('klien');
