<?php

//Admin routes

Route::group(['before'=>'auth.basic','prefix'=>'admin'], function(){

	//Admin index
	Route::get('/',['as'=>'admin.index.get','uses'=>'AdminController@getIndex']);	
	//Admin create model
	Route::get('/create',['as'=>'admin.create.get','uses'=>'AdminController@getCreate']);
	//Admin edit model
	Route::get('/{slug}/edit',['as'=>'admin.edit.get','uses'=>'AdminController@getEdit']);


	//Admin post routes
	Route::group(['before'=>'csrf'],function(){
		//Admin create model post
		Route::post('/create',['as'=>'admin.create.post','uses'=>'AdminController@postCreate']);
		//Delete model
		Route::post('/delete/{slug}',['as'=>'admin.delete.post','uses'=>'AdminController@postDelete']);
		//Edit model
		Route::post('/{slug}/edit',['as'=>'admin.edit.post','uses'=>'AdminController@postEdit']);

	});
});



//Site routes 
	
	//Home
	Route::get('/', ['as'=>'home.index.get','uses'=>'HomeController@getIndex']);
	//Services
	Route::get('/services',['as'=>'home.services.get','uses'=>'HomeController@getServices']);
	//My works
	Route::get('/my-works',['as'=>'home.myworks.get','uses'=>'HomeController@getMyworks']);
	//Contact single page
	Route::group(['before'=>'csrf'], function(){
		Route::post('/contact-me',['as'=>'home.contact.post','uses'=>'HomeController@postContact']);
	});
	




