<?php

/**
 * Welcome to Luthier-CI!
 *
 * This is your main route file. Put all your HTTP-Based routes here using the static
 * Route class methods
 *
 * Examples:
 *
 *    Route::get('foo', 'bar@baz');
 *      -> $route['foo']['GET'] = 'bar/baz';
 *
 *    Route::post('bar', 'baz@fobie', [ 'namespace' => 'cats' ]);
 *      -> $route['bar']['POST'] = 'cats/baz/foobie';
 *
 *    Route::get('blog/{slug}', 'blog@post');
 *      -> $route['blog/(:any)'] = 'blog/post/$1'
 */

Route::get('/','app@index')->name('app');
Route::post('checklogin','app@check_login')->name('checklogin');
Route::get('captcha/{apaaja?}','app@create_captcha')->name('captcha');
Route::get('login_js','app@load_login_js')->name('login_js');
Route::get('loadall_js','app@load_all_js')->name('loadalljs');
Route::get('loadjs','app@load_js')->name('loadjs');
Route::get('logout','app@logout')->name('logout');

Route::get('dashboard','app_dashboard@index')->name('dashboard');
Route::get('dashboardjs','app_dashboard@load_js')->name('dashboardjs');

Route::set('404_override', function(){
    show_404();
});

Route::set('translate_uri_dashes',FALSE);