<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|s
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Call function to check if someone is an admin, if so return the admin page*/
Route::get('/', function () {
    return view('auth.login');
})->middleware('auth', 'checkrole:admin');

/*If someone isn't an admin the home page is returned*/
Auth::routes();

Route::get('/admin/add', function() {
    return view('addProcedure', ['procedures' => App\Procedures::all()]);
});

Route::post("admin/store", 'addprocedures@store');


Route::get('/procedures', function() {
    $downloads=DB::table('procedure')->get();
    return view('procedures', ['procedures' => App\Procedures::all()], compact('downloads'));
});


Route::get('/certificates', 'CertificateController@index');
Route::get('/profile/{employeenumber}', 'ProfileController@profile')->middleware('auth');
Route::get('/search', 'SearchController@search');
Route::get('/search', 'SearchController@search')->name('search.index');
route::get('/register', 'Auth\RegisterController@getData');
route::get('/profile/{employeenumber}/change', 'Auth\ChangeController@index');
Route::post('profile/{employeenumber}/change/password', 'Auth\ChangeController@change');

