<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImportDataController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\FarmerGroupController;

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

Route::get('/', function () {return view('welcome');});

Route::get('/data',[ImportDataController::class,'importData']);
Route::get('/data/d',[ImportDataController::class,'importDetailedData']);


Route::get('/admin/districts',[DistrictController::class,'index'])->name('districts');
Route::get('/admin/district/{area}',[DistrictController::class,'show'])->name('district.show');

Route::get('/admin/groups',[FarmerGroupController::class,'index'])->name('groups');
Route::get('/admin/group/{groupId}',[FarmerGroupController::class,'show'])->name('group.show');
