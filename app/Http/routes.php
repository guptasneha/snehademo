<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/*****************FRONT ROUTE START****************/

// View Hotel Listing Route
Route::get('/', function () {
	$hotel = App\Hotel::all();
    return view('welcome',compact('hotel'));
});

// View Hotel Comment Route
Route::get('comments/{id}', function ($id) {
	$comment = App\Hotel::find($id);
	$h_comment = '';
	$hotelname = '';
	$hotel_id = $id;
	if(sizeof($comment)){
		$h_comment = $comment->comments;
    	$hotelname = App\Hotel::findOrFail($id); 
    	return view('comment',compact('hotel_id','hotelname','h_comment')); 
	}

	return view('comment')->with('zeroresult', '0');    
});

//Post Comment Route
Route::post('post_comment', 'Hotel\hotelsController@post_comment');

Route::get('/home', 'HomeController@index');

/*****************ADMIN ROUTE START****************/

// Add Hotel Route
Route::get('/admin', 'HomeController@index');
Route::post('/add_hotel', 'Hotel\hotelsController@add_hotel');

// Calling Autnetication Route
Route::auth();