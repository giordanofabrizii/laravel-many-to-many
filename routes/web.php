<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ProjectController as AdminProjectsController;
use App\Http\Controllers\Admin\typeController as AdminTypesController;
use App\Http\Controllers\Admin\TechnologyController as AdminTechnologyController;
use App\Http\Controllers\Admin\TeammateController as AdminTeammateController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->name('admin.')->prefix('admin/')->group(function(){
    Route::get('projects/deleted', [AdminProjectsController::class, 'deleted'])->name('projects.deleted');
    Route::patch('projects/{project}/restore', [AdminProjectsController::class, 'restore'])->name('project.restore');
    Route::delete('projects/{project}/permdelete', [AdminProjectsController::class, 'permdelete'])->name('project.permdelete');
    Route::resource("projects",AdminProjectsController::class);

    Route::get('types/deleted', [AdminTypesController::class, 'deleted'])->name('types.deleted');
    Route::patch('types/{type}/restore', [AdminTypesController::class, 'restore'])->name('type.restore');
    Route::delete('types/{type}/permdelete', [AdminTypesController::class, 'permdelete'])->name('type.permdelete');
    Route::resource("types",AdminTypesController::class);

    Route::get('technologies',[AdminTechnologyController::class, 'index'])->name('technologies.index');
    Route::get('teammates',[AdminTeammateController::class, 'index'])->name('teammates.index');
});
