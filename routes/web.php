<?php
use App\Trigger;
use App\Repository;
use App\Blink;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/','HomeController@index');
Route::get('git/getrepositories/{tag?}', 'HomeController@getrepositories');
Route::get('hipchat/gettriggers/{tag?}', 'HomeController@gettriggers');
Route::post('app/save', 'HomeController@update');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/api/gettriggers', function () {
    return response()
        ->json(Trigger::all()->toArray());
});

Route::get('/api/getrepositories', function () {
    return response()
        ->json(Repository::all()->toArray());
});

Route::get('/api/setblink/{val}', function ($val = 1) {
    $blinkHandle = Blink::findOrFail(1);
    $blinkHandle->blink = $val;

    return response()
        ->json($blinkHandle->save());
});


Route::get('/api/getblink', function () {
    $blinkHandle = Blink::findOrFail(1);

    return response()
        ->json($blinkHandle->blink);
});

