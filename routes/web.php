<?php

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
use App\Http\Traits\MainTrait;
//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/emails', function(){
    return view('emails.passwordSetup');
});

Route::get('password-setup/{token}', 'UserController@passwordSetup');
Route::post('password-setup', [
    'uses'=>'UserController@postPasswordSetup',
    'as'=>'password-setup'
]);


Route::group(['middleware'=>'auth'], function(){
    Route::get('/',[
        'uses'=>'UserController@dashboardView'
    ]);
    Route::get('logout', [
        'uses'=>'auth\LoginController@logout'
    ]);

    Route::group(['middleware'=>'user'], function(){
        Route::get('/track-package', function(){
            return view('dashboard.user.track-package');
        })->name('track-package');

        Route::post('/package-details', [
            'uses'=>'UserController@getPackageDetails',
            'as'=>'package-details'
        ]);
    });
    Route::group(['middleware'=>'packager'], function(){
        Route::get('/new-package', function(){
            return view('dashboard.packager.new-package');
        })->name('new-package');
        Route::get('/package/{code}', [
            'uses'=>'PackagerController@getPackage',
            'as'=>'package'
        ]);

        Route::post('/new-package', [
            'uses'=>'PackagerController@newPackage',
            'as'=>'new-package'
        ]);
        Route::patch('/update-package',[
            'uses'=>'PackagerController@updatePackage',
            'as'=>'update-package'
        ]);
        Route::get('/packages', [
            'uses'=>'PackagerController@getPackages',
            'as'=>'packages'
        ]);
    });
    Route::group(['middleware'=>'admin'], function(){
        Route::get('new-user', function(){
            return MainTrait::getDashboardView();
        });

        Route::post('new-user', [
            'uses'=>'AdminController@newUser',
            'as'=>'new-user'
        ]);
    });
});

Route::group(['middleware'=>'guest'], function(){
    Route::get('login', function(){
        return view('guest.login');
    })->name('loginView');
    Route::post('login', [
        'uses'=>'auth\LoginController@index',
        'as'=>'login'
    ]);
});