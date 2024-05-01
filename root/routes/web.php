<?php

use App\Http\Controllers\PlanController;
use App\Http\Controllers\SaunaController;
use App\Models\Plan;
use App\Models\Sauna;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Auth;

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

Route::group(['middleware' => ['guest']], function () {
    Route::get('/',[AuthController::class,
    'showLogin'])->name('login.show');

    Route::post('login',[AuthController::class,'login'])->name
    ('login');

    Route::get('new',[AuthController::class,
    'newLogin'])->name('login.new');

    Route::post('createUser',[AuthController::class,'createUser'])->name
    ('createUser');
});

Route::group(['middleware' => ['auth']], function () {
Route::post('logout',[AuthController::class,'logout'])->name('logout');
Route::prefix('admin')->name('admin')->group(function () {
    Route::view('', 'admin.index')->name('.index');
    Route::prefix('saunas')->name('.saunas')->controller(SaunaController::class)->group(function () {
        Route::get('', 'index')->name('.index'); // admin/saunas    admin.saunas.index › SaunaController@index
        Route::post('', 'store')->name('.store'); // admin/saunas    admin.saunas.store › SaunaController@store
        Route::get('search', 'search')->name('.search'); //admin/saunas/search    admin.saunas.search > SaunaController@search
        Route::get('create', 'create')->name('.create'); // admin/saunas/create    admin.saunas.create › SaunaController@create
        Route::get('{sauna}', 'show')->name('.show'); // admin/saunas/{sauna}    admin.saunas.show › SaunaController@show
        Route::patch('{sauna}', 'update')->name('.update'); // admin/saunas/{sauna}    admin.saunas.update › SaunaController@update
        Route::delete('{sauna}', 'destroy')->name('.destroy'); // admin/saunas/{sauna}    admin.saunas.destroy › SaunaController@destroy
        Route::get('{sauna}/edit', 'edit')->name('.edit'); // admin/saunas/{sauna}/edit    admin.saunas.edit › SaunaController@edit
        Route::post('{sauna}/confirm', 'confirm')->name('.confirm'); // admin/saunas/{sauna}/confirm    admin.saunas.confirm › SaunaController@confirm
    });

    Route::prefix('plans')->name('.plans')->controller(PlanController::class)->group(function () {
        Route::get('', 'index')->name('.index'); // admin/plans    admin.plans.index › planController@index
        Route::post('', 'store')->name('.store'); // admin/plans    admin.plans.store › PlanController@store
        Route::get('create', 'create')->name('.create'); // admin/plans/create    admin.plans.create › PlanController@create
        Route::delete('{plan}', 'destroy')->name('.destroy'); // admin/plans/{plan}    admin.plans.destroy › PlanController@destroy
    });
});

});
