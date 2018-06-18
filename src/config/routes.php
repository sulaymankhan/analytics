<?php
Route::prefix('admin/analytics')->group(function(){
	Route::middleware(['web','auth','UserAccess:admin'])->group(function(){
		Route::get('dashboard','sulaymankhan\analytics\Http\AppController@dashboard');
	});
	
});
