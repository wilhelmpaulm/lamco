<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::guest('login');
});
Route::filter('kick', function()
{
	if (!Auth::check()) return Redirect::to('login');
});

Route::filter('admin', function(){
        if(Auth::user()->department != "admin"){
            Stalk::stalkSystem("tried to enter admin", null);
            return View::make('errors.deny');
        } 
});
Route::filter('production', function(){
        if(Auth::user()->department != "production"){
            Stalk::stalkSystem("tried to enter production", null);
            return View::make('errors.deny');
        } 
});
Route::filter('sales', function(){
        if(Auth::user()->department != "sales"){
            Stalk::stalkSystem("tried to enter sales", null);
            return View::make('errors.deny');
        } 
});
Route::filter('purchasing', function(){
        if(Auth::user()->department != "purchasing"){
            Stalk::stalkSystem("tried to enter purchasing", null);
            return View::make('errors.deny');
        } 
});
Route::filter('billing', function(){
        if(Auth::user()->department != "billing"){
            Stalk::stalkSystem("tried to enter billing", null);
            return View::make('errors.deny');
        } 
});
Route::filter('delivery', function(){
        if(Auth::user()->department != "delivery"){
            Stalk::stalkSystem("tried to enter delivery", null);
            return View::make('errors.deny');
        } 
});
Route::filter('warehousing', function(){
        if(Auth::user()->department != "warehousing"){
            Stalk::stalkSystem("tried to enter warehousing", null);
            return View::make('errors.deny');
        } 
});
Route::filter('maangement', function(){
        if(Auth::user()->department != "management"){
            Stalk::stalkSystem("tried to enter delivery", null);
            return View::make('errors.deny');
        } 
});




Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});